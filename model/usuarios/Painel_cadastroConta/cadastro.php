<?php
session_start();
require_once "../../../factory/conexao.php";


function somenteNumeros($str) {
    return preg_replace('/\D/', '', $str);
}


function validarSenha($senha) {
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,90}$/', $senha);
}

function validarCPF($cpf) {
    $cpf = somenteNumeros($cpf);
    if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) return false;

    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) return false;
    }
    return true;
}

function validarCNPJ($cnpj) {
    $cnpj = somenteNumeros($cnpj);
    if (strlen($cnpj) != 14) return false;

    $peso1 = [5,4,3,2,9,8,7,6,5,4,3,2];
    $peso2 = [6,5,4,3,2,9,8,7,6,5,4,3,2];

    for ($t = 12; $t < 14; $t++) {
        $d = 0;
        $peso = ($t == 12) ? $peso1 : $peso2;
        for ($c = 0; $c < $t; $c++) {
            $d += $cnpj[$c] * $peso[$c];
        }
        $d = $d % 11;
        $d = ($d < 2) ? 0 : 11 - $d;
        if ($cnpj[$c] != $d) return false;
    }
    return true;
}
function validarTelefone($telefone) {
    $telefone = somenteNumeros($telefone);
    return (strlen($telefone) >= 10 && strlen($telefone) <= 11);
}
if (
    !empty($_POST['nome']) &&
    !empty($_POST['email']) &&
    !empty($_POST['cpf_cnpj']) &&
    !empty($_POST['telefone']) &&
    !empty($_POST['senha']) &&
    !empty($_POST['confirmar_senha'])
) {
    $nome     = trim($_POST['nome']);
    $email    = trim($_POST['email']);
    $cpf_cnpj = somenteNumeros($_POST['cpf_cnpj']);
    $telefone = somenteNumeros($_POST['telefone']);
    $senha    = $_POST['senha'];
    $senhaConfirmar = $_POST['confirmar_senha'];


    if (!validarTelefone($telefone)) {
        echo "<script>
            alert('Telefone inválido! Informe com DDD (10 ou 11 dígitos).');
            window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php';
        </script>";
        exit;
    }


    if (!validarSenha($senha)) {
        echo "<script>
            alert('A senha deve conter de 8 a 90 caracteres, incluindo letra maiúscula, letra minúscula, número e caractere especial.');
            window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php';
        </script>";
        exit;
    }

    if ($senha !== $senhaConfirmar) {
        echo "<script>
            alert('As senhas não coincidem.');
            window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php';
        </script>";
        exit;
    }

    if (strlen($cpf_cnpj) == 11) {
        if (!validarCPF($cpf_cnpj)) {
            echo "<script>
                alert('CPF inválido!');
                window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php';
            </script>";
            exit;
        }
    } elseif (strlen($cpf_cnpj) == 14) {
        if (!validarCNPJ($cpf_cnpj)) {
            echo "<script>
                alert('CNPJ inválido!');
                window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php';
            </script>";
            exit;
        }
    } else {
        echo "<script>
            alert('CPF ou CNPJ inválido!');
            window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php';
        </script>";
        exit;
    }

    $db = new Caminho();
    $conn = $db->getConn();

    $verificar = $conn->prepare("SELECT 1 FROM usuarios WHERE email = :email OR cpf_cnpj = :cpf OR telefone = :tel");
    $verificar->bindParam(':email', $email, PDO::PARAM_STR);
    $verificar->bindParam(':cpf', $cpf_cnpj, PDO::PARAM_STR);
    $verificar->bindParam(':tel', $telefone, PDO::PARAM_STR);
    $verificar->execute();

    if ($verificar->rowCount() > 0) {
        echo "<script>
            alert('Email, CPF/CNPJ ou Telefone já cadastrado!');
            window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php';
        </script>";
        exit;
    }


    $opcoesHash = [
        'memory_cost' => 1<<17, 
        'time_cost'   => 4,
        'threads'     => 2
    ];
    $senhaHash = password_hash($senha, PASSWORD_ARGON2ID, $opcoesHash);

    $query = "INSERT INTO usuarios (nome, email, telefone, senha_hash, cpf_cnpj, tipo_usuario) 
              VALUES (:nome, :email, :telefone, :senha, :cpf, :tipo)";
    $cadastrar = $conn->prepare($query);
    $cadastrar->bindParam(':nome', $nome, PDO::PARAM_STR);
    $cadastrar->bindParam(':email', $email, PDO::PARAM_STR);
    $cadastrar->bindParam(':telefone', $telefone, PDO::PARAM_STR);
    $cadastrar->bindParam(':senha', $senhaHash, PDO::PARAM_STR);
    $cadastrar->bindParam(':cpf', $cpf_cnpj, PDO::PARAM_STR);
    $cadastrar->bindParam(':tipo', $tipoNovo, PDO::PARAM_STR);

    $cadastrar->execute();

    if ($cadastrar->rowCount() > 0) {
        echo "<script>
            alert('Conta criada com sucesso!');
            window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_email_usuario.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro ao cadastrar usuário!');
            window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Preencha todos os campos!');
        window.location.href = '/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php';
    </script>";
}
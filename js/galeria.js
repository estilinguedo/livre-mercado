// Espera o documento HTML ser completamente carregado para executar o código
document.addEventListener('DOMContentLoaded', function() {

    // 1. Seleciona os elementos no HTML
    // Seleciona a imagem principal que será alterada
    const mainImage = document.querySelector('.main-image');
    // Seleciona TODAS as imagens de miniatura (thumbnails)
    const thumbnails = document.querySelectorAll('.thumb');

    // 2. Adiciona um "ouvinte" de eventos para cada miniatura
    thumbnails.forEach(function(thumb) {
        // O evento 'mouseover' é acionado quando o mouse passa por cima do elemento
        thumb.addEventListener('mouseover', function() {
            
            // 3. Troca a imagem principal
            // Pega o endereço (src) da miniatura que o mouse está em cima
            const newImageSrc = thumb.src;
            
            // Define o endereço (src) da imagem principal para ser o mesmo da miniatura
            mainImage.src = newImageSrc;

            // BÔNUS: Adiciona uma classe para destacar a miniatura ativa
            // Primeiro, remove a classe 'active' de todas as miniaturas
            thumbnails.forEach(t => t.classList.remove('active'));
            // Depois, adiciona a classe 'active' apenas na miniatura atual
            thumb.classList.add('active');
        });
    });

    // BÔNUS: Garante que a primeira miniatura comece com o destaque
    if (thumbnails.length > 0) {
        thumbnails[0].classList.add('active');
    }
});
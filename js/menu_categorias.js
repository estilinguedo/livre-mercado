document.addEventListener('DOMContentLoaded', function () { 
  // ======== Função genérica para menus dropdown ========
  function setupDropdown(btnId, menuId, containerClass) {
    const btn = document.getElementById(btnId);
    const menu = document.getElementById(menuId);

    if (!btn || !menu) return;

    // Abre/fecha no clique do botão
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      const opened = menu.classList.toggle('show');
      btn.setAttribute('aria-expanded', opened ? 'true' : 'false');
    });

    // Fecha ao clicar fora
    document.addEventListener('click', function (e) {
      if (!menu.contains(e.target) && !btn.contains(e.target)) {
        menu.classList.remove('show');
        btn.setAttribute('aria-expanded', 'false');
      }
    });

    // Fecha com tecla ESC
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        menu.classList.remove('show');
        btn.setAttribute('aria-expanded', 'false');
        btn.focus();
      }
    });
  }

  // ======== Ativar menus ========
  setupDropdown('categorias_botao', 'menu_categorias', 'navegacao_categoria');
  setupDropdown('perfil_botao', 'menu_perfil', 'navegacao_perfil');
});


// ======== Toggle Mais informações (rodapé) ========
const btn = document.getElementById("toggleInfo");
const info = document.getElementById("infoExtra");
const arrow = btn ? btn.querySelector("img") : null;

if (btn && info && arrow) {
  btn.addEventListener("click", () => {
    info.classList.toggle("open");

    if (info.classList.contains("open")) {
      arrow.style.transform = "rotate(0deg)";
    } else {
      arrow.style.transform = "rotate(180deg)";
    }
  });
}

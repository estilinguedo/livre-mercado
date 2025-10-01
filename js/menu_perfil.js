document.addEventListener('DOMContentLoaded', function () { 
  // ===== MENU CATEGORIAS =====
  const btnCat = document.getElementById('categorias_botao');
  const menuCat = document.getElementById('menu_categorias');

  if (btnCat && menuCat) {
    btnCat.addEventListener('click', function (e) {
      e.stopPropagation();
      const opened = menuCat.classList.toggle('show');
      btnCat.setAttribute('aria-expanded', opened ? 'true' : 'false');
    });

    document.addEventListener('click', function (e) {
      if (!menuCat.contains(e.target) && !btnCat.contains(e.target)) {
        menuCat.classList.remove('show');
        btnCat.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // ===== MENU PERFIL =====
  const btnPerfil = document.getElementById('perfil_botao');
  const menuPerfil = document.getElementById('menu_perfil');

  if (btnPerfil && menuPerfil) {
    btnPerfil.addEventListener('click', function (e) {
      e.stopPropagation();
      const opened = menuPerfil.classList.toggle('show');
      btnPerfil.setAttribute('aria-expanded', opened ? 'true' : 'false');
    });

    document.addEventListener('click', function (e) {
      if (!menuPerfil.contains(e.target) && !btnPerfil.contains(e.target)) {
        menuPerfil.classList.remove('show');
        btnPerfil.setAttribute('aria-expanded', 'false');
      }
    });
  }
});
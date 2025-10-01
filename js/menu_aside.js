document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector("header");
  const aside = document.querySelector("aside .barra_lateral");

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Header ainda aparece em parte → aside colado logo abaixo do header
        aside.style.position = "absolute";
        aside.style.top = header.offsetHeight + "px";
      } else {
        // Header saiu COMPLETO da tela → aside fixa no topo
        aside.style.position = "fixed";
        aside.style.top = "0";
      }
    });
  }, { threshold: 0 }); // <<<<< mudou para 0

  observer.observe(header);
});


document.addEventListener("DOMContentLoaded", () => {
  // Seleciona todos os botões da barra lateral
  document.querySelectorAll(".barra_lateral ul > li > button").forEach(button => {
    button.addEventListener("click", (e) => {
      e.stopPropagation(); // evita bug com clique no <li>
      const li = button.parentElement;

      // Alterna submenu do item clicado
      li.classList.toggle("open");
    });
  });
});
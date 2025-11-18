/* ===========================================================
   Carrusel por categoría
   - Cada .carousel es desplazable horizontalmente
   - Se muestran 3 visualmente: center + left + right
   - Los botones prev/next mueven el "índice actual"
   - Ajusta clases .left/.center/.right para estilo
   =========================================================== */

/* Helper: seleccionar todos los carousels */
document.querySelectorAll('.carousel').forEach(initCarousel);

function initCarousel(carousel){
  const items = Array.from(carousel.querySelectorAll('.card'));
  if(!items.length) return;

  // índice central inicial (0-based); si hay >=3 usamos 1 como centro
  let centerIndex = 1;
  if(items.length < 3) centerIndex = 0;

  // función para aplicar clases según centerIndex
  function applyClasses(){
    items.forEach((it, i) => {
      it.classList.remove('left','right','center','side');
    });

    const len = items.length;
    // center
    const c = centerIndex % len;
    const left = (centerIndex - 1 + len) % len;
    const right = (centerIndex + 1) % len;

    items[c].classList.add('center');
    items[left].classList.add('left');
    items[right].classList.add('right');

    // any others mark as side
    items.forEach((it, idx) => {
      if(!it.classList.contains('center') && !it.classList.contains('left') && !it.classList.contains('right')){
        it.classList.add('side');
      }
    });

    // scroll the carousel so center is visible in middle
    // approximate calculation: scrollLeft to item offset - half width container
    const container = carousel;
    const centerEl = items[c];
    const containerRect = container.getBoundingClientRect();
    const elRect = centerEl.getBoundingClientRect();
    const offset = (elRect.left + elRect.width/2) - (containerRect.left + containerRect.width/2);
    container.scrollBy({ left: offset, behavior: 'smooth' });
  }

  // attach prev/next buttons by data-target (they live outside .carousel)
  // find matching controls by data-target attribute
  const parentSection = carousel.closest('.categoria');
  if(parentSection){
    const id = parentSection.getAttribute('id').toLowerCase();
    const prevBtn = parentSection.querySelector('.prev');
    const nextBtn = parentSection.querySelector('.next');

    if(prevBtn){ prevBtn.addEventListener('click', () => {
      centerIndex = (centerIndex - 1 + items.length) % items.length;
      applyClasses();
    }); }

    if(nextBtn){ nextBtn.addEventListener('click', () => {
      centerIndex = (centerIndex + 1) % items.length;
      applyClasses();
    }); }
  }

  // also allow keyboard left/right when hovered
  carousel.addEventListener('keydown', (e) => {
    if(e.key === 'ArrowLeft'){ centerIndex = (centerIndex - 1 + items.length) % items.length; applyClasses(); }
    if(e.key === 'ArrowRight'){ centerIndex = (centerIndex + 1) % items.length; applyClasses(); }
  });

  // click on card center opens link - default anchor does that
  items.forEach(it => {
    it.addEventListener('mouseenter', () => {
      // slightly enlarge hovered card (if it's center, nothing)
      it.style.transition = 'transform 220ms ease';
    });
  });

  // initialize classes and position
  applyClasses();
}

/* Small enhancement: smooth scrolling for anchor links */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', (e) => {
    e.preventDefault();
    const id = a.getAttribute('href').slice(1);
    const target = document.getElementById(id);
    if(target){
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

/* Accessibility improvements: allow focusing carousel items */
document.querySelectorAll('.card').forEach(c => c.setAttribute('tabindex','0'));



//galeria
// Simulación de scroll infinito simple
window.addEventListener('scroll', () => {
  const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
  if (scrollTop + clientHeight >= scrollHeight - 5) {
    cargarMasImagenes();
  }
});

function cargarMasImagenes() {
  const galeria = document.getElementById('galeria');
  const nuevas = galeria.innerHTML;
  galeria.insertAdjacentHTML('beforeend', nuevas);
}

document.addEventListener('DOMContentLoaded', () => {
  //Проверка ошибок console.log() 

  /*Клик БУРГЕР*/
  window.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#burger').addEventListener('click', function() {
      this.classList.toggle('open');
      document.querySelector('#menu').classList.toggle('is-active')
    }) 
  })

  //--*Меню(data-target) клик или is-open--is-active*--//
  document.querySelectorAll(".header__btn_js").forEach(item => {
    item.addEventListener("click", function () {
      let btn = this;
      let dropdown = this.parentElement.querySelector(".header__dropdown_js");

      document.querySelectorAll(".header__btn_js").forEach(el => {
        if (el != btn) {
          el.classList.remove("active--btn");
        }
      });

      document.querySelectorAll(".header__dropdown_js").forEach(el => {
        if (el != dropdown) {
          el.classList.remove("active-list--item");
        }
      })
      dropdown.classList.toggle("active-list--item");
      btn.classList.toggle("active--btn")
    })
  })

  document.addEventListener("click", function (e) {
    let target = e.target;
    if (!target.closest(".header__list_js")) {
      document.querySelectorAll(".header__dropdown_js").forEach(el => {
        el.classList.remove("active-list--item");
      })
      document.querySelectorAll(".header__btn_js").forEach(el => {
        el.classList.remove("active--btn");
      });
    }
  });
  //--* // Меню(data-target) клик или is-open--is-active*--//


  // Плавный скролл по якорям
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      // Проверяем, что это якорь, а не внешняя ссылка
      if (this.getAttribute('href').startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({ behavior: 'smooth' });
        }
      }
    });
  });


  
})  
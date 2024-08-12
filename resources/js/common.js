document.addEventListener('DOMContentLoaded', function () {
  // Initialize the Datepicker with onSelect event
  if ($.fn.datepicker) {
    /*
      $('#datepicker').datepicker({
          onSelect: function(dateText) {
              console.log("Date selected: " + dateText); // Log the selected date
              var baseUrl = "https://example.com/date/";
              var redirectUrl = baseUrl + encodeURIComponent(dateText);
              window.location.href = redirectUrl;
          }
      });
      */
  }

  // Dropdown open and hide when click outside
  const dropdownLinks = document.querySelectorAll('.js-dropdown-link');
  const dropdownInnerElements = document.querySelectorAll('.js-dropdown');

  function dropdownClick(e) {
      const targetElement = document.getElementById(this.hash.substr(1));
      const isAlreadyActive = this.classList.contains('active');
      dropdownLinks.forEach(link => {
          link.classList.remove('active');
          link.setAttribute('aria-expanded', 'false');
      });
      dropdownInnerElements.forEach(el => el.classList.remove('open'));
      if (!isAlreadyActive) {
          dropdownLinks.forEach(link => {
              if (link.getAttribute('href') === this.hash) {
                  link.classList.add('active');
                  link.setAttribute('aria-expanded', 'true');
              }
          });
          targetElement.classList.add('open');
      }
      e.preventDefault();
  }

  function handleMouseUpTouchStartKeyUp(e) {
      const isInsideDropdown = Array.from(dropdownLinks)
          .concat(Array.from(dropdownInnerElements))
          .some(el => el.contains(e.target));
      if (!isInsideDropdown || e.keyCode === 27) {
          dropdownLinks.forEach(link => {
              link.classList.remove('active');
              link.setAttribute('aria-expanded', 'false');
          });
          dropdownInnerElements.forEach(el => el.classList.remove('open'));
      }
  }

  dropdownLinks.forEach(link => link.addEventListener('click', dropdownClick));
  document.addEventListener('mouseup', handleMouseUpTouchStartKeyUp);
  document.addEventListener('touchstart', handleMouseUpTouchStartKeyUp);
  document.addEventListener('keyup', handleMouseUpTouchStartKeyUp);

  // Custom select
  if ($.fn.select2) {
      $('.js-select').select2({
          minimumResultsForSearch: Infinity
      });
  }

  // Sliders
  var daysSlider = new Swiper('.js-days-slider', {
      loop: false,
      rewind: true,
      slidesPerView: 7,
      spaceBetween: 0,
      centeredSlides: true,
      navigation: {
          prevEl: '.js-days-slider-button-prev',
          nextEl: '.js-days-slider-button-next',
      },
      on: {
          init: function () {
              const activeSlide = this.el.querySelector('.swiper-slide.active');
              const activeSlideIndex = this.slides.findIndex(slide => slide === activeSlide);
              this.slideTo(activeSlideIndex, 0, false);
          }
      }
  });

  // Modal
  const modalSelector = '.js-modal';
  const modalWrapSelector = '.js-modal-wrap';
  const modalOpenSelector = '.js-modal-link';
  const modalCloseSelector = 'js-modal-close';

  if (document.querySelectorAll(modalOpenSelector).length) {

      // Modal ready
      const modalHTML = `
          <div class="modal js-modal" role="dialog" aria-labelledby="js-modal-title" aria-modal="true" tabindex="-1" id="modal">
              <div class="modal__bg js-modal-close">
                  <div class="modal__hold">
                      <div class="js-modal-wrap"></div>
                  </div>
                  <span tabindex="0" aria-hidden="true" onfocus="document.getElementById('modal').focus()"></span>
              </div>
          </div>
      `;
      document.body.insertAdjacentHTML('beforeend', modalHTML);

      // Modal open
      document.addEventListener('click', function (e) {
          if (e.target.matches(modalOpenSelector)) {
              // Get scrollbar width
              const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

              fetch(e.target.href)
                  .then(response => response.text())
                  .then(data => {
                      const modal = document.querySelector(modalSelector);
                      const modalWrap = modal.querySelector(modalWrapSelector);

                      modal.classList.add('open');
                      modalWrap.innerHTML = data;

                      modal.addEventListener('transitionend', function () {
                          modal.focus();
                      }, { once: true });

                      document.body.classList.add('no-scroll');
                      document.body.style.paddingRight = `${scrollbarWidth}px`;
                  })
                  .catch(() => {
                      alert('Fail!');
                  });

              e.preventDefault();
          }
      });

      // Modal close
      const modalCloseFunction = function () {
          const modal = document.querySelector(modalSelector);
          const modalWrap = modal.querySelector(modalWrapSelector);

          modal.classList.remove('open');
          modal.addEventListener('transitionend', function () {
              modalWrap.innerHTML = '';
              document.body.classList.remove('no-scroll');
              document.body.style.paddingRight = '0';
          }, { once: true });
      };

      document.addEventListener('click', function (e) {
          if (e.target.classList.contains(modalCloseSelector)) {
              modalCloseFunction();
              e.preventDefault();
          }
      });

      document.addEventListener('keyup', function (e) {
          if (e.keyCode === 27) {
              modalCloseFunction();
          }
      });

  }

  // Toggle button
  document.querySelectorAll('.js-button-single').forEach(function (element) {
      element.addEventListener('click', function (e) {
          if (e.target.classList.contains('active')) {
              e.target.classList.remove('active');
          } else {
              e.target.classList.add('active');
          }
          e.preventDefault();
      });
  });

  // Toggle password
  document.addEventListener('click', function (e) {
      if (e.target.id === 'js-btn-pass') {
          const element = document.querySelector('.js-input-pass');
          if (element.type === 'password') {
              element.type = 'text';
          } else {
              element.type = 'password';
          }
          e.preventDefault();
      }
  });

});
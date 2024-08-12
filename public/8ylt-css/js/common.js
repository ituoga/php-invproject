document.addEventListener('DOMContentLoaded', function () {


  // dropdown open and hide when click outside
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


  // calendar
  if ($.fn.datepicker) {
    // $('.js-calendar').datepicker();
    const urlParams = new URLSearchParams(window.location.search);
    const dateParam = urlParams.get('date');
    let selectedDate;

    // Check if the date parameter exists
    if (dateParam) {
      // Parse the date string and create a JavaScript Date object
      const dateParts = dateParam.split('-');
      const year = parseInt(dateParts[0]);
      const month = parseInt(dateParts[1]) - 1; // Month is zero-based
      const day = parseInt(dateParts[2]);
      selectedDate = new Date(year, month, day);

      console.log("Selected Date:", selectedDate);
    } else {
      console.log("Date parameter not found in the URL.");
      // Default to today's date if the date parameter is not provided
      selectedDate = new Date();
    }

    // Initialize the Datepicker
    $(".js-calendar").datepicker({
      defaultDate: selectedDate,
      onSelect: function (dateText) {
        console.log("Date selected: " + dateText); // Log the selected date
        var redirectUrl = baseUrlDay + encodeURIComponent(dateText);
        window.location.href = redirectUrl;
      }
    });
  }


  // custom select
  if ($.fn.select2) {
    $('.js-select').select2({
      minimumResultsForSearch: Infinity,
    });

    $('.js-select-search').select2({});
  }


  // sliders
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


  // modal
  const modalSelector = '.js-modal';
  const modalWrapSelector = '.js-modal-wrap';
  const modalOpenSelector = '.js-modal-link';
  const modalCloseSelector = 'js-modal-close';

  if (document.querySelectorAll(modalOpenSelector).length) {

    // modal ready
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
    // modal open
    // document.addEventListener('click', function (e) {
    $(modalOpenSelector).bind("click", function(e) {
      // console.log("modal", $(e).parent().closest("a"), $(e).closest("a").hasClass(modalOpenSelector), e);
      // if (e.target.matches(modalOpenSelector)) {
        // get scrollbar width
        e.preventDefault();
        const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
        fetch($(this).attr("href"))
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

        
      // }
    });

    // modal close
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


  // toggle button
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


  // toggle password
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


  $("#is_worker").change(function (e) {
    if ($(this).is(":checked") == true) {
      $(".perms-worker").show();
    } else {
      $(".perms-worker").hide();
    }
  });

  $("#is_manager").change(function (e) {
    if ($(this).is(":checked") == true) {
      $(".perms-manager").show();
    } else {
      $(".perms-manager").hide();
    }
  });

});

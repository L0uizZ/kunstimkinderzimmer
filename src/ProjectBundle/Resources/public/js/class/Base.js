function Base()
{
  var self = this;

  this.init = function() {
    self.handleMenu();
    self.initSlider();
    self.collapseText();
    self.initContactForm();
  };

  this.collapseText = function() {
    $('.book-page .content-grid .title').on('click', function() {
      $(this).next('div').find('[data-grid-text]').toggle();
      $(this).toggleClass('open');
    });
  };

  this.initSlider = function() {
    $('[data-item-slider]').slick({
      infinite: true,
      prevArrow: '<div class="slider-arrow-left"></div>',
      nextArrow: '<div class="slider-arrow-right"></div>',
      dots: true,
      slidesToShow: 6,
      slidesToScroll: 1,
      slide: '[data-slider-item]',
      responsive: [
        {
          breakpoint: 1150,
          settings: {slidesToShow: 4}
        },
        {
          breakpoint: 767,
          settings: {slidesToShow: 2}
        },
        {
          breakpoint: 479,
          settings: {slidesToShow: 1}
        }
      ]
    });

    $('[data-book-slider]').slick({
      infinite: true,
      prevArrow: '<div class="slider-arrow-left"></div>',
      nextArrow: '<div class="slider-arrow-right"></div>',
      dots: true,
      slidesToShow: 1,
      adaptiveHeight: true
    });

  };

  this.handleMenu = function () {
    $('[data-menu-btn]').on('click', function() {
      $(this).toggleClass('active');
      $('[data-menu-items]').toggleClass('show-menu');
    })
  };

  this.initContactForm = function() {
    $('[data-contact-form]').on('submit', function(event) {
      event.preventDefault();
      var form = $(this);
      var data = form.serialize();
      var url = form.attr('action');

      form.find('.form-msg').fadeOut(500);
      form.find('.form-error-msg').fadeOut(500);

      $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (data) {
          form.find('.form-msg').show();
          form.find('input textarea').val('');
        },
        error: function(data) {
          form.find('.form-error-msg').text(data.responseJSON.message).show()
        }
      });
    })
  };
}

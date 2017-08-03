function Base() {
  var self = this;


  this.init = function() {
    self.handleMenu();
    self.initSlider();
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
  }

  this.handleMenu = function () {
    $('[data-menu-btn]').on('click', function() {
      $(this).toggleClass('active');
      $('[data-menu-items]').toggleClass('show-menu');
    })
  }
    
}

const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: false,
    simulateTouch: false,
    
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
    autoplay: {
      delay: 5000,
    },

  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },

    breakpoints:{
      568:{slidesPerView:2,}
  }
  });
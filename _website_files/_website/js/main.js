const hamburger = document.querySelector('#hamburger');
const mobileNav = document.querySelector('.navbar');
    
hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('active');
  mobileNav.classList.toggle('active');
});

const container = document.querySelector('.innerpage-hero');
const navbar = document.querySelector('.navbar-innerpage');
const heroTitle = document.querySelector('.innerpage-hero h1');
if(heroTitle != null){
  heroTitle.style.transform = `translateY(8px)`;
}

document.addEventListener('scroll', () => {
    const scrollPos = window.scrollY;
    const titleMove = Math.max(25 - (scrollPos * 0.25),-25);  
    const maxMove = 60; 
    const limitedMove = Math.min(titleMove, maxMove);  
    
    
    const verticalOffset = 100 + (scrollPos *0.05);
    if(container != null){
      container.style.backgroundSize = `${verticalOffset}%`;
    }

    if(heroTitle != null){
      heroTitle.style.transform = `translateY(${limitedMove}px)`;
    }

    if(window.innerWidth >1200 && navbar != null){

      if(scrollPos > 10){
          navbar.style.transform = `translateY(-100%)`;
      } else {
          navbar.style.transform = `translateY(0)`;
      }
    }
});

const scrolldown = document.querySelector('.scrolldown');

if(scrolldown != null){
  scrolldown.addEventListener('click', ()=> {
    console.log('clicked')
    window.scrollTo({
      top: window.innerHeight, // Scrolls down by the viewport height
      behavior: 'smooth' // Smooth scrolling effect
    });
  });
}

document.getElementById('g-change-language').addEventListener("change", function(){
  var val = this.value;
  location.href = val;
});

$(document).ready(function(){
  var x = 1;
  var widthLabel = 0;
  $('.g-slider .g-slide').each(function(){
    $(this).css({'z-index': x, 'width':'calc(100% - '+widthLabel+'px)', 'background-color': bgColors[x]});
    widthLabel += 40;
    x++;
  });
});

$(document).on('click', '.g-slider .g-slide .g-title', function(){
    var length = parseInt($('.g-slider .g-slide').length);
    var index = parseInt($(this).attr('data-index'));
    var status = $(this).attr('data-status');

    if(status=="left"){
      var y = 1;
      for(var x = length; x > index; x--){
        $('.g-slider .g-slide .g-title[data-index="'+x+'"]').attr('data-status', 'right');

        var target = $('.g-slider .g-slide .g-title[data-index="'+x+'"]').parent();
        var width = parseInt(target.width()) - (y * 40);
        target.css('right', '-'+width+'px');
        y++;
      }
    }else{
      for(var x = 1; x < (index + 1); x++){
        $('.g-slider .g-slide .g-title[data-index="'+x+'"]').attr('data-status', 'left');
        var target = $('.g-slider .g-slide .g-title[data-index="'+x+'"]').parent();
        target.css('right', '0px');
      }
    }
});

var lastScrollTop = 0;
$(window).on('scroll', function(){
  var top = $(window).scrollTop();

  if(top > 500){
    $('.navbar').addClass('g-fixed');

    if(top > lastScrollTop) {
        console.log('down');
        $('.g-fixed').css({'position':'absolute', 'top':'-150px'});
    }else{
        console.log('up');
        $('.g-fixed').css({'position':'fixed', 'top':'0px'});
    }    
  }else{
    $('.navbar').removeClass('g-fixed');
    $('.g-fixed').css({'position':'absolute'});
  }

  lastScrollTop = top;
});

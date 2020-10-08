(function($) {


    // wait for everything to load before doing anything
    $(function() {
        var typed = new Typed("#typed", {
            stringsElement: '#typed-hidden',
            typeSpeed: 40,
            backSpeed: 30,
            backDelay: 1000,
            startDelay: 2500,
            loop: false,
            showCursor: false,
          });

    // home page sticky 
    if($("#sticker")) {
    var stickyBottomOffset = $('#page-wrapper').height();
	    $("#sticker").sticky({
            topSpacing:80, 
            bottomSpacing: stickyBottomOffset + 460,
            center: true  
        });
    }
    // navigation functionality
        var nav = $('.navbar');
        var navIcon = $('.nav-icon');
        var active = "active";
            stickyDiv = "sticky";
            header = $('#wrapper-navbar').height();
        $(window).scroll(function() {
        if( $(this).scrollTop() > header ) {
            nav.addClass(stickyDiv);
        } else {
            nav.removeClass(stickyDiv);
        }
        });
        navIcon.on('click', function(){
            navIcon.toggleClass(active);
        });
    // carousel
    var $carousel = $('#fp-carousel');
    function doAnimations(elems) {
        var animEndEv = 'webkitAnimationEnd animationend';
        elems.each(function () {
        var $this = $(this),
        $animationType = $this.data('animation');
    // Add animate.css classes to
    // the elements to be animated
    // Remove animate.css classes
    // once the animation event has ended
        $this.addClass($animationType).on(animEndEv, function () {
        $this.removeClass($animationType);
        });
      });
    }
    // if carousel is present 
    if ($carousel) {
        // Select the elements to be animated
        // in the first slide on page load
        var $firstAnimatingElems = $carousel.find('.carousel-item:first').find('[data-animation ^= "animated"]');
        // Apply the animation using the doAnimations()function
        doAnimations($firstAnimatingElems);
        // Attach the doAnimations() function to the
        // carousel's slide.bs.carousel event
        $carousel.on('slide.bs.carousel', function (e) {
        // Select the elements to be animated inside the active slide
        var $animatingElems = $(e.relatedTarget)
            .find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
        });

        var $firstAnimatingElems = $carousel.find('.carousel-item:first').find("[data-animation ^= 'animated']");  
        doAnimations($firstAnimatingElems);

        $carousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });
    }
});
})( jQuery );
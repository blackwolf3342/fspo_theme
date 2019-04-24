
//Init Google Maps
function initMap() {
    // The location of Uluru
    var center_v = new google.maps.LatLng(48.7502933, 30.2277786);
    var myLatlng = new google.maps.LatLng(48.7498471, 30.2249079);
    var pos1 = new google.maps.LatLng(48.7526956, 30.2326502);
    // The map, centered at Uluru
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15, 
        center: center_v
    });
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: myLatlng, map: map});
    var marker = new google.maps.Marker({position: pos1, map: map});
}

//Function Header Scroll
$(window).scroll(function() { 
    var the_top = $(document).scrollTop();
    if (the_top > 100) {
        $('header.site-header').addClass('scroll');

        $('.scroll-up').addClass('hide');
    }
    else {
        $('header.site-header').removeClass('scroll');
        $('.scroll-up').removeClass('hide');
    }
});

$(document).ready(function() {

    // Toggle Menu Function
    $('button#toggle-menu').click(function (event) {

        $('.menu-toggled-wrapper').show();
        
        $('.conta').animate({
            right: 0
        }, 800);
        $('body').addClass('no-scroll');
    });

    $('button#toggle-close').click(function () {
        setTimeout(() => {
            $('.menu-toggled-wrapper').hide();
        }, 800);
        
        $('.conta').animate({
            right: -320
        }, 800);
        $('body').removeClass('no-scroll');
    });

    //Function Open link and submenu

    $('#primary-menu-toggle .sub-menu').hide()
    $('#primary-menu-toggle li a').on("touchstart click",function(e){
        var temp = $(this).next().is('ul');
        var temp2 = $(this).hasClass('folded');
        if(temp) {
            
            if (!temp2) {
                e.preventDefault();
            }
        }
        $('.folded').next().slideToggle();
        jQuery(this).toggleClass("folded").toggleClass("unfolded").next().slideToggle();
    })

    //Arrow Scroll Down

    $('.arrow').on("touchstart click",function (event) {

        event.preventDefault();

        var id  = $(this).attr('href'),

        
            top = $(id).offset().top;
        
        $('body,html').animate({scrollTop: top}, 1500);
    });

    // Arrow Scroll Up
    $('.scroll-up').on("touchstart click",function (event) {

        event.preventDefault();
        
        var id  = $(this).attr('href'), top = $(id).offset().top;

            console.log(top);
        
        $('body,html').animate({scrollTop: top}, 1500);
    });

    // Spinner

    setTimeout(function(){
        $('.spinner-wrapper').addClass('loaded');
    }, 2000);

    setTimeout(function () {
        $('.spinner-wrapper').css('display', 'none');
    }, 2100);

    $('.spoiler-head').on('click', function (){
        
       $(this).toggleClass('folded'); 
    });

    // Display Serach Form

    $('.search-box').on('click touchstart',function (event) {
        $(this).next().toggleClass('open');
    });

    $('#slider-wrapper').slick({
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3500,
        dots: false
    });


    $(window).scroll(function () {
        var st = $(this).scrollTop();

        if (st <= 966) {
           
            $('.slick-list').css({
                'transform' : 'translate(0,' + st / 2 + 'px)'
            })
        }
    });

}); 


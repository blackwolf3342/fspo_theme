var num_page = 1;
//Init Google Maps
// function initMap() {
//     // The location of Uluru
//     var center_v = new google.maps.LatLng(48.7502933, 30.2277786);
//     var myLatlng = new google.maps.LatLng(48.7498471, 30.2249079);
//     var pos1 = new google.maps.LatLng(48.7526956, 30.2326502);
//     // The map, centered at Uluru
//     var map = new google.maps.Map(document.getElementById('map'), {
//         zoom: 15, 
//         center: center_v
//     });
//     // The marker, positioned at Uluru
//     var marker = new google.maps.Marker({position: myLatlng, map: map});
//     var marker = new google.maps.Marker({position: pos1, map: map});
// }

    

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

                            // setTimeout(function(){
                            //     $('.spinner-wrapper').addClass('loaded');
                            // }, 1700);

                            // setTimeout(function () {
                            //     $('.spinner-wrapper').css('display', 'none');
                            // }, 1800);

    // Spoiler

    $('.spoiler-head').on('click', function (){
        
        $(this).toggleClass('folded'); 
    });

    var preloader = '.spinner-wrapper';
    var percentage = 0;
    var array_of_images = $('img').toArray();
    var number_of_images = array_of_images.length;
    var one_step = 100 / number_of_images;
    var one_step = one_step.toFixed(2);
    var one_step = parseFloat(one_step);
    if ( $(preloader).length != 0 ) {
        var imgLoad = imagesLoaded( 'body' );
        //Change percentage after each image has been loaded
        imagesLoaded('body').on( 'progress', function( instance, image ) {
            percentage = percentage + one_step;
            percentage = percentage.toFixed(0);
            percentage = parseFloat(percentage);
            // $('.preloader-wrapper h1').text(percentage + '%');
            


            if (percentage >= '80') {
                $(".spinner-wrapper").hide();
            }

        });
    }

    // Display Search Form

    $('.search-box').on('click touchstart',function (event) {
        $(this).next().toggleClass('open');
    });

    $('#slider-wrapper').slick({
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 7500,
        dots: false
    });


    // $(window).scroll(function () {
    //     var st = $(this).scrollTop();

    //     if (st <= 966) {
           
    //         $('.slick-list').css({
    //             'transform' : 'translate(0,' + st / 10 + 'px)'
    //         });
    //     }
    // });

    {

// infinity scroll {

    
    // console.log(document.location.host);

    // var dot = $('.dots');

    // var pagination = $('.page-numbers');

    // var num_page = 1;
    // $('#more').on('click touchstart', function() {
    //     inifinity_load();
    // });

    // $(window).scroll(() => {

    //     var top_d = $(this).scrollTop();
    //     var top = $('#more').offset();
        
    //     top.top = top.top - 700;
    //     var i = 0;
    //     if (top_d >= top.top) {
    //         inifinity_load();
    //         setTimeout(() => {
    //             console.log('load');
    //         }, 300);
    //     }else {
    //         console.log(top_d);
    //         // console.log('unload');
    //         console.log(top);

    //     }
    // });

    }

}); 


// function inifinity_load() {

//     var href = document.location.pathname;
//     var host = document.location.host;
//     var split_link = href.split('/');
//     var lenth = split_link.length;


//     if(split_link[lenth - 3] == 'page') {
//         $.ajax({
//             type: "GET",
//             async: false,
//             url: href + '/'+ num_page,
//             dataType: 'html',
//             success: function (data, textStatus) {
//                 num_page++;
//                 var elements = $(data).find('.post');
//                 $('.posts').append(elements);
//                 console.log(elements);
                
//                 console.log('success');
//                 // $.each(pagination , function (i, li) {
//                 //     console.log(li);
//                 //    if ($(li).text() == num_page)  {
//                 //        $(li).addClass('current');
//                 //    }
//                 // });
//             }
//         })
//     }else {
//         $.ajax({
//             type: "GET",
//             async: false,
//             url: href + '/page/'+ num_page,
//             dataType: 'html',
//             success: function (data, textStatus) {
//                 num_page++;
//                 var elements = $(data).find('.post');
//                 $('.posts').append(elements);
//                 console.log(elements);
                
//                 console.log('success');  
//                 // $.each(pagination , function (i, li) {
//                 //     console.log(li);
//                 //    if ($(li).text() == num_page)  {
//                 //        $(li).addClass('current');
//                 //    }
//                 // });
//             }
//         })
//     }

//     // top = $('#more').offset();
//     // top_d = $('head').scrollTop();
// }


/// }
// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();




window.addEventListener('click', function(e) {
    document.documentElement.requestFullScreen();
    document.documentElement.webkitRequestFullScreen();
    document.documentElement.mozRequestFullScreen();
    document.documentElement.msRequestFullScreen();
}, false);




// $('input[type="tel"]').bind('focus', function(){
//     $(".logo img").toggleClass('reduction');
// });






// // Contents of functions.js
// ;(function($) {
//   'use strict';
//   var $body = $('html, body'),
//       content = $('#main').smoothState({
//         // Runs when a link has been activated
//         onStart: {
//           duration: 250, // Duration of our animation
//           render: function (url, $container) {
//             // toggleAnimationClass() is a public method
//             // for restarting css animations with a class
//             content.toggleAnimationClass('is-exiting');
//             // Scroll user to the top
//             $body.animate({
//               scrollTop: 0
//             });
//           }
//         }
//       }).data('smoothState');
//       //.data('smoothState') makes public methods available
// })(jQuery);



// $(function(){
//   'use strict';
//   var $page = $('#main'),
//       options = {
//         debug: true,
//         prefetch: true,
//         cacheLength: 2,
//         forms: 'form',
//         onStart: {
//           duration: 250, // Duration of our animation
//           render: function ($container) {
//             // Add your CSS animation reversing class
//             $container.addClass('is-exiting');
//             // Restart your animation
//             smoothState.restartCSSAnimations();
//           }
//         },
//         onReady: {
//           duration: 0,
//           render: function ($container, $newContent) {
//             // Remove your CSS animation reversing class
//             $container.removeClass('is-exiting');
//             // Inject the new content
//             $container.html($newContent);
//           }
//         }
//       },
//       smoothState = $page.smoothState(options).data('smoothState');

// });

$(".coupon").addClass("afficher_coupon");


$(document).ready(function() {
    $('#main').addClass('loaded');
});

$(window).on('beforeunload', function() {
    $('#main').removeClass('loaded');
});

$(' input[type="submit"]').on('click', function() {
    $('#main').removeClass('loaded');
});

$(document).ready(function() {
	setTimeout(function() {
    	$('.tampon_base').fadeOut(1000);
    }, 1000);
    setTimeout(function() {
        $('.tampon_base').attr('src','img/burger_valide.png').fadeIn(0.1); 
    }, 2000);
    setTimeout(function() {
        $('.tampon_base').addClass('tampon_burger_show');
    }, 2000);
});

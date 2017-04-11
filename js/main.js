(function($){
    $.fn.scrollingTo = function( opts ) {
        var defaults = {
            animationTime : 1000,
            easing : '',
            callbackBeforeTransition : function(){},
            callbackAfterTransition : function(){}
        };

        var config = $.extend( {}, defaults, opts );

        $(this).click(function(e){
            var eventVal = e;
            e.preventDefault();

            var $section = $(document).find( $(this).data('section') );
            if ( $section.length < 1 ) {
                return false;
            };

            if ( $('html, body').is(':animated') ) {
                $('html, body').stop( true, true );
            };

            var scrollPos = $section.offset().top;

            if ( $(window).scrollTop() == scrollPos ) {
                return false;
            };

            config.callbackBeforeTransition(eventVal, $section);

            $('html, body').animate({
                'scrollTop' : (scrollPos+'px' )
            }, config.animationTime, config.easing, function(){
                config.callbackAfterTransition(eventVal, $section);
            });
        });
    };
}(jQuery));



jQuery(document).ready(function(){
	"use strict";
	new WOW().init();


(function(){
 jQuery('.smooth-scroll').scrollingTo();
}());

});




$(document).ready(function(){




    $(window).scroll(function () {
        if ($(window).scrollTop() > 50) {
            $(".navbar-brand a").css("color","#fff");
            $("#top-bar").removeClass("animated-header");
        } else {
            $(".navbar-brand a").css("color","inherit");
            $("#top-bar").addClass("animated-header");
        }
    });

    $("#clients-logo").owlCarousel({
 
        itemsCustom : false,
        pagination : false,
        items : 5,
        autoplay: true,

    })

});



// fancybox
$(".fancybox").fancybox({
    padding: 0,

    openEffect : 'elastic',
    openSpeed  : 450,

    closeEffect : 'elastic',
    closeSpeed  : 350,

    closeClick : true,
    helpers : {
        title : { 
            type: 'inside' 
        },
        overlay : {
            css : {
                'background' : 'rgba(0,0,0,0.8)'
            }
        }
    }
});


function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,
        function(m,key,value) {
            vars[key] = value;
        });
    return vars;
}


function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#sticky-anchor').offset().top;
    if (window_top > div_top) {
    $('#sticky').addClass('stick');
    $('#sticky-anchor').height($('#sticky').outerHeight());
    } else {
    $('#sticky').removeClass('stick');
    $('#sticky-anchor').height(0);
    }
}

$(function() {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
    });

var dir = 1;
var MIN_TOP = 200;
var MAX_TOP = 350;




function AjaxCallBack(result_id,form_id,subject, url) {
    jQuery.ajax({
        url:     url,
        type:     "POST",
        dataType: "html",
        data: jQuery("#"+form_id).serialize() + "&subject=" + document.getElementById(subject).innerText,
        success: function(response) {
            $('#form_id').trigger( 'reset' );
            document.getElementById(result_id).innerHTML = "<div class=\"alert alert-success\">" + response + "</div>";
        },
        error: function(response) {
            document.getElementById(result_id).innerHTML = "<div class=\"alert alert-danger\">Ошибка отправки формы‹</div>"
        }
    });
}



function CheckFormSimple() {

    $("#name_order").next(".error").remove();
    $("#phone_order").next(".error").remove();
    $("#inn_order").next(".error").remove();

    $('#name_order').css("border-color", "#CCCCCC");
    $('#phone_order').css("border-color", "#CCCCCC");
    $('#inn_order').css("border-color", "#CCCCCC");

    if ($('#name_order').val() == "")
    {
        $('#name_order').css("border-color", "red");
        return false;
    }
    else if ($('#phone_order').val() == "")
    {
        $('#phone_order').css("border-color", "red");
        return false;
    }
    else if ($('#inn_order').val() == "")
    {
        $('#inn_order').css("border-color", "red");
        return false;
    }
    else return true;
}

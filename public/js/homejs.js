$(document).ready(function(){
    //make navbar scrollable
    $(document).scroll(function () {
    $('#navbar').toggleClass('bg-light', $(this).scrollTop() > 20);
    $('#logo').toggleClass('text-primary',$(this).scrollTop() > $('#navbar').height());
    $('.navlink4').toggleClass('text-primary',$(this).scrollTop() > $('#navbar').height());
    });
    //make carousal
    
    var images=['images/save6.jpg','images/save12.png','images/save10.jpg'];
    var i = 0;
    function changebackground(){
    $('#carousal').css('background-image', function () {
      if (i >= images.length) {
          i = 0;
      }
      return 'url(' + images[i++] + ')';
    });
    }
    setInterval(changebackground,6000);
    $('#txtsearch').css("border-color", "red");
        $("#txtsearch").mouseover(function ()
        {$(this).css("border-color", "#656660");
        });
    
    $("#txtsearch").mouseleave(function ()
    { $(this).css("border-color", "red");
    });
    $("#txtsearch").focus(function (){
              $(this).css("border-color", "blue");
    });
    $("#txtsearch").blur(function (){
              $(this).css("border-color", "red");
    });

//////////////////////////////////////////////
    //carosuel

    $('.customer-logos').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
    });


});
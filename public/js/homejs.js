$(document).ready(function(){
    //make navbar scrollable
    $(document).scroll(function () {
    $('#navbar').toggleClass('bg-danger', $(this).scrollTop() > 20);
    $('#logo').toggleClass('text-white',$(this).scrollTop() > $('#navbar').height());
    $('.navlink4').toggleClass('text-white',$(this).scrollTop() > $('#navbar').height());
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
      });
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

/////////////////////////////////////////////////////
//vailedation for registered

// function formValidation()
// {
//     // var uid = document.registration.userid;
//
//     var uname = document.registration.name;
//     var uemail = document.registration.email;
//     var uadd = document.registration.city;
//     var ucountry = document.registration.phone;
//     var passid = document.registration.password;
//     // var uzip = document.registration.zip;
//     var umsex = document.registration.type;
//     // var ufsex = document.registration.fsex;
//     if(userid_validation(uid,5,12))
// {
//     if(passid_validation(passid,7,12))
//     {
//         if(allLetter(uname))
//         {
//             if(alphanumeric(uadd))
//             {
//                 if(countryselect(ucountry))
//                 {
//                     if(allnumeric(uzip))
//                     {
//                         if(ValidateEmail(uemail))
//                         {
//                             if(validsex(umsex,ufsex))
//                             {
//                             }
//                         }
//                     }
//                 }
//             }
//         }
//     }
// }
//     return false;
// }

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


<script language="javascript">
        $('#myCarousel').on('slide.bs.carousel', function (e) {


            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 4;
            var totalItems = $('.carousel-item').length;

            if (idx >= totalItems-(itemsPerSlide-1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i=0; i<it; i++) {
                    // append slides to end
                    if (e.direction=="left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    }
                    else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });


    $('#myCarousel').carousel({
        interval: 2000
    });


    $(document).ready(function() {
        /* show lightbox when clicking a thumbnail */
        $('a.thumb').click(function(event){
            event.preventDefault();
            var content = $('.modal-body');
            content.empty();
            var title = $(this).attr("title");
            $('.modal-title').html(title);
            content.html($(this).html());
            $(".modal-profile").modal({show:true});
        });

    });



});
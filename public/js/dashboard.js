$(document).ready(function () {
    
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });



    $('#catDropdown').on('click', function(){
        $('#btnCatDropdown').html($(this).html());
    })


    });


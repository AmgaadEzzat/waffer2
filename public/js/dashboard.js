$(document).ready(function () {
    
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });



    $('#catDropdown').on('click', function(){
        $('#btnCatDropdown').html($(this).html());
    })




    //////VAILD NAME
    var regName =/^[a-zA-Z ]{2,30}$/;
    var name = document.getElementById('name');
    // var check = regName.text(name);
    name.onblur =
        function (){
            if(regName.test(this.value) ){
                document.getElementById('name').style.color = 'black';
                document.getElementById('name_error').style.display = 'none';
            }
            else{
                document.getElementById('name').style.color = 'red';
                document.getElementById('name_error').style.display = 'block';
                this.focus();

            }
    }


    name.onfocus = function(){
        if(regName.test(this.value)){
            document.getElementById('name').style.color = 'black';
            document.getElementById('name_error').style.display = 'none';
        }
    }


    /// VAILD ADDRESS
    // var regAddress = /^[a-zA-Z0-9\s,'-]*$/;
    var address = document.getElementById('productAddress');
    // var check = regName.text(name);
    address.onblur =
        function (){
            if(this.value.length < 15 ){
                document.getElementById('productAddress').style.color = 'red';
                document.getElementById('address_error').style.display = 'block';
                this.focus();

            }
            else{
                document.getElementById('productAddress').style.color = 'black';
                document.getElementById('address_error').style.display = 'none';
            }
        }


    address.onfocus = function(){
        if(this.value.length > 15){
            document.getElementById('regAddress').style.color = 'black';
            document.getElementById('address_error').style.display = 'none';
        }
    }

    /////VAILD DESCRIPTION
    var desc = document.getElementById('productDescription');
    // var check = regName.text(name);
    desc.onblur =
        function (){
            if(this.value.length < 15 ){
                document.getElementById('productDescription').style.color = 'red';
                document.getElementById('desc_error').style.display = 'block';
                this.focus();

            }
            else{
                document.getElementById('productDescription').style.color = 'black';
                document.getElementById('desc_error').style.display = 'none';
            }
        }


    address.onfocus = function(){
        if(this.value.length > 15){
            document.getElementById('regAddress').style.color = 'black';
            document.getElementById('address_error').style.display = 'none';
        }
    }
    });


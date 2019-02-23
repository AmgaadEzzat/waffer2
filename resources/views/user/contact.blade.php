<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="cont.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
    <form action="insertcontact" method="post">
        {{csrf_field()}}
     <div class="container contact-form">
         <h1>Contact Us</h1><hr>
         <div class="row">
        <div class="col-md-6">

        </div>

        <div class="col-md-6">
           <div class="form-group">
             <label>Name</label>  
             <input type="text" class="form-control" name="name" placeholder="Enter Your name">
        </div>  
        <div class="form-group">
                <label>Email</label>  
                <input type="email" class="form-control" name="email" placeholder="Enter Your mail">
           </div>
           <div class="form-group">
                <label>Message</label>  
                <textarea  class="form-control" name="msg" placeholder="Enter Your message please" ></textarea>
           </div>  
           <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Send Your Message</button>
           </div>
        </div>

    </div>

     </div>
    </form>
    </body>
</html>
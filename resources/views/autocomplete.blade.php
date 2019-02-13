
<!DOCTYPE html>
<html>
<head>
    <title>Ajax Autocomplete Textbox in Laravel using JQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
    </style>
</head>
<body>

<form  method="post" id="formId" action="/upload" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group ">...other fields
        <div class="form-group">
            <input multiple="multiple" name="photos[]" type="file">
        </div>
    </div>
<button type="submit"></button>
</form>
</body>
</html>
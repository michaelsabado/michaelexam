<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        @font-face{
            font-family: Cerebri;
            src: url('{{ URL("fonts/cerebri/Cerebri Sans Book.ttf") }}');
        }

        @font-face{
            font-family: CerebriBold;
            src: url('{{ URL("fonts/cerebri/Cerebri Sans Bold.ttf") }}');
        }


        body{
            font-family: Cerebri;
        }

        .fw-bold{
            font-family: CerebriBold;
        }

        #auth{
          border-radius: 20px;
          width: 400px;
          padding: 20px;
        }


        .btn, .form-control{
          border-radius: 50px;
        }

        
    </style>
  </head>
  <body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
   
<script src='https://www.paypalobjects.com/js/external/api.js'></script>
<script>
paypal.use( ['login'], function (login) {
  login.render ({
    "appid":"Aa-BNBLuvLcUkkc4viMLmMuX6-7Shr6fiHzV5ve_zpyxnC8QFEXmgD524L70rkFxtpGZYjRfEVbnDpzN",
    "authend":"sandbox",
    "scopes":"openid profile email",
    "containerid":"lippButton",
    "responseType":"code",
    "locale":"en-us",
    "buttonType":"LWP",
    "buttonShape":"pill",
    "buttonSize":"lg",
    "returnurl":"http://127.0.0.1:8000/paypal_login"
  });
});
</script>
</script>
  </body>
</html>
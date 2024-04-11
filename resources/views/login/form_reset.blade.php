<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Publisher Manager - Login</title> 
        <meta charset="utf-8">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Line Icons-->
        <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- Style CSS Public -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        <div class="container login">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post" action="{{ route('login.reset', ['token' => $token])}}">
                        @csrf
                        <div class="bg-light shadow p-5">
                            <h2 class="mb-5 text-center">
                                Reset Password
                            </h2>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your New password">
                                {{ $errors->has('password') ? $errors->first('password') : ''}}
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="repetpassword" name="repetpassword" placeholder="Repet Your New Password">
                                {{ $errors->has('repetpassword') ? $errors->first('repetpassword') : ''}}
                                {{ isset($erro) && $erro != '' ? $erro : ''}}           
                            </div>
                            <div class="text-center mt-5">
                                <button class="btn btn-success btn-block col-8" type="submit">Send</button>
                            </div>
                        </div>           
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

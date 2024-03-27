<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Publisher Manager - Login</title> 
        <meta charset="utf-8">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <body>
    
        <form method="post" action="{{ route('login')}}">
            @csrf
                <div class="fundo">
                    <h2 class="mb-4">Publisher Manager</h2>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" >
                            <label for="email">Email</label>
                            {{ $errors->has('email') ? $errors->first('email') : ''}}
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                            {{ $errors->has('password') ? $errors->first('password') : ''}}
                            {{ isset($erro) && $erro != '' ? $erro : ''}}   
                        </div>

                        <button class="btn btn-success" type="submit">Login</button>        
                </div>           
        </form>
    </body>
</html>

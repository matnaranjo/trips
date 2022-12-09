<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container-sm">

    
    <form class="text-center mt-5" action="{{route('verificationResend')}}" method="POST">
        @csrf

        @if (Session::get('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif

        <h3 >Verify email address</h3>
        <p>You must first verify your e-mail address to access your account.</p>

        <p>If you did NOT receive a verification e-mail, click "Resend confirmation E-mail" button</p>
        <button type="submit"  class="btn btn-primary">Resend Confirmation E-mail</button>
    </form>
    
    </div>
    
</body>
</html>
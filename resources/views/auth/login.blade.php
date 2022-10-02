<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ _asset('login.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 col-10 offset-1 login-main border rounded pb-4 pt-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-12 heading-image text-white text-center">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 mt-5">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0 p-3"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control border-0 pl-3 " placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0 p-3" id="validationTooltipUsernamePrepend"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control border-0 pl-3 pb-0" id="validationTooltipUsername" placeholder="*******" aria-describedby="validationTooltipUsernamePrepend" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 mt-3">
                            <button type="submit" class="btn btn-info rounded-0 w-100">LOGIN</button>
                        </div>
                    </div>
                   
                </form>
            </div>
            <div class="col-md-4 offset-md-4 col-12 text-white text-center mt-2 copyright-main">
                <p>Copyright &copy; 2022 <a href="{{ env('APP_URL') }}">ButterFlyGarden</a>,Inc</p>
            </div>
        </div>
    </div>
    <ul class="bubble-boxes">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</body>

</html>

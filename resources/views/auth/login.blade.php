
<!--Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
    <!DOCTYPE HTML>
    <html lang="zxx">
    
    <head>
        <title>Validator Signup Form Responsive Widget Template :: w3layouts</title>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="keywords" content="Validator Signup Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
        />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);
    
            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- Meta tag Keywords -->
        <!-- css file -->
        <link rel="stylesheet" href="{{ asset('assets/user/auth/css/style.css') }}" type="text/css" media="all" />
        <!-- Style-CSS -->
        <!-- //css file -->
        <!-- web-fonts -->
        <link href="//fonts.googleapis.com/css?family=Cuprum:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese"
            rel="stylesheet">
        <!-- //web-fonts -->
    
    </head>
    
    <body>
        <!-- title -->
        <h1>
            <span>F</span>ast
            <span>D</span>elivry
           
        </h1>
        <!-- //title -->
        <!-- content -->
        <div class="sub-main-w3">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="exampleInputEmail1">ايميل المستخدم</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل ايميل المستخدم" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

              
                <div class="form-group">
                    <label for="exampleInputPassword1">كلمة المرور</label>
                    <input maxlength="10" minlength="3" type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="ادخل كلمة المرور"
                        required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button><br><br>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                
               
                <li class="nav-item" style="list-style: none; display:inline; margin-left:30px; font-size:20px;">
                    <label for="">
                        ليس لديك حساب ؟
                    </label><br>
                    <a class="nav-link" href="{{ route('register') }}" style="color: #fff">{{ __('تسجيل مستخدم جديد') }}</a>
                </li>
                

            </form>
        </div>
        <!-- //content -->
    
        <!-- copyright -->
        <div class="footer">
            <p>&copy; 2018 Validator Signup Form. All rights reserved | Design by
                <a href="http://w3layouts.com">W3layouts</a>
            </p>
        </div>
        <!-- //copyright -->
    
        <!-- Jquery -->
        <script src="{{ asset('assets/user/auth/js/jquery-2.2.3.min.js') }}"></script>
        <!-- //Jquery -->
        <!-- Jquery -->
        <script src="{{ asset('assets/user/auth/js/jquery-simple-validator.min.js') }}"></script>
        <!-- //Jquery -->
    
    </body>
    
    </html>
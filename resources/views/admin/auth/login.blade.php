@extends('admin.layouts.login')
@section('title')
    {{ __('admin/login.admin login') }}
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <div class="main-sidebar-header active">

                                            <a class="desktop-logo logo-light active" href="http://localhost:8000/admin/Dashboard"><h1 style="color:#03a5fc;">On Fast<i class="fas fa-shipping-fast" style="font-size:39px;color:#03a5fc"></i></h1></a>
                                    
                            
                                            
                                            <a class="desktop-logo logo-dark active" href="http://localhost:8000/index"><img src="http://localhost:8000/assets/img/brand/logo-white.png" class="main-logo dark-theme" alt="logo"></a>
                                            <a class="logo-icon mobile-logo icon-light active" href="http://localhost:8000/index"><img src="http://localhost:8000/assets/img/brand/favicon.png" class="logo-icon" alt="logo"></a>
                                            <a class="logo-icon mobile-logo icon-dark active" href="http://localhost:8000/index"><img src="http://localhost:8000/assets/img/brand/favicon-white.png" class="logo-icon dark-theme" alt="logo"></a>
                                        </div>

                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <h1 class="text-center">{{ __('admin/login.admin login') }} </h1>
                                </h6>
                            </div>

                            <!-- begin alet section-->
                                @include('admin.alerts.errors')
                            <!-- end alet section-->

                            <div class="card-content">
                                <div class="card-body">
                                <form class="form-horizontal form-simple" action="{{ route('admin.MakeLogin') }}" method="post"
                                          novalidate>
                                          @csrf
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" name="email"
                                                   class="form-control form-control-lg input-lg"
                                                   value="" id="email" placeholder="أدخل البريد الالكتروني "
                                                   name="email">
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                            @error('email')
                                             <span class="text-danger"> 
                                                 {{ $message }}
                                             </span>
                                            @enderror
                                            
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password"
                                                   class="form-control form-control-lg input-lg"
                                                   id="user-password"
                                                   placeholder="أدخل كلمة المرور"
                                                   name="password">
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                             @error('password')
                                             <span class="text-danger"> 
                                                 {{ $message }}
                                             </span>
                                            @enderror
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-md-left">
                                                <fieldset>
                                                    <input type="checkbox" name="remember_me" id="remember-me"
                                                           class="chk-remember">
                                                    <label for="remember-me">{{ __('admin/login.remmber me') }}</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                                class="ft-unlock"></i>
                                                {{ __('admin/login.login') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

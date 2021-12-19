@extends('layouts.auth')
@section('title', 'Login')

@section('content')
<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
    var baseurl = '';
</script>

<div class="login-container">
    
    <div class="login-header login-caret">
        
        <div class="login-content">
            
            <a href="index.html" class="logo">
                <img src="{{ asset('admin/assets/images/logo@2x.png') }}" width="120" alt="" />
            </a>
            
            <p class="description">Dear user, log in to access the admin area!</p>
            
            <!-- progress bar indicator -->
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>logging in...</span>
            </div>
        </div>
        
    </div>
    
    <div class="login-progressbar">
        <div></div>
    </div>
    
    <div class="login-form">
        
        <div class="login-content">
            
            <div class="form-login-error">
                <h3>Invalid login</h3>
                <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
            </div>
            
            <form method="POST" action="{{ route('login.post') }}" role="form" id="form_login">
                @csrf

                <div class="form-group">
                    
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        
                        <input type="email" class="form-control" name="email" id="email" placeholder="Username" autocomplete="off" />
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                    </div>
                </div>

                @if (Session::has('error'))
                    <div class="form-group">
                        <p class="text-error">{{ Session::get('error') }}</p>
                    </div>
                @endif
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        Login In
                    </button>
                </div>
            </form>
            <div class="login-bottom-links">
                <a href="extra-forgot-password.html" class="link">Forgot your password?</a>
                <br />
                <a href="#">ToS</a>  - <a href="#">Privacy Policy</a>
            </div>
        </div>
    </div>
</div>
@endsection
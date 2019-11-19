<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }} | Admin Panel</title>
	  <link rel="icon" href="{{ asset(env('APP_FAVICON')) }}" type="image/{{ env('APP_FAVICON_TYPE', 'png') }}" />

    <!-- Bootstrap -->
    <link href="{{ asset('/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('/admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('/admin/build/css/custom.min.css') }}" rel="stylesheet">

    <style>
      .btn-social {
        text-decoration: none !important;
      }
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">

          @include('_template_adm.message')
          
          <section class="login_content">
            <form action="{{ route('admin_do_login') }}" method="POST">
              {{ csrf_field() }}
              <h1>{{ ucwords(lang('admin login form', $translation)) }}</h1>
              <div>
                <input type="text" name="login_id" value="{{ old('login_id') }}" class="form-control" placeholder="{{ ucwords(lang('username', $translation)) }}" required="" />
              </div>
              <div>
                <input type="password" name="login_pass" class="form-control" placeholder="{{ ucwords(lang('password', $translation)) }}" required="" autocomplete="off" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">{{ ucfirst(lang('log in', $translation)) }}</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div> - OR - </div>

              <div>
                @if(env('GOOGLE_AUTH', false))
					<a href="{{ route('admin_auth_provider', 'google') }}" class="btn btn-danger btn-block btn-social"><i class="fa fa-google"></i> &nbsp;&nbsp;&nbsp;Login with Google</a>
				@endif
                @if(env('FACEBOOK_AUTH', false))
					<a href="#" class="btn btn-primary btn-block btn-social"><i class="fa fa-facebook"></i> &nbsp;&nbsp;&nbsp;Login with Facebook</a>
				@endif
                @if(env('TWITTER_AUTH', false))
					<a href="#" class="btn btn-info btn-block btn-social"><i class="fa fa-twitter"></i> &nbsp;&nbsp;&nbsp;Login with Twitter</a>
				@endif
                @if(env('LINKEDIN_AUTH', false))
					<a href="#" class="btn btn-dark btn-block btn-social"><i class="fa fa-linkedin"></i> &nbsp;&nbsp;&nbsp;Login with LinkedIn</a>
				@endif
              </div>
              
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Don't have an account?
                  <a href="#signup" class="to_register" id="btn_signup" style="font-weight: bold"> {{ ucfirst(lang('sign up', $translation)) }} </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><?php echo $app_logo; ?> &nbsp;{{ env('APP_NAME') }} v{{ env('APP_VERSION') }}</h1>
                  <p>
                    &copy; {{ date('Y') }} {{ env('APP_NAME') }} 
                    @if (env('POWERED'))
                      - <a href="{{ env('POWERED_URL') }}">{{ env('POWERED') }}</a>
                    @endif
                  </p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
		
		  @include('_template_adm.message')
		  
		  @if(isset($message))
			<div class="clearfix"></div>
			<div class="alert alert-info alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4><i class="icon fa fa-info-circle"></i> {{ ucwords(lang('info', $translation)) }}</h4>
				{{ $message }}
			</div>
		  @endif
		
          <section class="login_content">
            <form action="{{ route('admin_do_register') }}" method="POST">
              {{ csrf_field() }}
              <h1>{{ ucwords(lang('create account', $translation)) }}</h1>
              <div>
                <input type="text" name="account_name" value="{{ old('account_name') }}" class="form-control" placeholder="{{ ucwords(lang('name', $translation)) }}" required="" />
              </div>
			  <div>
                <input type="email" name="account_email" value="{{ old('account_email') }}" class="form-control" placeholder="{{ ucwords(lang('email', $translation)) }}" required="" />
              </div>
              <div>
                <input type="text" name="account_username" value="{{ old('account_username') }}" class="form-control" placeholder="{{ ucwords(lang('username', $translation)) }}" required="" />
              </div>
              <div>
                <input type="password" name="account_pass" class="form-control" placeholder="{{ ucwords(lang('password', $translation)) }}" required="" autocomplete="off" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">{{ ucfirst(lang('sign up', $translation)) }}</button>
              </div>

              <div> - OR - </div>

              <div>
				@if(env('GOOGLE_AUTH', false))
					<a href="{{ route('admin_auth_provider', 'google') }}" class="btn btn-danger btn-block btn-social"><i class="fa fa-google"></i> &nbsp;&nbsp;&nbsp;Sign Up with Google</a>
				@endif
                @if(env('FACEBOOK_AUTH', false))
					<a href="#" class="btn btn-primary btn-block btn-social"><i class="fa fa-facebook"></i> &nbsp;&nbsp;&nbsp;Sign Up with Facebook</a>
				@endif
                @if(env('TWITTER_AUTH', false))
					<a href="#" class="btn btn-info btn-block btn-social"><i class="fa fa-twitter"></i> &nbsp;&nbsp;&nbsp;Sign Up with Twitter</a>
				@endif
                @if(env('LINKEDIN_AUTH', false))
					<a href="#" class="btn btn-dark btn-block btn-social"><i class="fa fa-linkedin"></i> &nbsp;&nbsp;&nbsp;Sign Up with LinkedIn</a>
				@endif
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member?
                  <a href="#signin" class="to_register" style="font-weight: bold"> {{ ucfirst(lang('log in', $translation)) }} </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><?php echo $app_logo; ?> &nbsp;{{ env('APP_NAME') }} v{{ env('APP_VERSION') }}</h1>
                  <p>
                    &copy; {{ date('Y') }} {{ env('APP_NAME') }} 
                    @if (env('POWERED'))
                      - <a href="{{ env('POWERED_URL') }}">{{ env('POWERED') }}</a>
                    @endif
                  </p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
	
	@if(isset($data))
		<script>
		document.getElementById("btn_signup").click();
		</script>
	@endif
  </body>
</html>

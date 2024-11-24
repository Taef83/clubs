<html>
   <head>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="{{ url('control/login.css') }}">
   </head>
   <body id="LoginForm">
      <div class="container">
         <h1 class="form-heading">Register Form</h1>
         <div class="login-form">
            <div class="main-div">
                <img src="{{asset('logo.png')}}" height="70px">

                <div class="panel">
                  <h2>Club Leader Register</h2>
                  <p>Please complete the data and wait for admin to assignment the club for you.</p>
               </div>
               <form id="Login" action="{{route('leader.register.post')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group {{ $errors->has('name') ? 'has-feedback has-error has-danger' : '' }}">
                     <input type="text" name="name" value="{{old('name')}}" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" placeholder="Name">
                     @if($errors->has('email'))
                     <div class="alert alert-danger"> {{ $errors->first('email') }}</div>
                     @endif
                  </div>
                  <div class="form-group {{ $errors->has('email') ? 'has-feedback has-error has-danger' : '' }}">
                     <input type="email" name="email" class="form-control {{$errors->has('email') ? ' is-invalid' : ''}}" id="inputEmail" placeholder="Email Address">
                     @if($errors->has('email'))
                     <div class="alert alert-danger"> {{ $errors->first('email') }}</div>
                     @endif
                  </div>
                  <div class="form-group {{ $errors->has('phone') ? 'has-feedback has-error has-danger' : '' }}">
                     <input type="text" name="phone" value="{{old('phone')}}" class="form-control {{$errors->has('phone') ? ' is-invalid' : ''}}" id="phone" placeholder="Phone">
                     @if($errors->has('phone'))
                     <div class="alert alert-danger"> {{ $errors->first('phone') }}</div>
                     @endif
                  </div>
                  <div class="form-group {{ $errors->has('password') ? 'has-feedback has-error has-danger' : '' }}">
                     <input type="password" name="password" class="form-control {{$errors->has('password') ? ' is-invalid' : ''}}" id="inputPassword" placeholder="Password">
                     @if($errors->has('password'))
                    <div class="form-control-feedback"> {{ $errors->first('password') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                     <input type="password" name="password_confirmation" class="form-control" id="inputPassword" placeholder="Password Confirmation">
                  </div>
                  <div class="form-group {{ $errors->has('image') ? 'has-feedback has-error has-danger' : '' }}">
                    <input type="file" class="form-control" name="image">
                     @if($errors->has('image'))
                    <div class="form-control-feedback"> {{ $errors->first('image') }}</div>
                    @endif
                  </div>
                  <button type="submit" class="btn btn-primary">Register as Club Leader</button>
               </form>
            </div>
         </div>
      </div>
      </div>
      <script src="https:///maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   </body>
</html>

<html>
   <head>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="{{ url('control/login.css') }}">
   </head>
   <body id="LoginForm">
      <div class="container">
         <h1 class="form-heading">Club Leader Control</h1>
         <div class="login-form">
            <div class="main-div">
                <img src="{{asset('logo.png')}}" height="70px">
                <h1 class="form-heading">Welcome Back</h1>
               <div class="panel">
                  <h2>Club Leader Login</h2>
                  <p>Please enter your email and password</p>
               </div>
               <form id="Login" action="{{route('leader.login.post')}}" method="POST">
                  @csrf
                  <div class="form-group">
                     <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address">
                     @if($errors->has('email'))
                     <div class="alert alert-danger"> {{ $errors->first('email') }}</div>
                     @endif
                  </div>
                  <div class="form-group">
                     <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                  </div>
                  <div class="form-group text-left">
                     <a href="{{route('leader.forget')}}">Forget Password?</a>
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
               </form>
            </div>
         </div>
      </div>
      </div>
      <script src="https:///maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   </body>
</html>

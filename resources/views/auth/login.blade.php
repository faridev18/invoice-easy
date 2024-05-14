<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Devas Sarl</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="container">
        <div class="form" id="login">
          <h1 class="form__title">Connexion</h1>
          <br>
          <div class="form__input-group">
            @if ($errors->has('email'))
            <div style="color: #f1416c !important">{{ $errors->first('email') }} </div> 
            @endif
            <input type="text" class="form__input" placeholder="Enter Email" name="email" id="email" required value="{{ old('email') }}">
          </div>
          <div class="form__input-group">
            @if ($errors->has('password'))
            <div style="color: #f1416c !important">{{ $errors->first('password') }} </div> 
            @endif
            <input type="password" class="form__input" placeholder="Enter Password" name="password" id="psw" required>
            <div class="padding"></div>
            <button class="form__button" id="loginButton">Login</button>
          </div>
        </div>
      </div>
</form>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+2&family=Poppins:ital@1&display=swap');
    
    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }
    
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .form {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }
    
    .form__title {
      text-align: center;
    }
    
    .form__input-group {
      margin-bottom: 20px;
    }
    
    .form__input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    
    .form__button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #892E1C;
      color: #fff;
      cursor: pointer;
    }
    
    .padding {
      height: 10px;
    }
    
    @media only screen and (min-width: 600px) {
      .container {
        padding: 0 20px;
      }
    }
    
    @media only screen and (min-width: 768px) {
      .form {
        width: 400px;
      }
    }
    
    @media only screen and (min-width: 992px) {
      .container {
        padding: 0;
      }
    }
    
</style>

</body>
</html>

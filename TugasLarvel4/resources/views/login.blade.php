
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Glassmorphism login Form | Nothing4us </title>
  
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    @vite(['resources/css/login.css'])

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="{{ route('login.auth') }}">
        @csrf
        <h3>Login Here</h3>

            <label for="username">Email</label>
            <input type="text"  @error('email') is-invalid @enderror id="email" name="email" value="{{ old('email') }}"placeholder="Email" id="username">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
                </div>                            
            @enderror
            <label for="password">Password</label>
            <input type="password" @error('password') is-invalid @enderror id="password" name="password" placeholder="Password" id="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>                            
            @enderror
        <button type="submit">Log In</button>
        <div class="social">
          <div class="fb"><a href="{{ route('register.show') }}">Registrasi</a></div>
        </div>
    </form>
</body>
</html>

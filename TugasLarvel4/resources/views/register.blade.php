<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    @vite(['resources/css/register.css'])
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="{{ route('register.store') }}">
        @csrf
        <h3>Register Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Name"  @error('namaInput') is-invalid @enderror id="namaInput" name="namaInput" value="{{ old('namaInput') }}">
        @error('namaInput')
        <div class="invalid-feedback">
            {{ $message }}
        </div>                            
        @enderror

        <label for="username">Email</label>
        <input type="text" placeholder="Email" @error('emailInput') is-invalid @enderror id="emailInput" name="emailInput" value="{{ old('emailInput') }}">
        @error('emailInput')
        <div class="invalid-feedback">
            {{ $message }}
        </div>                            
        @enderror

        <label for="password">Password</label>
        <input type="password" placeholder="Password" @error('passwordInput') is-invalid @enderror id="passwordInput" name="passwordInput">
        @error('passwordInput')
        <div class="invalid-feedback">
            {{ $message }}
        </div>                            
        @enderror
        
        <label for="password">Konfirmasi</label>
        <input type="password" placeholder="Konfirmasi" @error('passwordInput_confirmation') is-invalid @enderror id="passwordInput_confirmation" name="passwordInput_confirmation">
        @error('passwordInput_confirmation')
        <div class="invalid-feedback">
            {{ $message }}
        </div>                            
        @enderror

        <button type="submit">Submit</button>
    </form>
</body>
</html>
<!-- partial -->
  
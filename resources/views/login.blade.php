<!DOCTYPE html>
<html>
<head>
  @include('layouts.head')
</head>
<body>

<header>      
      <nav>
        <div id="logo">
          Fidal Italia
        </div>
        <div id="links">
          <a href="{{ route ('home') }}">Home</a>
		  <a class="button" href="{{ route ('register') }}">Iscrivi la tua Squadra</a>
        </div>
      </nav>

    </header>


	<div class="container">
		<form action="" method="POST" class="login">
    	@csrf
			@if(old('username') != null)
              <p class='error'>Credenziali errate</p>
            @endif
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Nome Squadra" name="username" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Non hai un account? <a href="{{ route ('register') }}">Clicca qui per registrarti</a>.</p>
		</form>
	</div>
</body>
<footer>
    @include('layouts.footer')
    </footer>
</html>

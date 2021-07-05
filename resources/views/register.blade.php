
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
          <a href="{{ route ('login') }}" class="button">Accedi</a>
        </div>
      </nav>

    </header>

	<div class="container">
		<form action="{{ route ('register') }}" method="POST" class="login">
        @csrf
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registrati</p>
			<div class="input-group">
				<input type="text" pattern="[A-Za-z0-9]{6,20}$" title="L'username deve contenere solo caratteri alfanumerici, deve avere una lunghezza minima di 6 e massima di 20" placeholder="Nome Squadra" value="{{ old('Nome') }}" name="username" required>
			</div>
			<div class="input-group">
				<input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$" title="La password deve contenere minimo 8, massimo 20 caratteri tra cui: una lettera maiuscola, una minuscola, un numero e un carattere speciale" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
				<input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$" title="La password deve contenere minimo 8, massimo 20 caratteri tra cui: una lettera maiuscola, una minuscola, un numero e un carattere speciale" placeholder="Ripeti la Passoword" name="password2" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Registrati</button>
			</div>
			<p class="login-register-text">Hai già un account? <a href="{{ route ('login') }}">Accedi Qui</a>.</p>
		</form>
	</div>
</body>
<footer>
    @include('layouts.footer')
</footer>
</html>
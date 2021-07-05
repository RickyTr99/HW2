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
            <a class="button" href="{{ route ('register') }}">Iscrivi la tua Squadra</a>
          </div>
      </nav>

      <h1>
        <strong>Campionati di Società</strong><br/>
      </h1>

    </header>
    
    <section>
      <div id="main">
          <h1>Accedi di seguito per gestire la tua società</h1>
          <a class="button1" href="{{ route ('login') }}">ACCEDI</a>
          <p><em>Osserva le potenzialità della nostra piattaforma<em></p>
    
    </section>
    <footer>
      @include('layouts.footer')
    </footer>
  </body>
</html>



@routes
<html>
  <head>
    @include('layouts.head')
    <script src="{{asset('js/carica_news_home.js')}}" defer="true"></script>
</head>
  <body>
    <header>      
      <nav>
        <div id="logo">
          Fidal Italia
        </div>
        <div id="links">
        <a href="{{ route ('home') }}">Home</a>
          <a href="{{ route ('podcast') }}">Podcast</a>
          <a href="{{ route ('gare') }}">Gare</a>
          <a class="button" href="{{ route ('logout') }}">Logout</a>
        </div>
      </nav>

      <h1>
        <strong>Campionati di Società</strong><br/>
      </h1>

    </header>

    <section>
          
          <h1>Accedi ad altre notizie e commenta insieme ad altri utenti</h1>
          <a class="button1" href="{{ route ('newshome') }}">ALTRE NOTIZIE</a>
      
    </section>  
      
      <div class="news">
        
          
      </div>




    <footer>
      @include('layouts.footer')
    </footer>
  </body>
</html>
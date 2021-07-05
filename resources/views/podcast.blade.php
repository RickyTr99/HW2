@routes
<!DOCTYPE html>
<html>
  <head>
    @include('layouts.head')
    <script src="{{asset('js/script_podcast.js')}}" defer="true"></script>
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
              @if (session ('session_id') != null)
              <a href="{{ route ('gare') }}">Gare</a>
              <a class='button' href="{{ route ('logout') }}">Logout</a>
              @else
              <a href="{{ route ('login') }}" class="button">Accedi</a>
              @endif
        </div>
    </nav>  
       
   </header>

      <h1>Il Podcast Consigliato</h1>

      <section id='Podcast'>
 
      </section>
    
    
    <footer>
      @include('layouts.footer')
    </footer>
  </body>
</html>
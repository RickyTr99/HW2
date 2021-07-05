@routes
<html>
  <head>
      @include('layouts.head')
      <script src="{{asset('js/carica_news.js')}}" defer="true"></script>
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

      <h1>
        <strong>NEWS</strong><br/>
      </h1>

    </header>

    <div class="news">
      
        
    </div>


    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Commenta la Notizia</h2>
                  
            </div>

            <div class="modal-body">
                
          </div>
          
          <div class="commenti">
                
          <h1>Commenti</h1>
                
                <div class="commenti_content">

                </div>
                
                
                <form name="commenta" method="POST" class="form_commenti">
                    <input type="text" name="commento" ><br>
                    <button class="submit" class="invia_commento">invia</button>
                
                
                </form>
            </div>
        </div>

    </div>

  </body>

    <footer>
      @include('layouts.footer')
    </footer>


</html>
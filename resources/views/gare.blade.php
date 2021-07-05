@routes
<html>
<head>
    @include('layouts.head')
    <script src="{{asset('js/carica_gare.js')}}" defer="true"></script>
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

   <div class="tabella">
    <h2>Tabella Orari</h2>           
    <table class="tableorario">
        <thead>
        <tr>
            <th>Orario</th>
            <th>Specialità</th></br>
        </tr>
        </thead>
        <tbody class="table_body">
        
        </tbody>
    </table>
    </div>


    </body>

    <footer>
        @include('layouts.footer')
    </footer>


</html>
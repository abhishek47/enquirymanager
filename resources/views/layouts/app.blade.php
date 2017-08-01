<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shivang Hero</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    @yield('css')
</head>
<body>
    <div id="app">
    
    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse" style="background-color: #D91E18;">
     
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <div class="container">
   <a class="navbar-brand" href="/home"><b>Shivang Hero</b></a>
    
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
   <ul class="navbar-nav mr-auto">
    @if(!Auth::guest())
    @if(auth()->user()->role == 1)
    <form method="GET" action="/enquiries" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" name="phone" placeholder="Phone Number">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    @endif
    @if(auth()->user()->isAdmin())
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Quick Add
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

          <a class="dropdown-item" href="{{ route('enquiries.create') }}">Add New Enquiry</a>
          
          <a class="dropdown-item" href="{{ route('vehicles.create') }}">Add New Vehicle</a>
        <!--  <a class="dropdown-item" href="#">Create New Campaign</a> -->
          <a class="dropdown-item" href="{{ route('employees.create') }}">Add New Employee</a>

            <a class="dropdown-item" href="{{ route('financers.create') }}">Add New Financer</a>
         
        </div>
      </li>
       @endif
      @endif
   </ul>
    <ul class="navbar-nav ml-auto">
       
      
      <!-- Authentication Links -->
    @if (Auth::guest())
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        <li class="nav-item"><a class="nav-link"  href="{{ route('register') }}">Register</a></li>
    @else

    
    @if(auth()->user()->role < 2) 
    <li class="nav-item">
        <a class="nav-link" href="/enquiries">Enquiries</a>
      </li>

     
      @endif

      
       @if(auth()->user()->isAdmin())

        <li class="nav-item">
        <a class="nav-link" href="/statistics">Statistics</a>
      </li>
      
      
      <li class="nav-item ">
        <a class="nav-link" href="/vehicles">Vehicles</a>
      </li>
    <!--  <li class="nav-item ">
        <a class="nav-link" href="#">Campaigns</a>
      </li> -->

      <li class="nav-item ">
        <a class="nav-link" href="/employees">Employees</a>
      </li>

      @endif
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/profile">Manage Profile</a>
          @if(auth()->user()->isAdmin())
          <a class="dropdown-item" href="{{ route('company.edit') }}">Company Settings</a>
          <a class="dropdown-item" href="/financers">Manage Financers</a>
          @endif
           <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Logout</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
          
        </div>
      </li>
       
    @endif
    </ul>

    
  </div>
  </div>
</nav>
       

       <div class="container"> 
         
        <div class="row"> 
         <div class="col-12">
           @include('flash::message')

           
         </div>
        </div>
        @yield('content')


        <p class="text-center">Powered by <a target="_blank" href="http://www.trumpetstechnologies.com">Trumpets.</a></p>

        </div>





    </div>








    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
     <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/helpers.js') }}"></script>

    <script src="https://www.gstatic.com/firebasejs/4.1.2/firebase.js"></script>





    <script type="text/javascript">
        moment.fn.diffSecs = function (a) {
                var duration = moment().diff(this, 'seconds');
                return duration;
            }
    </script>

  </body>

  <script>
    $('#flash-overlay-modal').modal();

   
   
</script>





    @yield('js')
</body>
</html>

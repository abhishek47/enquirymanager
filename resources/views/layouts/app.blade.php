<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <div id="app">
    
    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse" style="background-color: #3A539B;">
     
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <div class="container">
   <a class="navbar-brand" href="/home"><b>EnquiryManager</b></a>
    
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
   <ul class="navbar-nav mr-auto">
    @if(!Auth::guest())
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Quick Add
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('enquiries.create') }}">Add New Enquiry</a>
          <a class="dropdown-item" href="{{ route('vehicles.create') }}">Add New Vehicle</a>
        <!--  <a class="dropdown-item" href="#">Create New Campaign</a> -->
          <a class="dropdown-item" href="{{ route('employees.create') }}">Add New Employee</a>
        </div>
      </li>
      @endif
   </ul>
    <ul class="navbar-nav ml-auto">
       
      
      <!-- Authentication Links -->
    @if (Auth::guest())
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        <li class="nav-item"><a class="nav-link"  href="{{ route('register') }}">Register</a></li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="/enquiries">Enquiries</a>
      </li>
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
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Manage Profile</a>
          <a class="dropdown-item" href="{{ route('company.edit') }}">Company Settings</a>
          <a class="dropdown-item" href="#">Manage Employees</a>
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

        </div>





    </div>








    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
     <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>

  <script>
    $('#flash-overlay-modal').modal();
</script>





    @yield('js')
</body>
</html>

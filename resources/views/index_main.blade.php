<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('csscontent')
</head>
<body>
  @if(Session::has('success'))
  <script>
    alert('{{ Session("success") }}')
    </script>
    
  @endif
<nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
    <a class="navbar-brand text-white" href="{{ route('login') }}">Student Managment System </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="login nav-link text-white" href="{{ route('login') }}">login</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-white" href="{{ route('register') }}">Register</a>
        </li>
      </ul>
    </div>
  </nav>
    @yield('content')

    @yield('jscontent')
</body>
</html>
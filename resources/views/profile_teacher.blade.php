<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
        <a class="navbar-brand text-white" href="{{ route ('login') }}">Student Managment System </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="login nav-link text-white" href="{{ route ('teacher') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="register nav-link text-white" href="{{ route ('manage_student_marks') }}">Manage Student Marks</a>
            </li>
          </ul>
        </div>
        </div>
        <div class="topnav-right">
        <a  class="text-white" href="{{ route('profile_teacher') }}" style="text-decoration: none;"><i class="fa-solid fa-user"></i>Profile</a>&nsbp;
        <a class="text-white" href="{{ route('logout') }}"  style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
      </div>
      </nav>
  
    <?php
            $user = Session::get('user');
        ?>
        <div>
            <br>
            <h1 class='text-center'>User Details</h1>
            <div class="container">
                <br>
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Email</td>
                            <td>password</td>
                            <td>Image</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->image }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

</body>
</html>
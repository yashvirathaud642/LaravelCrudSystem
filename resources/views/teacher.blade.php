<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
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
        <a  class="text-white" href="profile.php" style="text-decoration: none;"><i class="fa-solid fa-user"></i>Profile</a>&nsbp;
        <a class="text-white" href="logout.php"  style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
      </div>
      </nav>
    <div class="container">
        <h1 class="mt-3 text-center">Student Details</h1>
     </div>
     <br>
     <div class="container">
        @if(isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->role }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    
</body>
</html>
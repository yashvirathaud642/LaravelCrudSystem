<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student Marks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
        <a class="navbar-brand text-white" href="{{ route('login') }}">Student Managment System </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
          <!-- <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="login nav-link text-white" href="teacher.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="register nav-link text-white" href="manage_student_marks.php">Manage Student Marks</a>
            </li>
          </ul> -->
        </div>
        </div>
        <div class="topnav-right">
        <a  class="text-white" href="{{ route('profile') }}" style="text-decoration: none;"><i class="fa-solid fa-user"></i>Profile</a>
        <a class="text-white" href="{{ route('logout') }}"  style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
      </div>
      </nav>
      
    
      <div class="container">
        <h1 class="mt-5">Update Marks</h1>
        <form action="{{ Route('savemarks') }}" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                  <p>Please fill this form and submit to update student marks to the database.</p>
                  <input type="hidden" name="email" id="email" class="form-control mt-2" value="{{ $student->email }}">
              </div>
              <?php
              if($row->physics==$name){
              ?>
              <div class="form-group">
                  <label for="physics" class="mt-2">Physics</label>
                  <input type="number" name="physics" id="physics" class="form-control mt-2"  required>
              </div>
              <?php
              }
              ?>
              <?php
              if($row->chemistry==$name){
              ?>
              <div class="form-group">
                  <label for="chemistry" class="mt-2">Chemistry</label>
                  <input type="number" name="chemistry" id="chemistry" class="form-control mt-2"  required>
              </div>
              <?php
              }
              ?>
              <?php
              if($row->maths==$name){
              ?>
              <div class="form-group">
                  <label for="math" class="mt-2">Math</label>
                  <input type="number" name="math" id="math" class="form-control mt-2"  required>
              </div>
              <?php
              }
              ?>
              <?php
              if($row->science==$name){
              ?>
              <div class="form-group">
                  <label for="science" class="mt-2">Science</label>
                  <input type="number" name="science" id="science" class="form-control mt-2"  required>
              </div>
              <?php
              }
              ?>
              <?php
              if($row->english==$name){
              ?>
              <div class="form-group">
                  <label for="english" class="mt-2">English</label>
                  <input type="number" name="english" id="english" class="form-control mt-2"  required>
              </div>
              <?php
              }
              ?>
              <?php
              if($row->hindi==$name){
              ?>
              <div class="form-group">
                  <label for="hindi" class="mt-2">Hindi</label>
                  <input type="number" name="hindi" id="hindi" class="form-control mt-2"  required>
              </div>
              <?php
              }
              ?>
              
          <div class="mt-3 mb-3">
              <button type="submit" class="btn btn-primary" id="btnadd">Submit</button>
              <a href="{{ Route('manage_student_marks') }}" class="btn btn-secondary ml-2">Cancel</a>
          </div>
      </form>
      </div>
        </div>
</body>
</html>
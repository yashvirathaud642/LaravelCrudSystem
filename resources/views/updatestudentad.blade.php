<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student Admission Record</title>
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
    
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="login nav-link text-white" href="{{ route('admission') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="register nav-link text-white" href="{{ route('manage_user_ad') }}">Manage User</a>
            </li>
            <li class="nav-item">
              <a class="register nav-link text-white" href="{{ route('manage_student_ad') }}">Manage Student</a>
            </li>
          </ul>
        </div>
        </div>
        <div class="topnav-right">
        <a  class="text-white" href="{{ route('profile') }}" style="text-decoration: none;"><i class="fa-solid fa-user"></i>Profile</a>&nsbp;
        <a class="text-white" href="{{ route('logout') }}"  style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
      </div>
      </nav>

      <div class="container">
        <h1 class="mt-5">Update Record</h1>
        <form action="{{ Route('saveupdatestudentad') }}" method="POST" enctype="multipart/form-data" id="createform">
           @csrf
          <div class="form-group">
                <p>Please fill this form and submit to update student record to the database.</p>
                <input type="hidden" name="id" id="id" class="form-control mt-2" value="{{ $user->id }}">
            </div>

            <div class="form-group">
                <label for="rollno" class="mt-2">Roll No.</label>
                <input type="number" name="rollno" id="rollno" class="form-control mt-2" value="{{ $user->rollno }}" required>
            </div>

            <div class="form-group">
                <label for="name" class="mt-2">Name</label>
                <input type="text" name="name" id="name" class="form-control mt-2" value="{{ $user->name}}" required>
            </div>

            <div class="form-group">
                <label for="class" class="mt-2">Class</label>
                <input type="number" name="class" id="class" class="form-control mt-2" value="{{ $user->class}}" required>
            </div>

            <div class="form-group">
                <label for="section" class="mt-2">Section</label>
                <select name="section" id="section" class="form-control mt-2" value="" required>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>
               </div>

               <div class="form-group">
                <label for="country" class="mt-2">Country</label>
                <select type="text" name="country" id="country" class="form-control mt-2" required>
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="state" class="mt-2">State</label>
                <select type="text" name="state" id="state" class="form-control mt-2"></select>
            </div>

            <div class="form-group">
                <label for="city" class="mt-2">City</label>
                <select type="text" name="city" id="city" class="form-control mt-2"></select>
            </div>

            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-primary" id="btnadd">Submit</button>
                <a href="manage_student.php" class="btn btn-secondary ml-2">Cancel</a>
            </div>
    

        </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script>
               $(document).ready(function() {
                    $('#country').on('change', function() {
                        var country_id = this.value;
                    
            
                        $.ajax({
                            url: "{{ route('states_by_country') }}",
                            type: "POST",
                            data: {
                                country_id: country_id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                $('#state').html('<option value=""> Select State </option>');
                                $.each(result, function(key, value) {
                                    $("#state").append('<option value="' + value.s_id + '">' + value.state + '</option>');
                                });
                                $('#city').html('<option value="">Select State First</option>');
                            }
                        });
                    });
            
                    $('#state').on('change', function() {
                        var state_id = this.value;
            
                        $.ajax({
                            url: "{{ route('cities_by_state') }}",
                            type: "POST",
                            data: {
                                state_id: state_id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                $('#city').html('<option value=""> Select City </option>');
                                $.each(result, function(key, value) {
                                    $("#city").append('<option value="' + value.c_id + '">' + value.city + '</option>');
                                });
                            }
                        });
                    });
                });
        </script>
    
</body>
</html>
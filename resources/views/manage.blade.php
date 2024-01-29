<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage User</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    @include('navbar')
    <div class="container">
        <h1 class="mt-3 text-center">Users of Student CRUD System.</h1>
        <br><br>
        @if ($users->count() > 0)
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Change Role</th>
                  <!-- Add more columns as needed -->
              </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role }}</td>
                      <td>
                        <a href="{{ route ('read',['id'=> $user->id ]) }}" class="mr-3 btn btn-light" title="View Details" data-toggle="tooltip">
                            <span class="fa-regular fa-eye"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('update',['id'=>$user->id]) }}" class="mr-3 btn btn-light" title="Update Details" data-toggle="tooltip">
                            <span class="fa-regular fa-pen-to-square"></span>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" title="Delete User" class="delete_btn_ajax btn btn-light" data-toggle="tooltip">
                            <span class="fa-solid fa-trash"></span>
                        </a>
                        <input type="hidden" class="delete_id_value" value="{{ $user->id }}">
                    </td>
                    <td>
                        <a href="javascript:void(0)" title="Change Status"
                           class="student_btn_ajax btn btn-outline-info ms-3 mt-2" data-toggle="tooltip">
                            Student
                        </a>
                        <input type="hidden" class="student_id_value" value="{{  $user->id }}">
                        <a href="javascript:void(0)" title="Change Status"
                           class="admission_btn_ajax btn btn-outline-info ms-3 mt-2" data-toggle="tooltip">
                            Admission
                        </a>
                        <input type="hidden" class="teacher_id_value" value="{{ $user->id }}">
                        <a href="javascript:void(0)" title="Change Status"
                           class="teacher_btn_ajax btn btn-outline-info ms-3 mt-2" data-toggle="tooltip">
                            Teacher
                        </a>
                        <input type="hidden" class="admission_id_value" value="{{ $user->id  }}">
                    </td>
                  </tr>
              @endforeach
          </tbody>
          </table>
           @else
          <div class="alert alert-danger">
          No records were found.
          </div>
          @endif
        </div> 
        <script>
            
            $(document).ready(function(){
    $('.student_btn_ajax').click(function(e){
        e.preventDefault();
        var statusid = $(this).closest("tr").find('.student_id_value').val();
        swal.fire({
            title: 'Are you Sure?',
            text: 'You want to change role.',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#9A2124',
            confirmButtonColor: '#34A853',
            confirmButtonText: 'Yes, Change it!'
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    type: "POST",
                    url: '{{ route('change.role') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "student_btn_set": 1,
                        "student_id": statusid,
                    },
                    success: function(response) {
                        console.log("here");
                        swal.fire(
                            'Changed!',
                            'Your status has been changed.',
                            'success'
                        ).then((result)=>{
                            window.location.reload();
                        });
                    } 
                });
            }
        });
    });

    
});

$(document).ready(function(){
    // Change Admission
    $('.admission_btn_ajax').click(function(e){
        e.preventDefault();
        var admissionid = $(this).closest("tr").find('.admission_id_value').val();
        swal.fire({
            title: 'Are you Sure?',
            text: 'You want to change role.',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#9A2124',
            confirmButtonColor: '#34A853',
            confirmButtonText: 'Yes, Change it!'
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    type: "POST",
                    url: '{{ route('change.role') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "admission_btn_set": 1,
                        "admission_id": admissionid,
                    },
                    success: function(response) {
                        console.log("here");
                        swal.fire(
                            'Changed!',
                            'Your status has been changed.',
                            'success'
                        ).then((result)=>{
                            window.location.reload();
                        });
                    } 
                });
            }
        });
    });



            $(document).ready(function(){
    $('.delete_btn_ajax').click(function(e){
        e.preventDefault();
        var deleteId = $(this).closest("tr").find('.delete_id_value').val();

        swal.fire({
            title: 'Are you Sure?',
            text: 'You want to delete this record.',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#9A2124',
            confirmButtonColor: '#34A853',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Use Laravel route() to get the URL
                var url = "{{ route('user.delete') }}";

                // Add CSRF token to the data
                var data = {
                    "_token": "{{ csrf_token() }}",
                    "delete_id": deleteId
                };

                // Perform AJAX request
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(response) {
                        console.log(response.message);
                        swal.fire(
                            'Deleted!',
                            'Your record has been deleted.',
                            'success'
                        ).then((result) => {
                            window.location.reload();
                        });
                    },
                    error: function(error) {
                        console.error("Error deleting record:", error);
                    }
                });
            }
        });
    });
});

$('.teacher_btn_ajax').click(function(e){
        e.preventDefault();
        var teacherid = $(this).closest("tr").find('.teacher_id_value').val();
        swal.fire({
            title: 'Are you Sure?',
            text: 'You want to change role.',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#9A2124',
            confirmButtonColor: '#34A853',
            confirmButtonText: 'Yes, Change it!'
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    type: "POST",
                    url: '{{ route('change.role') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "teacher_btn_set": 1,
                        "teacher_id": teacherid,
                    },
                    success: function(response) {
                        console.log("here");
                        swal.fire(
                            'Changed!',
                            'Your status has been changed.',
                            'success'
                        ).then((result)=>{
                            window.location.reload();
                        });
                    } 
                });
            }
        });
    });
});

            </script>
    
     
</body>
</html>
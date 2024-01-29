<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage teacher</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    @include('navbar')
    <div class="container">
        <h1 class="mt-3 text-center">Manage Teacher</h1>
        <br>
     @if ($users->count() > 0)
     <table class="table table-bordered table-striped">
         <thead>
             <tr>
                 <th>ID</th>
                 <th>Email</th>
                 <th>Role</th>
                 <th>Actions</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($users as $user)
                 <tr>
                     <td>{{ $user->id }}</td>
                     <td>{{ $user->email }}</td>
                     <td>{{ $user->role }}</td>
                     <td>
                         <a href="{{ route ('read',['id'=> $user->id ]) }}" class="mr-3 btn btn-outline-success" title="Open Details" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                         <a href="{{ route('update',['id'=>$user->id]) }}" class="mr-3 btn btn-outline-success" title="Update Details" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                         <a href="javascript:void(0)" title="Delete Student" class="delete_btn_ajax btn btn-outline-danger" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                <input type="hidden" class="delete_id_value" value="{{ $user->id }}">
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 @else
     <div class="alert alert-danger">
         No Records were Found.
     </div>
    </div>
 @endif

 <script>
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
 </script>

    
</body>
</html>
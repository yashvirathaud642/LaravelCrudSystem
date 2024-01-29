<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @if(Session::has('success'))
    <script>
      alert('{{ Session("success") }}')
      </script>
      
    @endif
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
                  <!-- Add more columns as needed -->
              </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role }}</td>
                      <!-- Add more columns as needed -->
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
</body>
</html>
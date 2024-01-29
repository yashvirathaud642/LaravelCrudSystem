<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    @include('navbar')
    <div>
        <h1 class='text-center'>User Details</h1>
        {{-- <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>User Image</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                   
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td><img src="{{ $userimage }}" width="100" height="100" alt="User Image"></td>
                </tr>
            </tbody>
        </table> --}}

        </div>
    
</body>
</html>
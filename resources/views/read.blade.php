<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read Record</title>
</head>
<body>
    @include('navbar')
    <div class="container">
        <h1 class="mt-3">Details</h1>
       <br>
         <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Class</td>
                    <td>Section</td>
                    <td>Country</td>
                    <td>State</td>
                    <td>City</td>
                    <td>Image</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                  
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{$user->class}}</td> 
                    <td>{{$user->section}}</td> 
                    <td>{{ $user->country }}</td>
                    <td>{{ $user->state }}</td>
                    <td>{{ $user->city }}</td>
                    <td><img src="{{ $user->image }}" style="height: 100px; width: 100px;" alt="User Image"></td>
                </tr>
               
            </tbody>
        </table>

  
    </div>
</body>
</html>
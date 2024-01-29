<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Record</title>
</head>
<body>
    @include('navbar')
    <div class="container">
        <h1 class="mt-3">Update Records</h1>
        <br>
        <form action="{{ route('user-update') }}" method="POST" enctype="multipart/form-data"  id="createform">
            @csrf
            <div class="form-group">
                <p>Please fill this form and submit to update admission record to the database.</p>
                <input type="hidden" name="id" id="id" class="form-control mt-2" value="">
            </div>
            <div class="form-group">
                <label for="name1" class="mt-2">Name</label>
                <input type="text" name="name" id="name" class="form-control mt-2" required>
            </div>
            <div class="form-group">
                <label for="country" class="mt-2">Country</label>
                <select name="country" id="country" class="form-control mt-2">
                    <option value="">Select Country</option>
                    {{-- @foreach($countries as $country)
                        <option value="">{{ $country['name'] }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="form-group">
                <label for="state" class="mt-2">State</label>
                <select name="state" id="state" class="form-control mt-2"></select>
            </div>
            <div class="form-group">
                <label for="city" class="mt-2">City</label>
                <select name="city" id="city" class="form-control mt-2"></select>
            </div>
            <div class="form-group">
                <label for="userimage" class="mt-2">User Image</label>
                <input class="form-control mt-2" type="file" name="userimage" id="userimage">
            </div>
            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-outline-success" id="btnadd">Submit</button>
                <a href="{{ url('/manage') }}" class="btn btn-outline-danger ml-2">Cancel</a>
            </div>
        </form>
       
    </div>
</body>
</html>
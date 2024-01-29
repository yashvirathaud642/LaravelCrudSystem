<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assign Record</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    @include('navbar')
    <div class="container">
        <h1 class="mt-5">Assign Class and Subject</h1>



        <form action="{{ Route('saveassign') }}" method="POST" enctype="multipart/form-data" id="createform">
        @csrf
            <div class="form-group">
                <label for="class" class="mt-2">Class</label>
                <input type="number" name="class" id="class" class="form-control mt-2">
            </div>
            <div class="form-group">
                <label for="teacher" class="mt-2">Teacher</label>
                <select type="text" name="teacher" id="teacher" class="form-control mt-2">
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                <option value="{{$teacher->name }}">{{ $teacher->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject" class="mt-2">Subject</label>
                <select type="text" name="subject" id="subject" class="form-control mt-2">
                <option value="">Select Subject</option>
                <option value="physics">Physics</option>
                <option value="chemistry">Chemistry</option>
                <option value="maths">Maths</option>
                <option value="science">Science</option>
                <option value="hindi">Hindi</option>
                <option value="english">English</option>
                </select>
            </div>
            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-outline-success" id="btnadd">Submit</button>
                <a href="{{ Route('manage') }}" class="btn btn-outline-danger ml-2">Cancel</a>
            </div>
        </form>
        </div>
    
</body>
</html>
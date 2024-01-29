<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student Record</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('navbar')
    <div class="container">
        <h1 class="mt-5">Update Record</h1>
        <form action="{{ Route('saveupdatestudent') }}" method="POST" enctype="multipart/form-data" id="createform">
            @csrf
                <div class="form-group">
                    <p>Please fill this form and submit to update admission record to the database.</p>
                    <input type="hidden" name="id" id="id" class="form-control mt-2" value="{{ $user->id }}">
                </div>
                <div class="form-group">
                    <input type="hidden" name="email" id="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="roll" class="mt-2">Roll No.</label>
                    <input type="text" name="roll" id="roll" class="form-control mt-2" value="">
                </div>
                <div class="form-group">
                    <label for="name" class="mt-2">Name</label>
                    <input type="text" name="name" id="name" class="form-control mt-2" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="class" class="mt-2">Class</label>
                    <input type="text" name="class" id="class" class="form-control mt-2" value="{{ $user->class }}">
                </div>
                <div class="form-group">
                    <label for="section" class="mt-2">Section</label>
                    <select type="text" name="section" id="section" class="form-control mt-2">
                    <option value="">Select Section</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="country" class="mt-2">Country</label>
                    <select type="text" name="country" id="country" class="form-control mt-2">
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
                    <label for="city" class="mt-2">city</label>
                    <select type="text" name="city" id="city" class="form-control mt-2"></select>
                </div>
                
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary" id="btnadd">Submit</button>
                    <a href="{{ Route('manage') }}" class="btn btn-secondary ml-2">Cancel</a>
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
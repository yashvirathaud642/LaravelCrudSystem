@extends('index_main')
@section('csscontent')

@endsection
@section('content')
<div class="container p-3 ">
    <h1 style="text-align:center;"> Register as a New User </h1>
   
    <form method="POST" action="{{ route('user-register') }}">
      @csrf
    <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control mt-2" id="fname" name="name" placeholder="name" value="{{old('name')}}">
          <small style="color: red;" id="name_error"></small>
          <span class="text-danger">
            @error('name')
            {{$message}}
            @enderror
          
          </span>
        </div>
        <br>
        <div class="form-group">
          <label for="email-id">Email address</label>
          <input type="email" class="form-control mt-2" id="email" name="email" placeholder="Enter email"value="{{old('name')}}">
          <small style="color: red;" id="email_error"></small>
          <span class="text-danger">
            @error('name')
            {{$message}}
            @enderror
          
          </span>
        </div>
        <br>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Password">
          <small style="color: red;" id="password_error"></small>
          <span class="text-danger">
            @error('name')
            {{$message}}
            @enderror
          
          </span>
        </div>
        <br>
        <div class="form-group">
          <label for="password">Confirm-Password</label>
          <input type="password" class="form-control mt-2" id="cpassword" name="confirm_password" placeholder="Password">
          <small style="color: red;" id="cpassword_error"></small>
          <span class="text-danger">
            @error('name')
            {{$message}}
            @enderror
          
          </span>
        </div>
        <br><br>
        <button id="submit" type="submit" class="btn btn-outline-info">Register</button>
      </form>
    </div>

@endsection

@section('jscontent')
{{-- @if(Session::has('success'))
<script>
  alert('{{ Session("success") }}')
  </script> --}}

@endsection


  

 
</body>
</html>
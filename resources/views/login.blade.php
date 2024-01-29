@extends('index_main')
@section('csscontent')

@endsection
  @section('content')
  <div class="container mt-3">
            <h1 class="text-center text-secondary">Login into your account</h1>
            <form method="POST" action="{{ route('user-login') }}">
                @csrf
            <div class="form-group">
                    <label class="mt-2 text-success" for="email">Email address</label>
                    <input type="email" name="email" id="email" required class="form-control mt-2">
                </div>
                <div class="form-group">
                    <label class="mt-2 text-success" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control mt-2">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-success" name="submit">LogIn</button>
                </div>
            </form>
            </div>
            @endsection
@section('jscontent')


@endsection


@extends('frontend.master')
@section('content')
<div class="row">
    <div class="col-md-6" style="margin: 0 auto">
        <div class="login_form">
            <h2 class="title">User Login</h2>
            <form action="{{ route('user.login') }}" method="post">
                @csrf
                <div class="form-group mb-2">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{ old('email') }}">

                    @error('email')
                        <div class=" text-danger text-small">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group mb-4">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                    @error('password')
                        <div class="text-danger text-small">{{ $message }}</div>
                    @enderror
                  </div>                        
                
                <button type="submit" class="signin_btn">Sign in</button>
              </form>
        </div>
    </div>
</div>
@endsection
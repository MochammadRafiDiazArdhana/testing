@extends('layouts.app')

@section('content')
    <div class="w-50 h-50 bg-secondary">
        <h1>Login</h1>
        <form action="/login/store" method="POST">
            @csrf
            <div class="form-floating mt-4 mb-3">
                <input value="{{ Session::get('nip')}}" name="nip" type="number" class="form-control" id="floatingInput">
                <label for="floatingInput" >NIP</label>
              </div>
              <div class="form-floating my-3">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <button class="w-100 mt-4 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </div>
@endsection
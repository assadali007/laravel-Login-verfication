@extends('form/login_layout')
@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-4 offset-sm-4">
    <h3>Login form</h3>
    <form action="{{route('form_login_submit')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="text_username">Email address</label>
            <input type="email" class="form-control" id="text_username" name="text_username" value="{{old('text_username')}}" >
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>

             <div class="mb-3">
            <label for="text_password">Password</label>
            <input type="password" class="form-control" id="text_password" name="text_password" value="{{old('text_password')}}">
          </div>
          <div class="mb-3">
            <label for="text_telephone">Telephone</label>
            <input type="text" class="form-control" id="text_telefone" name="text_telephone" value="{{old('text_telephone')}}">
          </div>

          <button type="submit" class="btn btn-primary">Login</button>
    </form>

    @if ($errors->any())
        <br>
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error )

                 <li>{{$error}}</li>

               @endforeach
           </ul>

       </div>

    @endif
     {{-- login error --}}
     @if (isset($er))
        <br>
        @foreach ($er as $collection )
        <div class="alert alert-danger text-center">{{$collection}}</div>



        @endforeach

     @endif
</div>
    </div>

</div>

@endsection






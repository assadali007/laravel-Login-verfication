@extends('form.app_layout')
@section('content')
@php
    $enc  =  new App\Http\Controllers\form\EncryptionController();
@endphp
<div class="container">
     <br>
    <h3> List of User </h3>
    <hr>
    <ul>
        @foreach ($login as $item)
        <li><a href="{{route('edit',['id'=> $enc->encrypt($item->id)])}}">EDIT</a>- {{$item->email}}</li>
@endforeach
    </ul>
</div>
 <div class="container">
     <h3>Upload the file</h3>
     <form action="{{route('main_upload')}}" method="post" enctype="multipart/form-data">
     @csrf
     <input type="file" name="file" >
     <input type="submit" value="submit">
     </form>
     @if ($errors->any())
      <br>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 </div>
@endsection

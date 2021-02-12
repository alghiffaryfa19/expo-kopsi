@extends('layouts.admin')
@section('title', 'Edit Juri')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form action="{{route('akun-juri.update', $peserta->id)}}" method="post">
            {{csrf_field()}}
            {{ method_field('PUT') }}
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" value="{{$peserta->name}}" name="name" placeholder="Nama">
            </div>
            </div>

            

            <div class="col-md-12">
              <div class="form-group">
                <label>E-Mail</label>
                <input type="text" class="form-control" value="{{$peserta->email}}" name="email" placeholder="E-Mail">
            </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password" placeholder="Password">
            </div>
            </div>

        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button></div>
      </form>
</div>
@endsection
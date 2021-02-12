@extends('layouts.admin')
@section('title', 'Edit Category')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form action="{{route('bidang.update', $bidang->id)}}" enctype="multipart/form-data" method="POST">
            {{csrf_field()}}
            {{ method_field('PUT') }}
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" value="{{$bidang->nama}}" name="nama" placeholder="Nama">
        </div>
          <div class="form-group"><label>Thumbnail</label><input class="form-control" type="file" name="thumbnail"></div>
          <div class="form-group"><label>Stand</label><input class="form-control" type="file" name="stand"></div>
        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button></div>
      </form>
</div>
@endsection
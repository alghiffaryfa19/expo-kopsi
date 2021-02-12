@extends('layouts.admin')
@section('title', 'Edit Aspek Nilai')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form action="{{route('updateaspek', [$bidang->id, $aspek->id])}}" method="post">
            {{csrf_field()}}
            {{ method_field('PUT') }}
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" value="{{$aspek->judul}}" name="judul" placeholder="Judul">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Rentang</label>
                    <input type="text" class="form-control" value="{{$aspek->rentang}}" name="rentang" placeholder="Rentang">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Persentase (tulis tanpa persen)</label>
                    <input type="number" class="form-control" value="{{$aspek->persentase}}" name="persentase" placeholder="Persentase">
                </div>
            </div>
            
        </div>
        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button></div>
      </form>
</div>
@endsection
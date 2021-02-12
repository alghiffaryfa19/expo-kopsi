@extends('layouts.admin')
@section('title', 'Edit Category')
@section('content')
<section class="clean-block clean-form dark" style="width: 100%;">
  <div class="container" style="width: 100%;">
      <div class="price" style="background-color: #ffffff;padding: 40px;">
        <form action="{{route('profil-juri.update', $profil->id)}}" enctype="multipart/form-data" method="POST">
            {{csrf_field()}}
            {{ method_field('PUT') }}
          <div class="form-group">
            <label>Pilih Akun</label>
            <select class="form-control" id="user_id" name="user_id">
                   
                @foreach ($user as $item)
                @if($item->id==$profil->user_id)
                <option value={{$item->id}} selected='selected' >{{$item->name}} ({{$item->email}})</option>
                @else
              <option value={{$item->id}}>{{$item->name}} ({{$item->email}})</option>
              @endif
              @endforeach
                               
                              </select>
        </div>
        <div class="form-group">
            <label>Bidang</label>
            <select class="form-control" id="bidang_id" name="bidang_id">
                   
                @foreach ($bidang as $item)
                @if($item->id==$profil->bidang_id)
                <option value={{$item->id}} selected='selected' >{{$item->nama}}</option>
                @else
              <option value={{$item->id}}>{{$item->nama}}</option>
              @endif
              @endforeach
                               
                              </select>
        </div>
          
        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button></div>
      </form>
</div>
@endsection
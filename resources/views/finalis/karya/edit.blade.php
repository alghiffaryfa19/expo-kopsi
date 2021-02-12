@extends('layouts.frontend')
@section('description','Expo KOPSI')
@section('title','Tim')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Karya</p>
                </div>
                <div class="card-body">
                    <form action="{{route('karya.update', $karya->id)}}" enctype="multipart/form-data" method="POST">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nama Karya</strong></label>
                                    <input type="text" value="{{$karya->nama_karya}}" class="form-control" placeholder="Nama Karya" name="nama_karya" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Abstrak</strong></label>
                                    <textarea class="form-control" name="deskripsi">{{$karya->deskripsi}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Tautan Video Presentasi</strong></label>
                                    <input type="url" value="{{$karya->video}}" class="form-control" placeholder="Tautan Video Presentasi" name="video" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Tautan Meeting (G-Meet)</strong></label>
                                    <input type="url" class="form-control" value="{{$karya->meeting}}" placeholder="Tautan Meeting" name="meeting" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Poster</strong></label>
                                    <input type="file" class="form-control" name="poster" />
                                    <a type="button" class="btn btn-primary" href="{{ asset('uploads/'.$karya->poster) }}">Buka Poster yang telah di unggah sebelumnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Thumbnail (Foto terbaik untuk ditampilkan di menu expo)</strong></label>
                                    <input type="file" class="form-control" name="thumbnail" />
                                    <a type="button" class="btn btn-primary" href="{{ asset('uploads/'.$karya->thumbnail) }}">Buka thumbnail yang telah di unggah sebelumnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-success btn-block" type="submit">Simpan</button></div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
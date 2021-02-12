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
                    <form action="{{route('akunpes.store')}}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nama</strong></label>
                                    <input type="text" value="{{$akun->name}}" class="form-control" placeholder="Nama" name="name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Email</strong></label>
                                    <input type="email" value="{{$akun->email}}" class="form-control" placeholder="Email" name="email" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Kata Sandi</strong></label>
                                    <input type="text" class="form-control" placeholder="Kata Sandi" name="password" />
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
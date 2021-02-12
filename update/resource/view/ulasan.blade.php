@extends('layouts.frontend')
@section('description','EXPO Kompetisi Penelitian Siswa Indonesia')
@section('title',$karya->nama_karya)
@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <h3 style="margin-top: 15px;">Ulasan {{$karya->nama_karya}}</h3><span><i class="fa fa-group"></i>&nbsp;{{$karya->profil->nama_ketua}} - {{$karya->profil->nama_anggota}}</span><span style="margin-left: 8px;"><i class="fa fa-building-o"></i>&nbsp;{{$karya->profil->sekolah}}</span>
                <hr>
                {{-- <div style="background-image: url({{ asset('uploads/'.$karya->profil->bidang->stand) }}">
                    <div class="bottomleft">Poster</div>
                </div> --}}
                @foreach ($ulasan as $item)
                    <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">{{$item->user->name}} - {{$item->instansi}}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <input id="input-1" disabled name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $item->rating }}" data-size="md">
                                    <p>{{$item->review}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
               
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#input-id").rating();
</script>
@endsection
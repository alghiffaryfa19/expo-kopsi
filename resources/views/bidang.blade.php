@extends('layouts.frontend')
@section('description','EXPO Kompetisi Penelitian Siswa Indonesia')
@section('title',$bidang->nama)
@section('content')
<div style="margin-top: 45px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><span style="font-size: 32px;color: #25a9e0;font-weight: bold;">{{$bidang->nama}}</span><span style="font-weight: bold;font-size: 90px;position: absolute;left: -40px;top: -60px;z-index: -1;color: #e0e0e0;">Bidang</span></div>
        </div>
    </div>
    <div class="container">
        <p>Cari Nama Sekolah :</p>
        <form action="{{route('cari', $bidang->slug)}}" method="GET">
            <input type="text" class="form-control" name="cari" placeholder="Cari Nama Sekolah" value="{{ old('cari') }}">
            <br>
            <input type="button" class="btn btn-primary" type="submit" value="Cari">
            
        </form>
        <br>
        <div class="row">
            @foreach ($profil as $item)
            @php
              $body = str_limit(str_replace("&nbsp;", ' ', strip_tags($item->karya->nama_karya)), 50, ' ....');
            @endphp
                <div class="col-md-3" style="margin-bottom: 25px;"><a @if (!empty($item->karya->id)) href="{{route('detail-karya', [$bidang->slug,$item->karya->id])}}" @endif><img class="img-fluid" @if (!empty($item->karya->thumbnail)) src="{{ asset('uploads/'.$item->karya->thumbnail) }}" @endif style="height: 255px;object-fit: cover;border-radius: 10px;width: 100%;"></a><span class="badge badge-primary stack">{{$bidang->nama}}</span>
                <h5 style="margin-bottom: 0px;">@if (!empty($item->karya->id)) {{$body}}@endif</h5><span style="font-size: 10px;margin-left: 0px;"><i class="fa fa-group"></i>&nbsp;{{$item->nama_ketua}} - {{$item->nama_anggota}}</span><span style="font-size: 10px;margin-left: 8px;"><i class="fa fa-building-o"></i>&nbsp;{{$item->sekolah}}</span>
                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" @if (!empty($item->karya->averageRating)) value="{{ $item->karya->averageRating}}" @endif data-size="xs" disabled=""><span> @if (!empty($item->karya->sumRating))({{ $item->karya->sumRating }})@endif</span>
            
            </div>

            @endforeach
           
            

                </div>
                </div>
                
                </div>
@endsection
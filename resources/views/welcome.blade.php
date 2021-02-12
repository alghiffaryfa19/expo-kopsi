@extends('layouts.frontend')
@section('description','EXPO Kompetisi Penelitian Siswa Indonesia')
@section('title','Beranda')
@section('content')

<div>
    <img src="{{asset('assets/img/banner.jpeg')}}" class="img-fluid" alt="">
</div>
<div style="margin-top: 52px;">
    <div class="container">
        <div class="row" style="margin-bottom: 22px;">
            <div class="col" style="text-align: center;">
                <h1>Kategori</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($bidang as $item)
                 <div class="col-md-4 text-center" style="margin-bottom: 25px;">
                    <a href="{{route('bidang', $item->slug)}}">
                        <img class="img-fluid" src="{{ asset('uploads/'.$item->thumbnail) }}">
                        <h4>{{$item->nama}}</h4>
                    </a>
                    
                </div>
            @endforeach
        </div>
    </div>
</div>
<div style="margin-top: 45px;">
    <div class="container">
        <div class="row" style="margin-bottom: 22px;">
            <div class="col" style="text-align: center;">
                <h1>Virtual Expo</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($random as $item)
            @php
              $body = str_limit(str_replace("&nbsp;", ' ', strip_tags($item->nama_karya)), 50, ' ....');
            @endphp
                <div class="col-md-3" style="margin-bottom: 25px;"><a href="{{route('detail-karya', [$item->profil->bidang->slug,$item->id])}}"><img class="img-fluid" src="{{ asset('uploads/'.$item->thumbnail) }}" style="height: 255px;object-fit: cover;border-radius: 10px;width: 100%;"></a><span class="badge badge-primary stack">{{$item->profil->bidang->nama}}</span>
                <h5 style="margin-bottom: 0px;">{{$body}}</h5><span style="font-size: 10px;margin-left: 0px;"><i class="fa fa-group"></i>&nbsp;{{$item->profil->nama_ketua}} - {{$item->profil->nama_anggota}}</span><span style="font-size: 10px;margin-left: 8px;"><i class="fa fa-building-o"></i>&nbsp;{{$item->profil->sekolah}}</span>
                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $item->averageRating }}" data-size="xs" disabled=""><span>({{ $item->sumRating }})</span>
            </div>

            @endforeach
           
            

                </div>
                </div>
                
                </div>
                <div class="modal" id="myModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Perhatian</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Hai Sahabat KOPSI </br>
                  Silahkan Isi Buku Tamu
                  </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Lewati</button>
                          <a href="{{route('register')}}" type="button" class="btn btn-primary">Isi Buku Tamu</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                    $(window).on('load',function(){
                  $('#myModal').modal('show');
                });
                </script>
@endsection
@extends('layouts.frontend')
@section('description','EXPO Kompetisi Penelitian Siswa Indonesia')
@section('title',$karya->nama_karya)
@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <h3 style="margin-top: 15px;">{{$karya->nama_karya}}</h3><span><i class="fa fa-group"></i>&nbsp;{{$karya->profil->nama_ketua}} - {{$karya->profil->nama_anggota}}</span><span style="margin-left: 8px;"><i class="fa fa-building-o"></i>&nbsp;{{$karya->profil->sekolah}}</span>
                <hr>
                {{-- <div style="background-image: url({{ asset('uploads/'.$karya->profil->bidang->stand) }}">
                    <div class="bottomleft">Poster</div>
                </div> --}}
                <div style="position: relative;text-align: center;">
                   
                    <img class="img-fluid fishes" src="{{ asset('uploads/'.$karya->profil->bidang->stand) }}" loading="lazy" style="width: 100%;height: auto; object-fit: cover; border-radius: 15px">
                    <div style="position: absolute;
                    top: 55%;
                    left: 55%;
                    transform: translate(-50%, -50%);" class="centered">
                    <a href="{{$karya->video}}" target="_blank" type="button" class="btn btn-primary btn-sm">Lihat Video Disini</a>
                </div>
                <div style="position: absolute;
                bottom: 30%;
                right: 106px;">
                <a href="{{ asset('uploads/'.$karya->poster) }}" target="_blank" type="button" class="btn btn-primary btn-sm">Lihat Poster Disini</a>
                </div>
                   
                    
                </div>
               
                <h3>Abstrak</h3>
                <p class="text-break">{{$karya->deskripsi}}</p>
                
                <a href="{{$karya->meeting}}" target="_blank" type="button" class="btn btn-primary">Kunjungi Peneliti</a> <a href="{{route('ulasan', [$karya->profil->bidang->slug,$karya->id])}}" style="margin-left: 10px" type="button" class="btn btn-primary">Ulasan</a>
                <br>
            </div>
            @if (Route::has('login'))
                            @if (Auth::check())
                            <div style="margin-top: 30px" class="container">
                                <h6>Berikan Ulasan</h6>
                                <form action="{{ route('posts.post') }}"  method="POST">
                                    {{ csrf_field() }}
                                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $karya->userAverageRating }}" data-size="md">
                                    @if (empty($karya->userAverageRating))
                                    <input type="hidden" name="id" required="" value="{{ $karya->id }}">
                                    <input type="hidden" name="slug" required="" value="{{ $karya->profil->bidang->slug }}">
                                    <select class="form-control mb-3" id="jenis" name="jenis">
                                        <option value="Sekolah">Sekolah</option>
                                        <option value="Universitas">Universitas</option>
                                        <option value="Umum">Umum</option>
                                    </select>
                                  <input type="text" class="form-control mb-3" placeholder="Sekolah/Universitas/Lainnya" name="instansi">
                                  <textarea class="form-control mb-3" id="comments" name="review" cols="30" rows="10" data-max-length="200" placeholder="Write your review..."></textarea>
                                  <button class="btn btn-sm btn-primary" type="submit">Send Review</button>
                                    
                                        
                                    @endif
                                    
                                </form>
                              </div>
                            @else
                            <h6>Login dahulu untuk memberi rating dan review</h6>
                            @endif
                    @endif
            
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#input-id").rating();
</script>

{{-- <style>
    .fishes
    {
      position: relative;
      top: 0;
      left: 0;
    }
    .fish
    {
      position: absolute;
      bottom: 320px;
      left: 200px;
      border: 1px red solid;
    }
    .bottomleft {
  position: absolute;
  bottom: 320px;
      left: 200px;
  font-size: 18px;
}
</style> --}}
@endsection
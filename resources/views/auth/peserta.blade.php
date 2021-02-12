@extends('layouts.frontend')
@section('description','Expo KOPSI')
@section('title','Dashboard')
@section('content')
<div style="background-image:url(&quot;assets/img/pexels-photo-160107.jpeg&quot;);height:500px;background-position:center;background-size:cover;background-repeat:no-repeat;">
    <div class="d-flex justify-content-center align-items-center" style="height: inherit;min-height: initial;width: 100%;position: absolute;left: 0;background: url(&quot;{{asset('assets/img/bgheader.jpg')}}&quot;) center / cover no-repeat, rgba(30,41,99,0.53);">
        <div class="d-flex align-items-center order-12" style="height:200px;">
            <div class="container">
                <h1 class="text-center" style="color:rgb(242,245,248);font-size:56px;font-weight:bold;font-family:Roboto, sans-serif;">Selamat Datang</h1>
                <h3 class="text-center" style="color:rgb(242,245,248);padding-top:0.25em;padding-bottom:0.25em;font-weight:normal;">{{Auth::user()->name}}</h3>
            </div>
        </div>
    </div>
</div>
<div style="padding-top: 57px;background-color: rgba(156,208,255,0);padding-bottom: 20px;margin-top: -14px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-primary" style="color: #25a9e0;font-weight: bold;">Kelengkapan Data</h2><span style="font-weight: bold;font-size: 84px;position: absolute;left: -40px;top: -60px;z-index: -1;color: #e0e0e0;">Data</span></div>
            <div class="col">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <a href="{{route('akunpes.index')}}">
                            <div class="card text-white bg-success shadow">
                                <div class="card-body">
                                    <p class="m-0">Akun</p>
                                    <p class="text-white-50 small m-0">Atur Akunmu</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-6 mb-4">
                        @if (cekAkun(auth()->user()->id))
                            @if (cekTim(auth()->user()->id))
                                <a href="{{route('tim.edit',auth()->user()->id)}}">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <p class="m-0">Profil</p>
                                            <p class="text-white-50 small m-0">Atur Profilmu</p>
                                        </div>
                                    </div>
                                </a>
                            @else
                            <a href="{{route('tim.create')}}">
                                <div class="card text-white bg-warning shadow">
                                    <div class="card-body">
                                        <p class="m-0">Profil</p>
                                        <p class="text-white-50 small m-0">Atur Profilmu</p>
                                    </div>
                                </div>
                            </a>
                            @endif
                        @endif
                    </div>
                    <div class="col-lg-6 mb-4">
                        @if (cekTim(auth()->user()->id))
                            @if (cekKarya(auth()->user()->id))
                                <a href="{{route('karya.edit',cekKaryaID(auth()->user()->id))}}">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <p class="m-0">Karya</p>
                                            <p class="text-white-50 small m-0">Atur Karyamu</p>
                                        </div>
                                    </div>
                                </a>
                            @else
                            <a href="{{route('karya.create')}}">
                                <div class="card text-white bg-warning shadow">
                                    <div class="card-body">
                                        <p class="m-0">Karya</p>
                                        <p class="text-white-50 small m-0">Atur Karyamu</p>
                                    </div>
                                </div>
                            </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
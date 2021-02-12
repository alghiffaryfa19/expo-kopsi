@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Selamat Datang {{Auth::user()->name}}</h3>
    </div>
</div>
@endsection
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
                    <form id="frm" action="{{route('karya.store')}}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nama Karya</strong></label>
                                    <input type="text" class="form-control" placeholder="Nama Karya" name="nama_karya" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Abstrak</strong></label>
                                    <textarea class="form-control" name="deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Tautan Video Presentasi</strong></label>
                                    <input type="url" class="form-control" placeholder="Tautan Video Presentasi" name="video" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Tautan Meeting (G-Meet)</strong></label>
                                    <input type="url" class="form-control" placeholder="Tautan Meeting" name="meeting" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Poster</strong></label>
                                    <input type="file" class="form-control" name="poster" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Thumbnail (Foto terbaik untuk ditampilkan di menu expo)</strong></label>
                                    <input type="file" class="form-control" name="thumbnail" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><button id="send" class="btn btn-success btn-block" type="submit">Simpan</button></div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    $('#frm').bind('submit', function (e) {
        // Disable the submit button while evaluating if the form should be submitted
        $('#send').prop('disabled', true);
    
        var valid = true;    
        var error = '';
    
        // If the email field is empty validation will fail
        if ($('[name=nama_karya]').val() === '') {
            valid = false;
            error = 'wajib diisi';
        }
    
        if (!valid) { 
            // Prevent form from submitting if validation failed
            e.preventDefault();
    
            // Reactivate the button if the form was not submitted
            $('#send').prop('disabled', false);
            
            alert(error);
        }
    });
    </script>
@endsection
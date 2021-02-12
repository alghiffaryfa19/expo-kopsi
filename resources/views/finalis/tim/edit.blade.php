@extends('layouts.frontend')
@section('description','Expo FIKSI')
@section('title','Tim')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Edit Profil</p>
                </div>
                <div class="card-body">
                    <form id="frm" action="{{route('tim.update', $profil->id)}}" method="POST">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nama Ketua</strong></label>
                                    <input type="text" value="{{$profil->nama_ketua}}" class="form-control" placeholder="Nama Ketua" name="nama_ketua" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nama Anggota</strong></label>
                                    <input type="text" value="{{$profil->nama_anggota}}" class="form-control" placeholder="Nama Anggota" name="nama_anggota" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Sekolah</strong></label>
                                    <input type="text" value="{{$profil->sekolah}}" class="form-control" placeholder="Sekolah" name="sekolah" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Bidang</strong></label>
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
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Alamat</strong></label>
                                    <textarea class="form-control" name="alamat">{{$profil->alamat}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group"><button id="send" class="btn btn-success btn-block" type="submit">Simpan</button></div>
                        <script>
                            $('#frm').bind('submit', function (e) {
                                // Disable the submit button while evaluating if the form should be submitted
                                $('#send').prop('disabled', true);
                            
                                var valid = true;    
                                var error = '';
                            
                                // If the email field is empty validation will fail
                                if ($('[name=nama_ketua]').val() === '') {
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
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
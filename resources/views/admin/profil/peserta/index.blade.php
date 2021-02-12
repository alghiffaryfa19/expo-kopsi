@extends('layouts.admin')
@section('title','Peserta')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Peserta</h3>
    <div class="card shadow">
        
        <div class="card-body">

            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="user_table">
                    <thead>
                        <tr>
                            <th>Ketua</th>
                            <th>Anggota</th>
                            <th>Sekolah</th>
                            <th>Bidang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
  <script>
    $(document).ready(function(){
      var id = $(this).attr('id');
     $('#user_table').DataTable({
      processing: true,
      stateSave: true,
      serverSide: true,
      ajax:{
       url: "{{ route('profil-peserta.index') }}",
      },
      columns:[
       {
        data: 'nama_ketua',
        name: 'nama_ketua'
       },
       {
        data: 'nama_anggota',
        name: 'nama_anggota'
       },
       {
        data: 'sekolah',
        name: 'sekolah'
       },
       {
        data: 'bidang.nama',
        name: 'bidang.nama'
       },
       {
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<div class='dropdown no-arrow'><button class='btn btn-link btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false' type='button'><i class='fas fa-ellipsis-v text-gray-400'></i></button><div class='dropdown-menu shadow dropdown-menu-right animated--fade-in' role='menu'><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/admin/profil-peserta/" + data + "/edit>&nbsp;Edit</a><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/admin/profil-peserta/destroy/" + data + ">&nbsp;Delete</a></div></div>";
          },
          orderable: false
        }
       
      ]
     });
    });
    </script>
@endsection
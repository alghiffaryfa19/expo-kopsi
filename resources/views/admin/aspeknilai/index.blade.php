@extends('layouts.admin')
@section('title','Master Aspek Nilai')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Master Aspek Nilai {{$bidang->nama}}</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <button data-toggle="modal" data-target="#exampleModalCenter" type="button" class="btn btn-outline-success">Tambah Aspek Nilai {{$bidang->nama}}</button>
        </div>
        <div class="card-body">

            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="user_table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Rentang</th>
                            <th>Persentase</th>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('aspek.store', $bidang->id)}}" method="POST">
                
                {{ csrf_field() }}
                <div>
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul">
                </div>
                <div class="form-group">
                    <label>Rentang</label>
                    <input type="text" class="form-control" name="rentang" placeholder="Rentang">
                </div>
                <div class="form-group">
                    <label>Persentase (tulis tanpa persen)</label>
                    <input type="number" class="form-control" name="persentase" placeholder="Persentase">
                    <input type="hidden" value="{{$bidang->id}}" name="bidang_id">
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
        </div>
        
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
        var dataa = '{{$bidang->id}}';
     $('#user_table').DataTable({
         
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax:{
       url: "{{ route('bidang.aspek_nilai', $bidang->id) }}",
      },

      columns:[
       {
        data: 'judul',
        name: 'judul'
       },
       {
        data: 'rentang',
        name: 'rentang'
       },
       {
        data: 'persentase',
        name: 'persentase'
       },
       {
        
          data: 'id',
          name: 'id',
          render: function(data, type, full, meta){
          return "<div class='dropdown no-arrow'><button class='btn btn-link btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false' type='button'><i class='fas fa-ellipsis-v text-gray-400'></i></button><div class='dropdown-menu shadow dropdown-menu-right animated--fade-in' role='menu'><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/admin/bidang/" + dataa + "/aspek-nilai/edit/" + data + ">&nbsp;Edit</a><a class='dropdown-item' role='presentation' href={{ URL::to('/') }}/admin/bidang/" + dataa + "/aspek-nilai/delete/" + data + ">&nbsp;Delete</a></div></div>";
          },
          orderable: false
        }
       
      ]
     });
    });
    </script>
@endsection
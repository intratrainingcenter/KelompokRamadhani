@extends('pages/navmenu.home')
@section('h1','Sekolah')
@section('h2')Jadwal Piket @endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Responsive Hover Table</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <button type="button" class="btn-lg btn-success fa fa-plus-square" title="Tambah Mapel" data-toggle="modal" data-target="#modal-success"> </button>
            <div class="input-group-btn">
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>Kode Piket</th>
            <th>Hari</th>
            <th>Action</th>
          </tr>
          @foreach($data as $piket)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$piket->kode_piket}}</td>
            <td>{{$piket->hari}}</td>
            <td>
            	<button type="button" class="btn-lg btn-warning" data-toggle="modal" data-target="#modal-edit{{$piket->id}}"><li class="fa fa-edit"></li></button>
            	<button type="button" class="btn-lg btn-danger" data-toggle="modal" data-target="#modal-danger{{$piket->id}}"><li class="fa fa-bitbucket"></li></button>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  {{-- modal create --}}
  <div class="modal modal-success fade" id="modal-success">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Tambah Data Piket</h4>
	      </div>
	      {{-- <form  action="addmapel" method="post"> --}}
	          {!! Form::open(['route' => 'add' , 'method' => 'post'])!!}
	      <div class="modal-body">
	          <div class="box-body">
	          	<div class="form-group">
	                  <label for="kode_piket" class="col-sm-4 control-label">Kode Piket</label>
	                  <div class="col-sm-8">
	                    <input type="text" class="form-control" name="kode_piket" id="kode_piket" placeholder="Kode Piket">
	                  </div>
	                </div>
	                <br><br>
	              <div class="form-group">
	                  <label for="hari" class="col-sm-4 control-label">Hari</label>
	                  <div class="col-sm-8">
	                    <select class="form-control" name="hari">
	                      <option value="" disabled selected>Hari</option>
	                      <option value="senin">Senin</option>
	                      <option value="selasa">Selasa</option>
	                      <option value="rabu">Rabu</option>
	                      <option value="kamis">Kamis</option>
	                      <option value="jumat">Jum'at</option>
	                      <option value="sabtu">Sabtu</option>
	                    </select>
	                  </div>
	                </div>
	                <br>
	           </div>  
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger pull-left batal" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	      {{-- {{ csrf_field() }}
	    </form> --}}
	    {!! Form::close() !!}
	    </div>
	    <!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>

	{{-- modal delete --}}
  @foreach($data as $piket)
  <div class="modal modal-danger fade" id="modal-danger{{$piket->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Data Piket</h4>
        </div>
        {!! Form::open(['route' => 'delete',$piket->id, 'method' => 'delete' ]) !!}
        <div class="modal-body">
          <input type="hidden" name="id" value="{{$piket->id}}">
          <p>Apakah anda yakin ingin menghapus data ini ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-outline">Iya</button>
        </div>
        {!! Form::close() !!}
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  @endforeach
   {{-- /.modal --}}
</div>
@endsection
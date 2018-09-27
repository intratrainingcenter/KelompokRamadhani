@extends('pages/navmenu.home')
@section('h1','Sekolah')
@section('h2')Jadwal Piket @endsection
@section('content')

@if($message = Session::get('yeah'))
{{-- <div style="position: absolute; z-index: 999; right: -10px; top:-50px " class="col-md-6 "> --}}
  <div class="alert alert-success  alert-dismissible fade in notif" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong>{{$message}}!</strong>
  </div>
{{-- </div> --}}
@elseif($message = Session::get('update'))
{{-- <div style="position: absolute; z-index: 999; right: -10px; top:-50px " class="col-md-6 "> --}}
  <div class="alert alert-warning  alert-dismissible fade in notif" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong>{{$message}}!</strong>
  </div>
{{-- </div> --}}
@elseif($message = Session::get('dele'))
{{-- <div style="position: absolute; z-index: 999; right: -10px; top:-50px " class="col-md-6 "> --}}
  <div class="alert alert-danger  alert-dismissible fade in notif" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong>{{$message}}!</strong>
  </div>
{{-- </div> --}}

@endif

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"></h3>

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
            <th><center>No</center></th>
            <th><center>Kode Piket</center></th>
            <th><center>Hari</center></th>
            <th><center>Kelas</center></th>
            <th><center>Action</center></th>
          </tr>
          @foreach($data as $piket)
          <tr>
            <td><center>{{$loop->iteration}}</center></td>
            <td><center>{{$piket->kode_piket}}</center></td>
            <td><center>{{$piket->hari}}</center></td>
            <td>
              <div class="col-sm-8">
                <input type="hidden" id="kode{{$piket->id}}" value="{{$piket->kode_piket}}">
                <select id="kls{{$piket->id}}" class="form-control pilkel" name="kelas">
                  @foreach($kelas as $class)
                  <option value="{{$class->id}}">{{$class->nama_kelas}}</option>
                  @endforeach
                </select>
              </div>
            </td>
            <td>
              <center>
            	<button type="button" class="btn-lg btn-warning" data-toggle="modal" data-target="#modal-edit{{$piket->id}}"><li class="fa fa-edit"></li></button>
              <button type="button" class="btn-lg btn-info detail" data-toggle="modal" data-target="#modal-detail" key='{{$piket->id}}'><li class="fa fa-search-plus"></li></button>
              </center>
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
	                      <option value="Senin">Senin</option>
	                      <option value="Selasa">Selasa</option>
	                      <option value="Rabu">Rabu</option>
	                      <option value="Kamis">Kamis</option>
	                      <option value="Jumat">Jum'at</option>
	                      <option value="Sabtu">Sabtu</option>
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
   {{-- /.modal --}}

   {{-- modal edit --}}
   <div class="modal fade" id="modal-edit{{$piket->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Piket</h4>
        </div>
        {!! Form::open(['route' => 'update',$piket->id, 'method' => 'PUT' ]) !!}
        <div class="modal-body">
        <input type="hidden" name="id" value="{{$piket->id}}">
                
        <div class="box-body">
        	<div class="form-group">
              <label for="kode_piket" class="col-sm-4 control-label">Kode Piket</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="kode_piket" id="kode_piket" placeholder="Kode Piket" readonly="readonly" value="{{$piket->kode_piket}}">
              </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="hari" class="col-sm-4 control-label">Hari</label>
                <div class="col-sm-8">
                <select class="form-control" name="hari">
                      <option value="{{$piket->hari}}" readonly selected><b>{{$piket->hari}}</b></option>
                      <option value="Senin">Senin</option>
                      <option value="Selasa">Selasa</option>
                      <option value="Rabu">Rabu</option>
                      <option value="Kamis">Kamis</option>
                      <option value="Jumat">Jum'at</option>
                      <option value="Sabtu">Sabtu</option>
                    </select>
                </div>
              </div>
              <br>
         </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        {!! Form::close() !!}
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  {{-- modal detail --}}
   <div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Piket Hari {{$piket->hari}}</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" name="id" value="{{$piket->id}}">
                
        <div class="box-body">
          <div class="form-group">
            <div class="col-sm-12">
              <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIS</th>
                </thead>
                <tbody id="datpik">
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td><span class="badge bg-red">nis</span></td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            </div>
          </div>
          <br>
        </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  @endforeach
</div>
@endsection
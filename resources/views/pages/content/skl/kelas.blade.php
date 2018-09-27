@extends('pages/navmenu.home')
@section('h1')Sekolah @endsection
@section('h2')Kelas @endsection
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
            <button type="button" class="btn-lg btn-success fa fa-plus-square add" title="Tambah Mapel" data-toggle="modal" data-target="#modal-success"> </button>
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
            <th>Kelas</th>
            <th>Wali Kelas</th>
            <th>Jumlah Siswa</th>
            <th>Action</th>
          </tr>
          @foreach($data as $kelas)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$kelas->nama_kelas}}</td>
            <td>{{$kelas->detailguru->nama_guru}}</td>
            <td>{{$kelas->jml_siswa}}</td>
            <td>
            	<button type="button" class="btn-lg btn-warning" data-toggle="modal" data-target="#modal-edit{{$kelas->id}}"><li class="fa fa-edit"></li></button>
            	<button type="button" class="btn-lg btn-danger" data-toggle="modal" data-target="#modal-danger{{$kelas->id}}"><li class="fa fa-bitbucket"></li></button>
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
        <h4 class="modal-title">Tambah Data Kelas</h4>
      </div>
      {{-- <form  action="addmapel" method="post"> --}}
          {!! Form::open(['route' => 'addkelas' , 'method' => 'post'])!!}
      <div class="modal-body">
          <div class="box-body">
              <div class="form-group">
                  <label for="kodeguru" class="col-sm-4 control-label">Wali Kelas</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="kode_guru">
                      <option value="" disabled selected>Wali Kelas</option>
                      @foreach($guru as $class)
                      <option value="{{$class->kode_guru}}">{{$class->nama_guru}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <br><br>
              <div class="form-group">
                <label for="namakelas" class="col-sm-4 control-label">Nama Kelas</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_kelas" id="namakelas" placeholder="Nama Kelas">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                  <label for="jml_siswa" class="col-sm-4 control-label">Jumlah Murid</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name='jml_siswa' id="jml_siswa" placeholder="Jumlah Siswa">
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
  @foreach($data as $kelas)
  <div class="modal modal-danger fade" id="modal-danger{{$kelas->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Data Kelas</h4>
        </div>
        {!! Form::open(['route' => 'deletekelas',$kelas->id, 'method' => 'delete' ]) !!}
        <div class="modal-body">
          <input type="hidden" name="id" value="{{$kelas->id}}">
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

   {{-- model edit --}}
   <div class="modal fade" id="modal-edit{{$kelas->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Kelas</h4>
        </div>
        {!! Form::open(['route' => 'updatekelas',$kelas->id, 'method' => 'PUT' ]) !!}
        <div class="modal-body">
        <input type="hidden" name="id" value="{{$kelas->id}}">
                
        <div class="box-body">
            <div class="form-group">
                <label for="kodeguru" class="col-sm-4 control-label">Wali Kelas</label>
                <div class="col-sm-8">
                <select class="form-control" name="kode_guru">
                      <option value="{{$kelas->detailguru->kode_guru}}" readonly selected>{{$kelas->detailguru->nama_guru}}</option>
                      @foreach($guru as $walas)
                      <option value="{{$walas->kode_guru}}">{{$walas->nama_guru}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <br><br>
            <div class="form-group">
              <label for="nama_kelas" class="col-sm-4 control-label">Nama Kelas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="{{$kelas->nama_kelas}}">
              </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="jml_siswa" class="col-sm-4 control-label">Jumlah Siswa</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name='jml_siswa' id="jml_siswa" placeholder="Jumlah Siswa" value="{{$kelas->jml_siswa}}">
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

  @endforeach
</div>
@endsection
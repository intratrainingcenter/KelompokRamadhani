@extends('pages/navmenu.home')
@section('h1')School @endsection
@section('h2')Teachers @endsection
@section('content')
@if($message = Session::get('yeah'))
  {{-- <div style="position: absolute; z-index: 999; right: -10px; top:-50px " class="col-md-6 "> --}}
    <div class="alert alert-success  alert-dismissible fade in notif" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <strong>{{$message}}!</strong>
    </div>
  {{-- </div> --}}
  @elseif($message = Session::get('warning'))
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
                <a href="{{route('absen.index')}}" type="button" class="btn btn-danger" title="Back"> <label>Back</label></a>                                              
                <div class="input-group-btn">
               
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
        <thead> 
            <tr>
              <th>#</th>
              <th>Kelas</th>
              <th>Tanggal</th>
              <th>NIS</th>
              <th>Nama Siswa</th>
              <th>Keterangan</th>
              <th>opsi</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($detail as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->nama_kelas}}</td>
              <td>{{$item->tgl}}</td>
              <td>{{$item->NIS}}</td>
              <td>{{$item->nama_siswa}}</td>
              <td>{{$item->keterangan}}</td>
              <td>
                    <button type="button" class="btn-lg btn-warning fa fa-edit" title="Edit Mapel" data-toggle="modal" data-target="#modal-edit{{$item->NIS}}"></button>
              </td>
            </tr>
     @endforeach
        </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@foreach ($detail as $item)


<div class="modal fade" id="modal-edit{{$item->NIS}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Guru</h4>
            </div>
            {!! Form::open(['route' => 'editlist',$item->NIS, 'method' => 'PUT' ]) !!}
            <div class="modal-body">
            <input type="hidden" name="id" value="{{$item->NIS}}">
            <input type="hidden" name="kode" value="{{$item->kode_kelas}}">

            <div class="box-body">
            <div class="form-group">
              <label for="nama_guru" class="col-sm-4 control-label">NIS</label>
              <div class="col-sm-8">
                <input disabled type="text" class="form-control" name="NIS" id="NIS" value="{{$item->NIS}}">
              </div>
            </div>
            <br><br>
            <div class="form-group">
                    <label for="nama_guru" class="col-sm-4 control-label">Nama Siswa</label>
                    <div class="col-sm-8">
                      <input disabled type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="{{$item->nama_siswa}}">
                    </div>
                  </div>
                  <br><br>
            <div class="form-group">
                <label for="keterangan" class="col-sm-4 control-label">Keterangan</label>
                <div class="col-sm-8">
                  <select class="form-control" name="keterangan">                
                  <option value="masuk">masuk</option>
                  <option value="alpha">alpha</option>
                  <option value="izin">izin</option>
                  <option value="sakit">sakit</option>
            
                  </select>
                  {{-- <input type="text" class="form-control" name="kode_guru" id="kodeguru" placeholder="Kode Kelas"> --}}
                </div>
              </div>
              <br><br>

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


@endsection

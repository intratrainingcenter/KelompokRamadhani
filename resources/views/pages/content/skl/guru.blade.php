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
              <button type="button" class="btn-lg btn-success fa fa-plus-square" title="Add Siswa" data-toggle="modal" data-target="#modal-success"> </button>                                 
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
              <th>Kode Guru</th>
              <th>Nama Guru</th>
              <th>Jenis Kelamin</th>
              <th>Mapel</th>
              <th>Option</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($guru as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->kode_guru}}</td>
              <td>{{$item->nama_guru}}</td>
              <td>{{$item->jk}}</td>
              <td>{{$item->kode_mapel}}</td>
              <td>
                  <button type="button" class="btn-lg btn-warning fa fa-edit" title="Edit Mapel" data-toggle="modal" data-target="#modal-edit{{$item->id_guru}}"></button>
                  <button type="button" class="btn-lg btn-danger fa fa-bitbucket" title="Hapus Mapel" data-toggle="modal" data-target="#modal-default{{$item->id_guru}}"> </button>                            
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

<!-- Modal add data -->
<div class="modal modal-success fade" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Guru</h4>
      </div>
      {{-- <form  action="addmapel" method="post"> --}}
          {!! Form::open(['route' => 'addguru' , 'method' => 'post'])!!}
      <div class="modal-body">
          <div class="box-body">
              <div class="form-group">
                  <label for="kode_guru" class="col-sm-4 control-label">kode_guru</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="kode_guru" id="kode_guru" placeholder="Kode Guru" value="">
                  </div>
                </div>
                <br><br>
              <div class="form-group">
                <label for="nama_guru" class="col-sm-4 control-label">Nama guru</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Nama">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                  <label for="jk" class="col-sm-4 control-label">Jenis Kelamin</label>
                  <div class="col-sm-8">
                      <select class="form-control" name="jk">
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <br><br>
              <div class="form-group">
                  <label for="kode_mapel" class="col-sm-4 control-label">Mapel</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="kode_mapel">
                      <option value="" disabled selected>Mapel</option>
                      @foreach($data as $in)
                    <option value="{{$in->kode_mapel}}">{{$in->kode_mapel}} - {{$in->mapel}}</option>
                      @endforeach
                    </select>
                    {{-- <input type="text" class="form-control" name="kode_guru" id="kodeguru" placeholder="Kode Kelas"> --}}
                  </div>
                </div>
                <br><br>
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
<!-- /.modal -->

<!-- /.modal-HAPUS -->
@foreach ($guru as $item)
<div class="modal modal-danger  fade" id="modal-default{{$item->id_guru}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Guru</h4>
              </div>
              {!! Form::open(['route' => 'deleteguru',$item->id_guru, 'method' => 'delete' ]) !!}
              <div class="modal-body">
              <input type="hidden" name="id" value="{{$item->id_guru}}">
              <p>Apakah anda yakin ingin menghapus guru :{{$item->kode_guru}}</p>
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

<!-- /.modal-EDIT -->

        <div class="modal fade" id="modal-edit{{$item->id_guru}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Guru</h4>
                </div>
                {!! Form::open(['route' => 'editguru',$item->id_guru, 'method' => 'PUT' ]) !!}
                <div class="modal-body">
                <input type="hidden" name="id" value="{{$item->id_guru}}">
                
                <div class="box-body">
                <div class="form-group">
                  <label for="nama_guru" class="col-sm-4 control-label">Nama Guru</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Nama" value="{{$item->nama_guru}}">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="jk" class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="jk">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <br><br>
              
                <div class="form-group">
                    <label for="kode_mapel" class="col-sm-4 control-label">Mapel</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="kode_mapel">                
                      <option value="{{$item->kode_mapel}}"> {{$item->kode_mapel}} - {{$item->mapel}}</option>
                      @foreach($data as $in)
                      <option value="{{$in->kode_mapel}}">{{$in->kode_mapel}} - {{$in->mapel}}</option>
                        @endforeach
                      
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

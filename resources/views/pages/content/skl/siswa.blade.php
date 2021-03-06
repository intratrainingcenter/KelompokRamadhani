@extends('pages/navmenu.home')
@section('h1')School @endsection
@section('h2')Students @endsection
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
              {{-- <button type="button" class="btn-lg btn-primary fa fa-plus-square add" id="show" title="Add Siswa"> </button>                     --}}
              <button type="button" class="btn-lg btn-success fa fa-plus-square add" title="Add Siswa" data-toggle="modal" data-target="#modal-success"> </button>                                 
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
              <th>NIS</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
              <th>Kode Piket</th>
              <th>ALamat</th>
              <th>Option</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($siswa as $item)
            <tr>
            <td>{{$loop->iteration}}</td>
              <td>{{$item->NIS}}</td>
              <td>{{$item->nama_siswa}}</td>
              <td>{{$item->jk}}</td>
              <td>{{$item->nama_kelas}}</td>
              <td>{{$item->kode_piket}}</td>
              <td>{{$item->alamat}}</td>
              <td>
                  <button type="button" class="btn-lg btn-warning fa fa-edit" title="Edit Mapel" data-toggle="modal" data-target="#modal-edit{{$item->id_siswa}}"></button>
                  <button type="button" class="btn-lg btn-danger fa fa-bitbucket" title="Hapus Mapel" data-toggle="modal" data-target="#modal-danger{{$item->id_siswa}}"> </button>                            
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
        <h4 class="modal-title">Add new siswa</h4>
      </div>
      {{-- <form  action="addmapel" method="post"> --}}
          {!! Form::open(['route' => 'addsiswa' , 'method' => 'post'])!!}
      <div class="modal-body">
          <div class="box-body">
              <div class="form-group">
                  <label for="NIS" class="col-sm-4 control-label">NIS</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control nospace" name="NIS" id="NIS" placeholder="NIS" value="" required>
                  </div>
                </div>
                <br><br>
              <div class="form-group">
                <label for="nama_siswa" class="col-sm-4 control-label">Nama Siswa</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama">
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
                  <label for="kode_kelas" class="col-sm-4 control-label">Kode Kelas</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="kode_kelas">
                      {{-- <option value="" disabled selected>Kode Kelas</option> --}}
                @foreach ($class as $clases)                       
                      <option value="{{$clases->id}}">{{$clases->nama_kelas}}</option>
                @endforeach    
                    </select>
                    {{-- <input type="text" class="form-control" name="kode_guru" id="kodeguru" placeholder="Kode Kelas"> --}}
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="kode_piket" class="col-sm-4 control-label">Kode Piket</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="kode_piket">
                        <option value="" disabled selected>Kode Piket</option>
                  @foreach ($jadpiket as $itemP)                       
                        <option value="{{$itemP->kode_piket}}">{{$itemP->kode_piket}} - {{$itemP->hari}}</option>
                  @endforeach    
                      </select>
                      {{-- <input type="text" class="form-control" name="kode_guru" id="kodeguru" placeholder="Kode Kelas"> --}}
                    </div>
                  </div>
                  <br><br>
                <div class="form-group">
                    <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="alamat" id="alamat"  placeholder="Alamat">
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
<!-- /.modal -->

<!-- /.modal-HAPUS -->
@foreach ($siswa as $item)
<div class="modal modal-danger  fade" id="modal-danger{{$item->id_siswa}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Siswa</h4>
              </div>
              {!! Form::open(['route' => 'deletesiswa',$item->id_siswa, 'method' => 'delete' ]) !!}
              <div class="modal-body">
              <input type="hidden" name="id" value="{{$item->id_siswa}}">
              <p>Apakah anda yakin ingin menghapus siswa :{{$item->NIS}}</p>
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

        <div class="modal fade" id="modal-edit{{$item->id_siswa}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Siswa</h4>
                </div>
                {!! Form::open(['route' => 'editsiswa',$item->id_siswa, 'method' => 'PUT' ]) !!}
                <div class="modal-body">
                <input type="hidden" name="id" value="{{$item->id_siswa}}">
                
                <div class="box-body">
                
                <div class="form-group">
                  <label for="nama_siswa" class="col-sm-4 control-label">Nama Siswa</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama" value="{{$item->nama_siswa}}">
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
                      <label for="kode_kelas" class="col-sm-4 control-label">Kode Kelas</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="kode_kelas">
                          {{-- <option value="" disabled selected>Kode Kelas</option> --}}
                    @foreach ($class as $clases)                       
                          <option value="{{$clases->id}}">{{$clases->nama_kelas}}</option>
                    @endforeach    
                        </select>
                        {{-- <input type="text" class="form-control" name="kode_guru" id="kodeguru" placeholder="Kode Kelas"> --}}
                      </div>
                    </div>
                    <br><br>
                  <div class="form-group">
                    <label for="kode_piket" class="col-sm-4 control-label">Kode Piket</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="kode_piket">
                        <option value="{{$itemP->kode_piket}}">{{$itemP->kode_piket}} - {{$itemP->hari}}</option>
                        @foreach($jadpiket as $itemP)
                        <option value="{{$itemP->kode_piket}}">{{$itemP->kode_piket}} - {{$itemP->hari}}</option>
                        @endforeach
                      </select>
                      {{-- <input type="text" class="form-control" name="kode_guru" id="kodeguru" placeholder="Kode Kelas"> --}}
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                      <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="alamat" id="alamat"  placeholder="Alamat" value="{{$item->alamat}}">
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
    <script type="text/javascript">
   
      $('#show').click(function() {
              $('#NIS').val('');
              $('#nama_siswa').val('');
              $('#kode_kelas').val('');
              $("input#NIS").on({
                keydown: function(e) {
                  if (e.which === 32)
                  return false;
                },
                change: function() {
                  this.value = this.value.replace(/\s/g, "");
                 }
                });
              $('#modal-success').modal({
                keyboard : false,
                backdrop : 'static'
              });
            });
     
</script>

@endsection


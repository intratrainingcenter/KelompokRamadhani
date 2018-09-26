@extends('pages/navmenu.home')
@section('h1')School @endsection
@section('h2')Objects @endsection
@section('content')
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
        <thead> 
            <tr>
              <th>#</th>
              <th>Kode Mapel</th>
              <th>Mata Pelajaran</th>
              <th>NKM</th>
              <th>Option</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($mapel as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->kode_mapel}}</td>
              <td>{{$item->mapel}}</td>
              <td>{{$item->nkm}}</td>
              <td>
                  <button type="button" class="btn-lg btn-warning fa fa-edit" title="Edit Mapel" data-toggle="modal" data-target="#modal-edit{{$item->id_mapel}}"></button>
                  <button type="button" class="btn-lg btn-danger fa fa-bitbucket" title="Hapus Mapel" data-toggle="modal" data-target="#modal-default{{$item->id_mapel}}"> </button>               
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
        <h4 class="modal-title">Add new Mapel</h4>
      </div>
      {{-- <form  action="addmapel" method="post"> --}}
          {!! Form::open(['route' => 'sekolah.add' , 'method' => 'post'])!!}
      <div class="modal-body">
          <div class="box-body">
              <div class="form-group">
                <label for="kodemapel" class="col-sm-4 control-label">Kode Mapel</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="kode_mapel" id="kodemapel" placeholder="kode Mapel">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                  <label for="mapel" class="col-sm-4 control-label">Mata Pelajaran</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name='mapel' id="mapel" placeholder="Mapel">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="nkm" class="col-sm-4 control-label">NKM</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nkm" id="nkm"  placeholder="NKM minim utk lulus">
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
@foreach ($mapel as $item)
<div class="modal fade" id="modal-default{{$item->id_mapel}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">delete Mapel</h4>
              </div>
              {!! Form::open(['route' => 'sekolah.delete',$item->id_mapel, 'method' => 'delete' ]) !!}
              <div class="modal-body">
              <input type="hidden" name="id" value="{{$item->id_mapel}}">
              <p>Apakah anda yakin ingin menghapus mapel :{{$item->mapel}}</p>
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

        <div class="modal fade" id="modal-edit{{$item->id_mapel}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Mapel - {{$item->kode_mapel}}</h4>
                </div>
                {!! Form::open(['route' => 'sekolah.edit',$item->id_mapel, 'method' => 'PUT' ]) !!}
                <div class="modal-body">
                <input type="hidden" name="id" value="{{$item->id_mapel}}">
                
                <div class="box-body">
                    <div class="form-group">
                        <label for="mapel" class="col-sm-4 control-label">Mata Pelajaran</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name='mapel' id="mapel" placeholder="Mapel" value="{{$item->mapel}}">
                        </div>
                      </div>
                      <br><br>
                      <div class="form-group">
                          <label for="nkm" class="col-sm-4 control-label">NKM</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nkm" id="nkm"  placeholder="NKM minim utk lulus" value="{{$item->nkm}}">
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

  @endsection
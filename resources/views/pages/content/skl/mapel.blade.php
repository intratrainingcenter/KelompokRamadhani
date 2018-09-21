@extends('pages/navmenu.home')
@section('h1')Sekolah @endsection
@section('h2')Mata Pelajaran @endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                    <button type="button" class="btn-lg btn-success fa fa-plus-square" data-toggle="modal" data-target="#modal-success"> </button>               
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
              <th>Kode guru</th>
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
              <td>{{$item->kode_guru}}</td>
              <td>{{$item->kode_mapel}}</td>
              <td>{{$item->mapel}}</td>
              <td>{{$item->nkm}}</td>
              <td>
                  <button class="btn-lg btn-warning fa fa-edit"></button>
                  <button class="btn-lg btn-danger fa fa-bitbucket"></button>                  
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
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Mapel</h4>
      </div>
      <div class="modal-body">
          <div class="box-body">
              <div class="form-group">
                  <label for="kodeguru" class="col-sm-4 control-label">Kode Guru</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="kodeguru" placeholder="kode Guru">
                  </div>
                </div>
                <br><br>
              <div class="form-group">
                <label for="kodemapel" class="col-sm-4 control-label">Kode Mapel</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="kodemapel" placeholder="kode Mapel">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                  <label for="mapel" class="col-sm-4 control-label">Mata Pelajaran</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="mapel" placeholder="Mapel">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="nkm" class="col-sm-4 control-label">NKM</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nkm" placeholder="NKM minim utk lulus">
                    </div>
                  </div>
                  <br> 

           </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline">Add</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



@endsection
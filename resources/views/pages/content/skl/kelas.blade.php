@extends('pages/navmenu.home')
@section('h1')Sekolah @endsection
@section('h2')Kelas @endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Responsive Hover Table</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>Id</th>
            <th>Kelas</th>
            <th>Wali Kelas</th>
            <th>Jumlah Siswa</th>
            <th>Action</th>
          </tr>
          @foreach($data as $kelas)
          <tr>
            <td>{{$kelas->id_kelas}}</td>
            <td>{{$kelas->nama_kelas}}</td>
            <td>{{$kelas->kode_guru}}</td>
            <td>{{$kelas->jml_siswa}}</td>
            <td>
            	<button type="button" class="btn btn-sm btn-success"><li class="fa fa-plus-square"></li></button>
            	<button type="button" class="btn btn-sm btn-info"><li class="fa  fa-pencil"></li></button>
            	<button type="button" class="btn btn-sm btn-danger"><li class="fa fa-trash"></li></button>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection
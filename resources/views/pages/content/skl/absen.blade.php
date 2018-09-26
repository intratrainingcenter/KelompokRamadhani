@extends('pages/navmenu.home')
@section('h1')Sekolah @endsection
@section('h2')Absensi @endsection
@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Absensi</h3>

             <div class="box-tools">
          		<div class="input-group input-group-sm" style="width: 150px;">
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
                  <th>Action</th>
                </tr>
                  @foreach($class as $class)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$class->nama_kelas}}</td>
                  <td>{{$class->detailguru->nama_guru}}</td>
                  <td>
                  	<a href="{{ route('ABS.detail',['id'=>$class->id]) }}" class="btn-lg btn-info"><li class="fa fa-search-plus"></li></a>
                  	<button type="button" class="btn-lg btn-success"><li class="fa fa-list-alt"></li></button>
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
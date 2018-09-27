@extends('pages/navmenu.home')
@section('h1')Sekolah @endsection
@section('h2')Absensi @endsection
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
                  	<a href="{{ route('ABS.list',['id'=>$class->id]) }}" class="btn-lg btn-success"><li class="fa fa-list-alt"></li></a>
                    
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
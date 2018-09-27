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
       <div class="box-tools">
    		<div class="input-group input-group-sm" style="width: 150px;">
            {{-- <button type="button" class="btn-lg btn-success fa fa-plus-square add" title="Add Siswa" data-toggle="modal" data-target="#modal-success"> <label>Confirm </label></button>  --}}
      		<div class="input-group-btn">
      		</div>
    		</div>
  	   </div>
      </div>
      <!-- /.box-header -->
      @php
			$dt=date('Y-m-d');
      @endphp
      
      <div class="box-body table-responsive no-padding">
       {!! Form::open(['route' => 'adddetail' , 'method' => 'post'])!!}
          <div class="col-sm-8">
            @foreach($detail as $class)
               <input type="hidden" name="kode" value="{{$class->kode_kelas}}">
               <input type="hidden" name="date" value="{{$dt}}">
            @endforeach
       
            <select class="form-control" name="NIS">
            @foreach($detail as $class)
            <option value="{{$class->NIS}}">{{$class->NIS}} - {{$class->nama_siswa}}</option>
              @endforeach

              </select>
            </div>
            <br><br><br>
                <div class="col-sm-8">
                <select class="form-control" name="ket">
                    <option value="masuk">masuk</option>
                    <option value="tanpa_keterangan">Alpha</option>
                    <option value="ijin">Ijin</option>
                    <option value="sakit">Sakit</option>
                  </select>
                </div>
                <br><br><br>
        {{-- <input type="hidden" name="NIS" value="{{$class->NIS}}">
        <input type="hidden" name="kode_kelas" value="{{$class->kode_kelas}}"> --}}
   
        <a href="{{route('absen.index')}}" type="button" class="btn btn-danger" title="Back"> <label>Back</label></a>                                 
        <button type="submit" class="btn btn-success pull-right">Submit</button>
        {!! Form::close() !!}
        
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection
@extends('pages/navmenu.home')
@section('h1')Sekolah @endsection
@section('h2')Absensi @endsection
@section('content')
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
      


      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Keterangan</th>
           
          </tr>
            @foreach($detail as $class)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$class->NIS}}</td>
            <td>{{$class->nama_siswa}}</td>
            <td>
          {!! Form::open(['route' => 'adddetail' , 'method' => 'post'])!!}

                <div class="col-sm-8">
                    <select class="form-control" name="ket">
                    <option value="masuk">masuk</option>
                    <option value="tanpa_keterangan">Alpha</option>
                    <option value="ijin">Ijin</option>
                    <option value="sakit">Sakit</option>
                  </select>
                </div>
            </td>
          </tr>
            @endforeach
        </table>
        @foreach($detail as $class)
        <input type="hidden" name="NIS" value="{{$class->NIS}}">
        <input type="hidden" name="kode_kelas" value="{{$class->kode_kelas}}">
        @endforeach
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
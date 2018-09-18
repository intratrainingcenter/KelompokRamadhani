@extends('pages.layout.head')
@section('tittle') InuPoi Corp @endsection
@section('footer') Created at 2018 @endsection
@section('navmenu')
<li class="active treeview">
  <li class="treeview">
    <a href="#">
      <i class="fa fa-files-o"></i>
      <span>Data Sekolah</span>
      <span class="pull-right-container">
        
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{route('siswa.index')}}"><i class="fa fa-circle-o"></i> Siswa </a></li>
      <li><a href="{{route('kelas.index')}}"><i class="fa fa-circle-o"></i> Kelas </a></li>
      <li><a href="{{route('absen.index')}}"><i class="fa fa-circle-o"></i> Absensi </a></li>
      <li><a href="{{route('piket.index')}}"><i class="fa fa-circle-o"></i> Piket </a></li>
      <li><a href="{{route('mapel.index')}}"><i class="fa fa-circle-o"></i> Mapel </a></li>
    </ul>
  </li> 
@endsection


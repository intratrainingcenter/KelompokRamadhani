@extends('pages.layout.head')
@section('tittle') InuPoi Corp @endsection
@section('footer') Created at 2018 @endsection
@section('navmenu')
<li class="active treeview">
    <li><a href="{{route('kelas.index')}}"><i class="fa fa-institution"></i> Class </a></li>
    <li><a href="{{route('mapel.index')}}"><i class="fa fa-table"></i> Object </a></li>
    <li><a href="{{route('guru.index')}}"><i class="fa fa-group"></i> Teacher </a></li>
    <li><a href="{{route('piket.index')}}"><i class="fa fa-trash-o"></i> Picket </a></li>
    <li><a href="{{route('siswa.index')}}"><i class="fa fa-child"></i> Students </a></li>  
    <li><a href="{{route('absen.index')}}"><i class="fa fa-book"></i> Attendance </a></li>

 
  </li> 
@endsection


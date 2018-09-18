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
    <li><a href="/datsiswa"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
      <li><a href="/siswa"><i class="fa fa-circle-o"></i> Siswa </a></li>
      <li><a href="/kelas"><i class="fa fa-circle-o"></i> Kelas </a></li>
      <li><a href="/absen"><i class="fa fa-circle-o"></i> Absensi </a></li>
      <li><a href="/piket"><i class="fa fa-circle-o"></i> Piket </a></li>
      <li><a href="/mapel"><i class="fa fa-circle-o"></i> Mapel </a></li>
    </ul>
  </li> 
@endsection


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
                    <button class="btn-lg btn-success fa fa-plus-square"></button>                  
              

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
              <th>Guru</th>
              <th>Mata Pelajaran</th>
              <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>1</td>
              <td>Merb</td>
              <td>Magic</td>
              <td>
                  <button class="btn-lg btn-warning fa fa-edit"></button>
                  <button class="btn-lg btn-danger fa fa-bitbucket"></button>                  
              </td>
            </tr>
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

@endsection
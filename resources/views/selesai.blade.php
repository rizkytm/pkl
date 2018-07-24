@include('partials.header')

@include('partials.sidebar')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Wawancara Selesai
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Wawancara Selesai</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>Tugas Selesai</b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Topik</th>
              <th>Kategori</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Dinaa
              </td>
              <td>Pendidikan</td>
              <td> Guru </td>
              <td>Selesai</td>
            </tr>

            </tbody>

          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



@include('partials.footer')

@include('partials.controlsidebar')

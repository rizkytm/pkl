@include('partials2.header2')

@include('partials2.sidebar2')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Laporan Selesai
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Laporan Selesai</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>Daftar Laporan Selesai</b></h3>
        </div>
        <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped no-footer">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Narasumber</th>
                  <th>Lembaga</th>
                  <th>Topik</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              
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



@include('partials2.footer2')

@include('partials2.controlsidebar2')

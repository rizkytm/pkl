@include('partials2.header2')

@include('partials2.sidebar2')


   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Laporan Masuk
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan Masuk</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Laporan Masuk</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped no-footer">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Narasumber</th>
                  <th>Topik</th>
                  <th>Kategori</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>

            </table>
          </div>
          <!-- /.box-body -->

      </div>
    </section>
  </div>


@include('partials2.footer2')

@include('partials2.controlsidebar2')

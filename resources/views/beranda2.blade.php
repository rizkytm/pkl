@include('partials2.header2')

@include('partials2.sidebar2')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Beranda ADMIN
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Beranda Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Laporan Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('wawancara') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Laporan Revisi</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('revisi') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>65</h3>

              <p>Laporan Selesai</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('selesai') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
  <section class="content">
  <div class="row">
    <a class="btn btn-primary" href="{{ route('tambah.kategori') }}">Tambah Kategori</a>
    <a class="btn btn-success" href="{{ route('tambah.pertanyaan') }}">Tambah Pertanyaan</a>
  </div>
  <div class="row"><br></div>
      <div class="box">
      <div class="box-header">
        <h3 class="box-title"><b>Pengguna Sistem Informasi Wawancara :</b></h3>
      </div>
    <div class="box-body">
    <table class="table table-bordered table-striped no-footer">
        <thead>
          <tr>
            <th width="5"> No. </th>
            <th> Nama </th>
            <th> email </th>
            <th> Aksi </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $key => $value)
          <tr>
            <td> {{$key+1}} </td>
            <td> {{$value -> name}} </td>
            <td> {{$value -> email}} </td>
            <td>
              <a class="btn btn-warning" href="#" > Hapus User </a>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
    </div>
  </section>
</div>


    </section>
  </div>



      <!-- /.row (main row) -->

@include('partials2.footer2')

@include('partials2.controlsidebar2')

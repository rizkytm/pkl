@include('partials2.header2')

@include('partials2.sidebar2')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Tambah Kategori
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Wawancara Selesai</li>
  </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('store.kategori') }}" method="post">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Kategori</label>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Nama Kategori">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
              <!-- /.box-body -->

</div>

</section>
<!-- /.content-wrapper -->
</div>


@include('partials2.footer2')

@include('partials2.controlsidebar2')

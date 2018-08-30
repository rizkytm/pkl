@include('partials2.header2')

@include('partials2.sidebar2')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Tambah Kategori
  </h1>
    @include('partials._alerts')
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Wawancara Selesai</li>
  </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
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
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-warning" href="{{ route('admin.dashboard') }}">Kembali</a>
              </div>
            </form>
          </div>
          </div>

        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <?php $i = ($categories->currentpage()-1)* $categories->perpage() + 1 ;?>
                <tr>
                  <th style="width: 30px">No</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
                @foreach($categories as $category)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                    <button type="submit" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editcategory{{$category->id}}" >Edit Kategori</button>
                    @include('modalcategory')
                    <button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deletecategory{{$category->id}}" >Hapus Kategori</button>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <center>{!! $categories->render() !!}</center>
          </div>
        </div>


              <!-- /.box-body -->

</div>

</section>
<!-- /.content-wrapper -->
</div>


@include('partials2.footer2')

@include('partials2.controlsidebar2')

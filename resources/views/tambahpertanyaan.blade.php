@include('partials2.header2')

@include('partials2.sidebar2')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Tambah Pertanyaan
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
            <form action="{{ route('store.pertanyaan') }}" method="post">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <div class="box-body">
              <div class="form-group">
                <label>Kategori</label>

                <select name="category_id" class="form-control select2" style="width: 100%;">
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>

              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pertanyaan</label>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Nama Pertanyaan">
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

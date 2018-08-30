@include('partials2.header2')

@include('partials2.sidebar2')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Tambah Pertanyaan
  </h1>
  @include('partials._alerts')
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
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
              <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                  Pilih Kategori
                    <span class="fa fa-caret-down"></span>
                </button>                  
                <div class="dropdown-menu">
                  @foreach($categories as $category)
                  <li><a class="dropdown-item" href="{{ route('tambah.pertanyaan', $category) }}">{{ $category->name }}</a></li>
                  @endforeach
                </div>
              </div>
            </div>
            <!-- /.box-body -->            
          </div>
        </div>

      </div>



          

         
          <div class="row">
            <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Pertanyaan | Kategori {{ $categoryname->name }}</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <?php $counter = 1; ?>
                <tr>
                  <th style="width: 30px">No</th>
                  <th>Nama Pertanyaan</th>
                  <th>Aksi</th>
                </tr>
                @foreach($questions as $question)                
                <tr>
                  <td><?php echo $counter++; ?></td>
                  <td>{{ $question->question }}</td>
                  <td>
                    <button type="submit" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editpertanyaan{{$question->id}}">Edit Pertanyaan</button>
                    @include('modalpertanyaan')
                    <button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deletepertanyaan{{$question->id}}">Hapus Pertanyaan</button>
                  </td>
                </tr>
                @endforeach
                
                
              </table>
            </div>
            <center>{!! $questions->render() !!}</center>
          </div>
        </div>
      </div>
          


        
              <!-- /.box-body -->

</section>
<!-- /.content-wrapper -->
</div>


@include('partials2.footer2')

@include('partials2.controlsidebar2')

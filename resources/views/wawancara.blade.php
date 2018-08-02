@include('partials.header')

@include('partials.sidebar')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Wawancara
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Wawancara</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tambah Wawancara</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal" action="{{ route('store.wawancara') }}" method="post" enctype="multipart/form-data"> 
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group">
              <label class="col-sm-2">Penulis</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="penulis1" name="penulis1" placeholder="1. ">
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="penulis2" name="penulis2" placeholder="2.">
                </div>
            </div>
            
              <div class="form-group">
                <label class="col-sm-2">Lembaga</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="lembaga" name="lembaga" placeholder="nama lembaga">
                  </div>
              </div>

            <div class="form-group">
              <label class="col-sm-2">Narasumber :</label>
              <div class="col-sm-5">
                  <label>Nama</label>
              </div>
              <div class="col-sm-5">
                  <label>Nomor Telpon</label>
              </div>

              <div class="col-sm-2"></div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="1. ">
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="kontak" name="kontak" placeholder="1. ">
                </div>
              
            </div>

            <div class="form-group">
              <label class="col-sm-2">Topik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="topic" name="topic" placeholder="topik wawancara">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Kategori</label>
              <div class="col-sm-10">
                <select name="kategori_id">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{$category->name}}</option>
                @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Upload File</label>
              <div class="col-sm-10">
                <input type="file" name="files[]" multiple />
              </div>
            </div>

            <div class="col-sm-2"></div>
            <div class="form-group">
              <input type="submit" name="" class="btn btn-primary" value="Save">
            </div>

          </form>
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

<section class="content">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Wawancara Anda</h3>
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
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter=1; ?>
                @foreach ($posts as $post)
                  <tr>                
                    <td><?php echo $counter++; ?></td>
                    <td>{{ $post->narasumber }}</td>
                    <td>{{ $post->topic }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                      <a class="btn btn-warning" href="{{ route('show.tampil',$post) }}"> preview </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->

          <center>{!! $posts->render() !!}</center>
        </div>
    </section>


</div>
<!-- /.content-wrapper -->



@include('partials.footer')

@include('partials.controlsidebar')

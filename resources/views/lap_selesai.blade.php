@include('partials2.header2')

@include('partials2.sidebar2')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Laporan Selesai
  </h1>
  @include('partials._alerts')
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
                  <th>Penulis</th>
                  <th>Narasumber</th>
                  <th>Topik/Judul</th>
                  <th>Kategori</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Aksi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = ($posts->currentpage()-1)* $posts->perpage() + 1 ;?>
                <?php $counter=1; ?>
                @foreach ($posts as $post)
                  <tr>
                    <td>{{ $i++ }}</td>
                  
                    <td>
                        <div><b>{{ $post->penulis1 }};</b></div>
                        @if(!empty($post->penulis2))
                        <div><b>{{ $post->penulis2 }};</b></div>
                        @endif
                    </td>
                    <td>
                    <?php $count=1; ?>
                    @foreach ($post->narasumber as $nara)
                      @if(!empty($nara->nama))
                      <div><?php echo $count++; ?>. {{ $nara->nama }}</div>
                      @endif
                    @endforeach
                    </td>
                    <td>{{ $post->topic }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                      <a class="btn btn-warning" href="{{ route('show.tampil.selesai', $post) }}">Preview</a>
                      @include('modalpost')
                      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deletepost{{$post->id}}" >Hapus Post</button>
                    </td>
                    <td>
                      <a class="btn btn-success" href="#" disabled>Selesai</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <center>{!! $posts->render() !!}</center>

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

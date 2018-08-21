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
                  <th>Penulis 1</th>
                  <th>Penulis 2</th>
                  <th>Narasumber</th>
                  <th>Topik</th>
                  <th>Kategori</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Aksi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter=1; ?>
                @foreach ($posts as $post)
                  <tr>
                    <td><?php echo $counter++; ?></td>
                    <td>{{ $post->penulis1 }} </td>
                    <td>{{ $post->penulis2 }} </td>
                    <td>
                      <?php $count=1; ?>
                      @foreach ($post->narasumber as $nara)
                        <div><?php echo $count++; ?>. {{ $nara->nama }}</div>
                      @endforeach</td>
                    <td>{{ $post->topic }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                      <a class="btn btn-danger" href="{{ route('download.word', 'posts')}}">Download</a>
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

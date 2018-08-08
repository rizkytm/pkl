

@include('partials2.header2')

@include('partials2.sidebar2')


   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Laporan Revisi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan Revisi</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Revisi</h3>
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
                  <th>Lembaga</th>
                  <th>Topik</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Aksi</th>
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
                    @foreach($post->narasumber as $nara)
                    {{ $nara->nama }}
                    @endforeach</td>
                    <td>{{ $post->topic }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                      <a class="btn btn-warning" href="{{ route('show.tampil.admin', $post) }}">Preview</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->


        </div>
    </section>
  </div>


@include('partials2.footer2')

@include('partials2.controlsidebar2')

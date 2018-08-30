@include('partials2.header2')

@include('partials2.sidebar2')


   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Laporan Masuk
      </h1>
        @include('partials._alerts')
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
                  <th>Penulis</th>
                  <th>Nama Narasumber</th>
                  <th>Topik/Judul</th>
                  <th>Kategori</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Aksi</th>
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
                        <div>{{ $post->penulis2 }};</div>
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
                      <a class="btn btn-warning" href="{{ route('show.tampil.admin', $post) }}">Preview</a>
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


@include('partials2.footer2')

@include('partials2.controlsidebar2')

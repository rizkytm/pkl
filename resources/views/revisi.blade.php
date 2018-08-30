

@include('partials.header')

@include('partials.sidebar')


   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Revisi
  @include('partials._alerts')
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Revisi</li>
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
                  <th>Penulis</th>
                  <th>Narasumber</th>
                  <th>Lembaga</th>
                  <th>Topik/Judul</th>
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
                    <td>{{ $post->lembaga }}</td>
                    <td>{{ $post->topic }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                      @if($post->condition === 2)
                      <a class="btn btn-warning" href="{{ route('tampil.user.edit', $post) }}">Edit</a>
                      @endif
                    </td>
                    <td>
                      @if($post->condition === 2)
                      <p><b> REVISI </b></p>
                      @else
                      <P> REVISI TERKIRIM </P>
                      @endif
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


@include('partials.footer')

@include('partials.controlsidebar')

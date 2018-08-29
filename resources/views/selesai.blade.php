@include('partials.header')

@include('partials.sidebar')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Wawancara Selesai
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
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tugas Selesai</h3>
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
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter=1; ?>
                @foreach ($posts as $post)
                  <tr>
                    <td><?php echo $counter++; ?></td>
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
                      <a class="btn btn-warning" href="{{ route('show.selesai',$post) }}"> preview </a>
                      <button class="btn btn-success" disabled>Selesai</button>
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



@include('partials.footer')

@include('partials.controlsidebar')

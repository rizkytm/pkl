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
                  <th>Penulis 1</th>
                  <th>Penulis 2</th>
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
                    <td>{{ $post->penulis1 }}</td>
                    <td>{{ $post->penulis2 }}</td>
                    <td>
                    <?php $count=1; ?>
                    @foreach ($post->narasumber as $nara)
                      <div><?php echo $count++; ?>. {{ $nara->nama }}</div>
                    @endforeach
                    </td>
                    <td>{{ $post->lembaga }}</td>
                    <td>{{ $post->topic }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
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

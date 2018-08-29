@include('partials.header')

@include('partials.sidebar')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
  @if(count($hasil))
<section class="content-header">
  <h1>
    Hasil Pencarian : {{ $query }}
  </h1>
  @include('partials._alerts')
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
                  <th>Topik</th>
                  <th>Lembaga</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter=1; ?>
                @foreach ($hasil as $post)
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
                    <td>{{ $post->topic }}</td>
                    <td>{{ $post->lembaga }}</td>
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
      @else

      <section class="content-header">
        <h1>
          Hasil Pencarian : {{ $query }} Tidak Ditemukan
        </h1>
        @include('partials._alerts')
      </section>

      @endif

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

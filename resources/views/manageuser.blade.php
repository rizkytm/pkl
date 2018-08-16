@include('partials2.header2')

@include('partials2.sidebar2')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Manage User
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
        <div class="col-md-12">
          <!-- general form elements -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <a class="btn btn-warning" href="{{ route('admin.dashboard') }}">Kembali</a>
            </div>
            <div class="box-body">

              <table class="table table-bordered">
                <?php $counter = 1; ?>
                <tr>
                  <th style="width: 30px">No</th>
                  <th>Nama User</th>
                  <th>Email User</th>
                  <th>Aksi</th>
                </tr>
                @foreach($users as $user)
                <tr>
                  <td><?php echo $counter++; ?></td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @include('modalmanageuser')
                    <button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteuser{{$user->id}}">Hapus User</button>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
              <!-- /.box-body -->

</div>

</section>
<!-- /.content-wrapper -->
</div>


@include('partials2.footer2')

@include('partials2.controlsidebar2')

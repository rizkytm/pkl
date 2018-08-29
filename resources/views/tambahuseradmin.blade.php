@include('partials2.header2')

@include('partials2.sidebar2')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Tambah Pengguna
  </h1>
    @include('partials._alerts')
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('userbaru.store') }}" aria-label="{{ __('Register') }}">
              @csrf
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="nama">Nama</label>
                  <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nama Pengguna" value="{{ old('name') }}" required autofocus>
                  @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <label for="email">Email</label>
                  <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Email Pengguna" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <label for="password">Password</label>
                  <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password Pengguna" value="{{ old('password') }}" required>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype Password" required>
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-warning" href="{{ route('admin.dashboard') }}">Kembali</a>
              </div>
            </form>
          </div>
          </div>

          <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Admin Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('admin.store') }}" aria-label="{{ __('Register') }}">
              @csrf
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="nama">Nama</label>
                  <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nama Pengguna" value="{{ old('name') }}" required autofocus>
                  @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <label for="email">Email</label>
                  <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Email Pengguna" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <label for="password">Password</label>
                  <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password Pengguna" value="{{ old('password') }}" required>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype Password" required>
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-warning" href="{{ route('admin.dashboard') }}">Kembali</a>
              </div>
            </form>
          </div>
          </div>


              <!-- /.box-body -->

</div>

</section>
<!-- /.content-wrapper -->
</div>


@include('partials2.footer2')

@include('partials2.controlsidebar2')

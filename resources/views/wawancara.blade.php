@include('partials.header')

@include('partials.sidebar')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">

  <h1>
    Wawancara
  </h1>
  @include('partials._alerts')
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
        <h3 class="box-title">Wawancara Anda</h3>

      </div>
            <div class="box-body">
              <form class="form-horizontal" action="{{ route('store.wawancara') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="form-group">
                  <label class="col-sm-2">Penulis</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="penulis1" name="penulis1" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="penulis2" name="penulis2" placeholder="penulis lain... (jika ada)">
                    </div>
                </div>

                  <div class="form-group has-feedback {{ $errors->has('lembaga') ? ' has-error' : '' }}">
                    <label class="col-sm-2">Lembaga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="lembaga" name="lembaga" placeholder="nama lembaga" value="{{ old('lembaga') }}" required>
                        @if ($errors->has('lembaga'))
                          <span class="help-block">
                            <p>{{ $errors->first('lembaga') }}</p>
                          </span>
                        @endif
                      </div>
                  </div>

                <div class="form-group has-feedback {{ $errors->has('kontak') ? ' has-error' : '' }}">
                  <label class="col-sm-2">Narasumber :</label>
                  <div class="col-sm-5">
                      <label>Nama</label>
                  </div>
                  <div class="col-sm-5">
                      <label>Nomor Telpon</label>
                  </div>

                  <div class="col-sm-2"></div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="nama" name="nama1" placeholder="1. " required>
                      @if ($errors->has('nama1'))
                          <span class="help-block">
                            <p>{{ $errors->first('nama1') }}</p>
                          </span>
                        @endif
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="kontak" name="kontak1" placeholder="1. " value="{{ old('kontak1') }}" required>
                      @if ($errors->has('kontak1'))
                          <span class="help-block">
                            <p>{{ $errors->first('kontak1') }}</p>
                          </span>
                        @endif
                    </div>

                    @for($i = 2; $i < 5; $i++)
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="nama" name="namas[]" placeholder="{{$i}}. ">
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="kontak" name="kontaks[]" placeholder="{{$i}}. ">         
                    </div>
                    @endfor

                </div>

                <div class="form-group has-feedback {{ $errors->has('topic') ? ' has-error' : '' }}">
                  <label class="col-sm-2">Topik</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="topic" name="topic" placeholder="topik wawancara" value="{{ old('topic') }}" required>
                      @if ($errors->has('topic'))
                          <span class="help-block">
                            <p>{{ $errors->first('topic') }}</p>
                          </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2">Kategori</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="kategori_id">
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('files') ? ' has-error' : '' }}">
                  <label class="col-sm-2">Upload File</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="file" name="files[]" multiple />
                    @if ($errors->has('files'))
                      <span class="help-block">
                        <p>{{ $errors->first('files') }}</p>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="col-sm-2"></div>
                <div class="form-group col-sm-3">
                  <input type="submit" name="" class="btn btn-primary" value="Jawab pertanyaan panduan">
                </div>
              </form>
                <form class="form-horizontal" action="{{ route('store.rangkuman') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="form-group">
                  <input type="submit" name="" class="btn btn-warning col-sm-3" value="Buat rangkuman">
                </div>

              </form>
            </div>

  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<section class="content">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Wawancara Anda</h3>

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
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter=1; ?>
                @foreach ($posts as $post)
                  <tr>
                    <td><?php echo $counter++; ?>.</td>
                    <td>{{ $post->penulis1 }}</td>
                    <td>{{ $post->penulis2 }} </td>
                    <td>
                    <?php $count=1; ?>
                    @foreach ($post->narasumber as $nara)
                      <div> {{ $nara->nama }}</div>
                    @endforeach
                    </td>
                    <td>{{ $post->lembaga }}</td>
                    <td>{{ $post->topic }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                      <a class="btn btn-warning" href="{{ route('show.tampil',$post) }}"> preview </a>
                      @if($post->condition === null)
                      <form class="form-horizontal" action="{{ route('kirim.laporan', $post) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
          {{ method_field('PATCH') }}
                      <button type="submit" class="btn btn-danger"> kirim </button>
                    </form>
                    @elseif($post->condition === 1)
                    <button type="submit" class="btn btn-primary"> Terkirim </button>
                    @else
                    <button type="submit" class="btn btn-success"> Selesai </button>
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
<!-- /.content-wrapper -->



@include('partials.footer')

@include('partials.controlsidebar')

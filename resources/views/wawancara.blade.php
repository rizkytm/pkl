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
  <div class="row">
    <div class="col-xs-12">

      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active col-xs-2"><h5><center><a href="#wawancara" data-toggle="tab">Tanya-Jawab</a></center></h5></li>
          <li class="col-xs-2"><h5><center><a href="#rangkuman" data-toggle="tab">Berita</a></center><h5></li>
        </ul>
        <div class="tab-content">

          <div class="active tab-pane" id="wawancara">
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

                <div class="form-group has-feedback">
                  <label class="col-sm-2">Narasumber :</label>
                  <div class="col-sm-5">
                      <label>Nama</label>
                  </div>
                  <div class="col-sm-5">
                      <label>Nomor Telpon</label>
                  </div>

                  <div class="col-sm-2"></div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control{{ $errors->has('nama1') ? ' has-error' : '' }}" id="nama" name="nama1" placeholder="1. " value="{{ old('nama1') }}" required>
                      @if ($errors->has('nama1'))
                          <span class="help-block">
                            <p>{{ $errors->first('nama1') }}</p>
                          </span>
                        @endif
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control{{ $errors->has('kontak1') ? ' has-error' : '' }}" id="kontak" name="kontak1" placeholder="1. " value="{{ old('kontak1') }}" required>
                      @if ($errors->has('kontak1'))
                          <span class="help-block">
                            <p>{{ $errors->first('kontak1') }}</p>
                          </span>
                        @endif
                    </div>
                    
                    <?php $in = 0; ?>
                    @for($i = 2; $i < 5; $i++)
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control{{ $errors->has('namas.'.$in) ? ' has-error' : '' }}" id="nama" name="namas[]" placeholder="{{$i}}. ">
                      @if ($errors->has('namas.'.$i))
                        <span class="help-block">                                                  
                            <p>{{ $errors->first('namas') }}</p>
                        </span>
                      @endif
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control{{ $errors->has('kontaks.'.$in) ? ' has-error' : '' }}" id="kontak" name="kontaks[]" placeholder="{{$i}}. ">
                      @if ($errors->has('kontaks.'.$i))
                        <span class="help-block">                                                  
                            <p>{{ $errors->first('kontaks') }}</p>
                        </span>
                      @endif
                    </div>
                    <?php $in++; ?>
                    @endfor

                </div>

                <div class="form-group has-feedback {{ $errors->has('topic') ? ' has-error' : '' }}">
                  <label class="col-sm-2">Topik/Judul</label>
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
                  <label class="col-sm-2">Upload File Dokumentasi (.zip / .rar)</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="file" name="files">
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
            </div>
          </div>
          
          <div class="tab-pane" id="rangkuman">
            <div class="box-body">
                <form class="form-horizontal" action="{{ route('store.rangkuman') }}" method="post" enctype="multipart/form-data">
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
                      <input type="text" class="form-control{{ $errors->has('nama1') ? ' has-error' : '' }}" id="nama" name="nama1" placeholder="1. " value="{{ old('nama1') }}" required>
                      @if ($errors->has('nama1'))
                          <span class="help-block">
                            <p>{{ $errors->first('nama1') }}</p>
                          </span>
                        @endif
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control{{ $errors->has('kontak1') ? ' has-error' : '' }}" id="kontak" name="kontak1" placeholder="1. " value="{{ old('kontak1') }}" required>
                      @if ($errors->has('kontak1'))
                          <span class="help-block">
                            <p>{{ $errors->first('kontak1') }}</p>
                          </span>
                        @endif
                    </div>

                    <?php $in = 0; ?>
                    @for($i = 2; $i < 5; $i++)
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control{{ $errors->has('namas.'.$in) ? ' has-error' : '' }}" id="nama" name="namas[]" placeholder="{{$i}}. ">
                      @if ($errors->has('namas.'.$i))
                        <span class="help-block">                                                  
                            <p>{{ $errors->first('namas') }}</p>
                        </span>
                      @endif
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control{{ $errors->has('kontaks.'.$in) ? ' has-error' : '' }}" id="kontak" name="kontaks[]" placeholder="{{$i}}. ">
                      @if ($errors->has('kontaks.'.$i))
                        <span class="help-block">                                                  
                            <p>{{ $errors->first('kontaks') }}</p>
                        </span>
                      @endif
                    </div>
                    <?php $in++; ?>
                    @endfor

                </div>

                <div class="form-group has-feedback {{ $errors->has('topic') ? ' has-error' : '' }}">
                  <label class="col-sm-2">Topik/Judul</label>
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
                  <label class="col-sm-2">Upload File Dokumentasi (.zip / .rar)</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="file" name="files">
                    @if ($errors->has('files'))
                      <span class="help-block">
                        <p>{{ $errors->first('files') }}</p>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="col-sm-2"></div>
                <div class="form-group">
                  <input type="submit" name="" class="btn btn-warning col-sm-3" value="Buat rangkuman berita">
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>

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
                  <th>Penulis</th>
                  <th>Narasumber</th>
                  <th>Lembaga</th>
                  <th>Topik/Judul</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = ($posts->currentpage()-1)* $posts->perpage() + 1 ;?>
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
                      @if($post->condition === null)
                      <a class="btn btn-warning" href="{{ route('show.tampil',$post) }}"> preview </a>
                      @endif
                      @if($post->condition === null)
                      <form class="form-horizontal" action="{{ route('kirim.laporan', $post) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
          {{ method_field('PATCH') }}
                      <button type="submit" class="btn btn-primary"> kirim </button>
                    </form>
                    @else
                    <button type="submit" class="btn btn-success" disabled=""> Terkirim </button>
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

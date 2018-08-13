@include('partials.header')

@include('partials.sidebar')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Preview Revisi Wawancara
  </h1>

</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <form class="form-horizontal" action="{{ route('get.tampil') }}">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group">
              <label class="col-sm-2">Penulis</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="penulis1" name="penulis1" value="{{ $posts->penulis1 }}" >
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="penulis1" name="penulis1" value="{{ $posts->penulis2 }}" >
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2">Lembaga</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="lembaga" name="lembaga" value="{{ $posts->lembaga }}" >
              </div>
              <label class="col-sm-2">Narasumber</label>
              <div class="col-sm-5">
                  <label>Nama</label>
              </div>
              <div class="col-sm-5">
                  <label>Nomor Telpon</label>
              </div>
                @foreach($posts->narasumber as $nara)
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="narasumber" value="{{ $nara->nama }}" >
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="narasumber" value="{{ $nara->kontak }}" >
                </div>
                @endforeach
            </div>

            <div class="form-group">
              <label class="col-sm-2">Topik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="topic" name="topic" value="{{ $posts->topic }}" >
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Kategori</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kategori_id" name="kategori_id" value="{{ $categories->name }}" >

              </div>
            </div>

            <!-- @if ($errors->has('file'))
            <div class="form-group">
              <label class="col-sm-2">Download File</label>
                <div class="col-sm-10">
                  @foreach($postfile as $file)
                  <a type="text" class="form-control" id="file" name="file" href="{{ route('download', $posts) }}">Download File Untuk Direvisi</a>
                  @endforeach
                </div>
            </div>
            @endif
 -->
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
            @if($posts->condition === 2 || $posts->condition === 3)
            <div class="form-group">
              <label class="col-sm-2">Komentar</label>
              @foreach($comments as $comment)
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="komentar" name="komentar" value="{{ $comment->message }}" disabled><br>
                </div>
                @endforeach
            </div>
            @endif

          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
            <!-- <form action="{{ route('store.jawaban') }}" method="post">
              {{ csrf_field() }}
              {{ method_field('POST') }} -->
              <div class="box-body">
                <input name="post_id" type="hidden" class="form-control" id="name" value="1">
                @foreach($answers as $answer)
                @foreach($answer->question()->get() as $questions)
                <div class="form-group">
                  <label for="exampleInputEmail1">{{ $questions->question }}</label>
                  <input name="answers[]" type="text" class="form-control" id="name" placeholder="Jawaban" value="{{ $answer->answer }}">
                </div>
                @endforeach
                @endforeach
              </div>
              <div class="box-footer">
                <form class="form-horizontal" action="{{ route('update.wawancara', $posts) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
          {{ method_field('PATCH') }}
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                <form class="form-horizontal" action="{{ route('kirim.laporan.lagi', $posts) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
          {{ method_field('PATCH') }}
                <button type="submit" class="btn btn-primary">Kirim lagi</button>
                </form>

              </div>
            <!-- </form> -->
      </div>
    </div>
    <!-- /.box-body -->
  </div>

</section>
<!-- /.content -->
</div>


<!-- /.content-wrapper -->



@include('partials.footer')

@include('partials.controlsidebar')

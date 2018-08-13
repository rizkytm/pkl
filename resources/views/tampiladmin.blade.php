@include('partials2.header2')

@include('partials2.sidebar2')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Preview Wawancara
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
                  <input type="text" class="form-control" id="penulis1" name="penulis1" value="{{ $posts->penulis1 }}" disabled>
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="penulis1" name="penulis1" value="{{ $posts->penulis2 }}" disabled>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2">Lembaga</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="lembaga" name="lembaga" value="{{ $posts->lembaga }}" disabled>
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
                  <input type="text" class="form-control" name="narasumber" value="{{ $nara->nama }}" disabled>
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="narasumber" value="{{ $nara->kontak }}" disabled>
                </div>
                @endforeach
            </div>

            <div class="form-group">
              <label class="col-sm-2">Topik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="topic" name="topic" value="{{ $posts->topic }}" disabled>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Kategori</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kategori_id" name="kategori_id" value="{{ $categories->name }}" disabled>

              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Download File</label>
                <div class="col-sm-10">
                  @foreach($postfile as $file)
                  <a type="text" class="form-control" id="file" name="file" href="{{ route('download', $posts) }}">Download File Untuk Direvisi</a>
                  @endforeach
                </div>
            </div>

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
                  <input name="answers[]" type="text" class="form-control" id="name" placeholder="Jawaban" value="{{ $answer->answer }}" disabled>
                </div>
                @endforeach
                @endforeach
              </div>
            <!-- </form> -->
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <form class="form-horizontal" action="{{ route('revisi.laporan', $posts) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{csrf_field()}}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
              <div class="box-body">

                <div class="form-group">
                  <label for="komentar">Komentar</label>
                  @foreach($comments as $comment)
                  <p>{{ $comment->message }}</p>
                  @endforeach
                  <textarea id="myText" name="komentar" class="form-control" rows="3"></textarea>
                  <span id="wordCount">0</span> Karakter | <span id="kataCount">0</span> Kata
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Revisi</button>
                </form>
                <form class="form-horizontal" action="{{ route('selesai.laporan', $posts) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
          {{ method_field('PATCH') }}
                <button type="submit" class="btn btn-success">Selesai</button>
                </form>
                <div>
                  <form class="form-horizontal" action="{{ route('download.word', $posts) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
          {{ method_field('PATCH') }}
                <button type="submit" class="btn btn-danger">Download</button>
              </form>
              </div>
              </div>
            <!-- </form> -->
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
<!-- /.content -->
@include('modal')
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  var myText = document.getElementById("myText");
  var wordCount = document.getElementById("wordCount");
  var kataCount = document.getElementById("kataCount");


  myText.addEventListener("keyup",function(){
    var characters = myText.value.split('');
    wordCount.innerText = characters.length;
  });

  myText.addEventListener("keyup",function(){
    var characters = myText.value.split(' ');
    kataCount.innerText = characters.length;
  });
</script>

@include('partials2.footer2')

@include('partials2.controlsidebar2')

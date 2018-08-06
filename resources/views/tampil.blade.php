@include('partials.header')

@include('partials.sidebar')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Wawancara
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Wawancara</li>
  </ol>
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
            <form action="{{ route('store.jawaban') }}" method="post">
              {{ csrf_field() }}
              {{ method_field('POST') }}
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
              <div class="box-footer">
                <a href="{{ route('revisi.laporan', $posts) }}" class="btn btn-primary">Revisi</a>
                <a href="#" class="btn btn-primary" disabled>Selesai</a>
                <button type="submit" class="btn btn-danger" disabled>Download as PDF</button>
              </div>
            </form>
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

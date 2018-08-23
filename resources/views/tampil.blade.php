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
          <form class="form-horizontal" action="{{ route('update.wawancara', $posts) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
          {{ method_field('PATCH') }}
            <div class="form-group">
              <label class="col-sm-2">Penulis</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="penulis1" name="penulis1" value="{{ $posts->penulis1 }}">
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="penulis2" name="penulis2" value="{{ $posts->penulis2 }}">
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2">Lembaga</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="lembaga" name="lembaga" value="{{ $posts->lembaga }}">
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
                  <input type="text" class="form-control" name="namanara[]" value="{{ $nara->nama }}">
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kontaknara[]" value="{{ $nara->kontak }}">
                </div>
                @endforeach
            </div>

            <div class="form-group">
              <label class="col-sm-2">Topik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="topic" name="topic" value="{{ $posts->topic }}">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Kategori</label>
              <div class="col-sm-3">
                <select class="form-control" name="kategori_id">
                @foreach($allcategory as $category)
                <!-- @foreach($posts->category()->get() as $postcat)
                  <option value="{{ $postcat->id }}">{{$postcat->name}}</option> -->
                  <option value="{{ $category->id }}" {{ $category->id === $posts->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
                <!-- @endforeach -->
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Download File</label>
                <div class="col-sm-5">
                  @foreach($postfile as $file)
                  <a type="text" class="form-control" id="file" name="file" href="{{ route('download', $posts) }}">Download File Untuk Direvisi</a>
                  @endforeach
                  
                </div>
                <div class="col-sm-5">
                  <input class="form-control" type="file" name="files">
                  </div>
                </div>
            

         
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
              <div class="box-body">
                <input name="post_id" type="hidden" class="form-control" id="name" value="{{ $posts->id }}">
                @foreach($answers as $answer)
                @foreach($answer->question()->get() as $questions)
                <div class="form-group">
                  <label for="exampleInputEmail1">{{ $questions->question }}</label>
                  <input name="qid[]" type="hidden" class="form-control" id="name" value="{{ $questions->id }}">
                  <input name="answers[]" type="text" class="form-control" id="name" placeholder="Jawaban" value="{{ $answer->answer }}">
                </div>
                @endforeach
                @endforeach
              </div>
              <div class="box-footer">                
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                @if($posts->condition === null)
                      <form class="form-horizontal" action="{{ route('kirim.laporan', $posts) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
          {{ method_field('PATCH') }}
                      <button type="submit" class="btn btn-danger"> kirim </button>
                    </form>
                    @elseif($posts->condition === 1)
                    <button type="submit" class="btn btn-warning" disabled> Terkirim </button>
                    @else
                    <button type="submit" class="btn btn-success"> Selesai </button>
                    @endif

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

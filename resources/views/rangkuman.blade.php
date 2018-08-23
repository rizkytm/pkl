@include('partials.header')

@include('partials.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Laporan Rangkuman

            </h3>
            <!-- tools box -->
                      <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
            <form class="form-horizontal" action="{{ route('kirim.rangkuman') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
      {{ method_field('PATCH') }}
              <textarea name="isi" id="rangkum" class="form-control" placeholder="Silakan ketikkan hasil laporan anda..."
                    style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    <span id="wordCount">0</span> Karakter | <span id="kataCount">0</span> Kata
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Tambah</button>

                    </div>
            </form>

          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
  </div>

  <script>
    var rangkum = document.getElementById("rangkum");
    var wordCount = document.getElementById("wordCount");
    var kataCount = document.getElementById("kataCount");


    rangkum.addEventListener("keyup",function(){
      var characters = rangkum.value.split('');
      wordCount.innerText = characters.length;
    });

    rangkum.addEventListener("keyup",function(){
      var characters = rangkum.value.split(' ');
      kataCount.innerText = characters.length;
    });
  </script>

 @include('partials.footer')

 @include('partials.controlsidebar')

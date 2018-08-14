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
            <form>
              <textarea id="rangkuman" class="textarea" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    <span id="wordCount">0</span> Karakter | <span id="kataCount">0</span> Kata
            </form>
            <a class="btn btn-primary" href="{{ route('wawancara') }}">Tambah Laporan Rangkuman</a>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
  </div>

  <script type="text/javascript">
    var rangkuman = document.getElementById("rangkuman");
    var wordCount = document.getElementById("wordCount");
    var kataCount = document.getElementById("kataCount");


    rangkuman.addEventListener("keyup",function(){
      var characters = rangkuman.value.split('');
      wordCount.innerText = characters.length;
    });

    rangkuman.addEventListener("keyup",function(){
      var characters = rangkuman.value.split(' ');
      kataCount.innerText = characters.length;
    });
  </script>

 @include('partials.footer')

 @include('partials.controlsidebar')

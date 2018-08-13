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
              <textarea class="textarea" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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

 @include('partials.footer')

 @include('partials.controlsidebar')

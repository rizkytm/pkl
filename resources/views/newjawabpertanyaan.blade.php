@include('partials.header')

@include('partials.sidebar')

<div class="content-wrapper">
<section class="content-header">
  <h1>
    Jawab Pertanyaan
  </h1>
</section>

<section class="content">

    <div class="row">

        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#biodata" data-toggle="tab">Biodata</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">

                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

  </div>  

</section>

</div>

@include('partials.footer')

@include('partials.controlsidebar')
@include('partials.header')

@include('partials.sidebar')

<div class="content-wrapper">
<section class="content-header">
  <h1>
    Data Tables
    <a href="{{ route('tambah.wawancara') }}">
      <button type="button" class="btn btn-primary">
        <span class="glyphicon glyphicon-plus"></span> Tambah Wawancara
      </button>
    </a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Wawancara</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<div class="form-group">				
				<form name="add_name" id="add_name">
					
		         </form>
			</div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('partials.footer')

@include('partials.controlsidebar')
@include('partials.header')

@include('partials.sidebar')

<div class="content-wrapper">
<section class="content-header">
  <h1>
    Data Tables
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
			<form class="" action="{{ route('wawancara.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			@foreach($questions as $question)
			<div class="form-group has-feedback {{ $errors->has('question') ? ' has-error' : '' }}">
				<label for="">{{ $question->question}}</label>
				<input type="text" class="form-control" name="answer[]" placeholder="Jawaban">
				@if ($errors->has('answer'))
					<span class="help-block">
						<p>{{ $errors->first('answer') }}</p>
					</span>
				@endif
			</div>
			@endforeach
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Save">
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
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('partials.footer')

@include('partials.controlsidebar')
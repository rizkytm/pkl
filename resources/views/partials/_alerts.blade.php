@if (session('success'))
<br>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="alert alert-success">
			<center>{{ session('success') }}</center>
		</div>
	</div>
</div>
@endif

@if (session('info'))
<br>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="alert alert-info">
			<center>{{ session('info') }}</center>
		</div>
	</div>
</div>
@endif

@if (session('danger'))
<br>
<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="alert alert-danger">
			<center>{{ session('danger') }}</center>
		</div>
	</div>
</div>
@endif

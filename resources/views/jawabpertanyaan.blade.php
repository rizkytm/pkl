@include('partials.header')

@include('partials.sidebar')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Tambah Pertanyaan
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Wawancara Selesai</li>
  </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Wawancara Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('store.jawaban') }}" method="post">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <div class="box-body">
                
                <input name="post_id" type="hidden" class="form-control" id="name" value="{{ $posts->id }}">
                
                @foreach($questions as $question)
                <div class="form-group">
                  <label for="exampleInputEmail1">{{ $question->question }}</label>
                  <input name="qid[]" type="hidden" class="form-control" id="name" value="{{ $question->id }}">
                  <input name="answers[]" type="text" class="form-control" id="name" placeholder="Jawaban">
                </div>
                @endforeach                 
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
              <!-- /.box-body -->

</div>

</section>
<!-- /.content-wrapper -->
</div>


@include('partials.footer')

@include('partials.controlsidebar')

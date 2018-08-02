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
              <label class="col-sm-2">Nama Narasumber</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="narasumber" value="{{ $posts->narasumber }}">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Topik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="topic" name="topic" value="{{ $posts->topic }}">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Kategori</label>
              <div class="col-sm-10">
                <select name="kategori_id">
                  <option>{{ $categories->name }}</option>
                </select>
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
            <form action="{{ route('post.edit.tampil',$posts) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <div class="box-body">
                <input name="post_id" type="hidden" class="form-control" id="name" value="1">
                @foreach($answers as $answer)
                @foreach($answer->question()->get() as $questions)
                <div class="form-group">
                  <label for="exampleInputEmail1">{{ $questions->question }}</label>
                  <input name="qid[]" type="hidden" class="form-control" id="name"  value="{{ $questions->id }}" >
                  <input name="answers[]" type="text" class="form-control" id="name" placeholder="Jawaban" value="{{ $answer->answer }}" >
                </div>
                @endforeach
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
<!-- /.content -->

</div>
<!-- /.content-wrapper -->



@include('partials.footer')

@include('partials.controlsidebar')

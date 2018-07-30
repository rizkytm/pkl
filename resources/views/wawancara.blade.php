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

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal" action="{{ route('store.wawancara') }}" method="post"> 
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group">
              <label class="col-sm-2">Nama Narasumber</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="narasumber" name="narasumber" placeholder="Nama">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Topik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="topic" name="topic" placeholder="Topik">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Kategori</label>
              <div class="col-sm-10">
                <select name="kategori_id">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{$category->name}}</option>
                @endforeach
                </select>
              </div>
            </div>

            <div class="col-sm-2"></div>
            <div class="form-group">
              <input type="submit" name="" class="btn btn-primary" value="Save">
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

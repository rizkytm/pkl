@include('partials.header')

@include('partials.sidebar')
<div class="content-wrapper">

  <section class="content-header">
      <h1>
      Buat Agenda
      </h1>      
    </section>

  <section class="content">

<div class="container">
    <div class="row">

<form action="{{ route('tasks.store') }}" method="post">
  {{ csrf_field() }}
  Task name:
  <br />
  <input type="text" name="name" />
  <br /><br />
  Task description:
  <br />
  <textarea name="description"></textarea>
  <br /><br />
  Start time:
  <br />
  <input type="text" name="task_date" id="datepicker" />
  <br /><br />
  <input type="submit" value="Save" />
</form>


    </div>
</div>

</section>

</div>


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css"></script>
<script>
    $('#datepicker').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>

@include('partials.footer')

@include('partials.controlsidebar')
@include('partials.header')
<div class="content-wrapper">

  <section class="content-header">
      <h1>
      Edit Agenda
      </h1>      
    </section>

  <section class="content">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

<form action="{{ route('tasks.update', $task) }}" method="post">
  {{ csrf_field() }}
  Task name:
  <br />
  <input type="text" name="name" value="{{ $task->name }}" />
  <br /><br />
  Task description:
  <br />
  <textarea name="description">{{ $task->description }}</textarea>
  <br /><br />
  Start time:
  <br />
  <input type="text" name="task_date" class="date" value="{{ $task->task_date }}" />
  <br /><br />
  <input type="submit" value="Save" />
</form>


    </div>
</div>

</section>


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
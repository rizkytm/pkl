@include('partials.header')

<div class="content-wrapper">

  <section class="content-header">
      <h1>
      Agenda <a href="{{ route('tasks.create') }}" class="btn btn-primary">Tambah Agenda</a>
      </h1>      
    </section>

  <section class="content">

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2 bg-info">

<div id='calendar'>
</div>

</div>
</div>

</section>

</div>


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            themeSystem : 'bootstrap4',
            events : [
                @foreach($tasks as $task)
                {
                    title : '{{ $task->name }}',
                    start : '{{ $task->task_date }}',
                    url : '{{ route('tasks.edit', $task->id) }}'
                },

                @endforeach
            ],            
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,agendaWeek,agendaDay,listMonth'
            },
        })
    });
</script>

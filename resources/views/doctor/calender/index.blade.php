@extends('admin.master.masterDoctor')

@section('css')
  @parent
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@endsection

@section('content')
<div class="container-fluid">
    <h3>Calendar</h3>
    <div id='calendar'></div>
</div>

@endsection

@section('scripts')
  @parent
  <!-- DataTables  & Plugins -->
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events : [
                    @foreach($tasks as $task)
                    {
                        title :'{{ $task->name }} Time: {{Carbon\Carbon::createFromFormat('H:i:s',$task->time_start)->format('H:i')}} - {{Carbon\Carbon::createFromFormat('H:i:s',$task->time_end)->format('H:i')}}',
                       
                        start : '{{ $task->date }}',
                       
                    },
                    @endforeach
                ]
            })
        });
    </script>
  

@endsection
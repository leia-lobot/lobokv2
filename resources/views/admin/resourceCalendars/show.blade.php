@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.resourceCalendar.title') . ' - ' . $name }}
    </div>

    <div class="card-body">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" />
        <div id="calendar"></div>

    </div>
</div>



@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script src='https://unpkg.com/@fullcalendar/core@4.4.0/locales-all.min.js'></script>

<script>
    $(document).ready(function() {

            // page is now ready, initialize the calendar...
            events={!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                slotDuration: '00:30',
                defaultView: 'agendaWeek',
                // TODO: Fix locale
                locale: 'sv',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaWeek,agendaDay'
                },

                events : events
            })
        });
</script>

@stop

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

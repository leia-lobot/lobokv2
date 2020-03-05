<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";

// must manually include stylesheets for each plugin
import "@fullcalendar/core/main.css";
import "@fullcalendar/daygrid/main.css";
import "@fullcalendar/timegrid/main.css";

export default {
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
    props: ["calendarEvents"],
    data() {
        return {
            calendarPlugins: [timeGridPlugin, dayGridPlugin, interactionPlugin],
            events: [
                {
                    title: "Shift",
                    start: "2020-03-03 10:00:00",
                    end: "2020-03-03 17:00:00",
                    backgroundColor: "#dc3545"
                },
                {
                    title: "Shift",
                    start: "2020-03-03 11:00:00",
                    end: "2020-03-03 13:00:00",
                    backgroundColor: "#28a745"
                }
            ]
        };
    }
};
</script>

<template>
    <FullCalendar
        ref="fullCalendar"
        defaultView="timeGridWeek"
        :plugins="calendarPlugins"
        :events="calendarEvents"
    />
</template>

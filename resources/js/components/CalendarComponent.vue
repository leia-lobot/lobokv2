<script>
import axios from "axios";

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

    data() {
        return {
            calendarPlugins: [timeGridPlugin, dayGridPlugin, interactionPlugin],


            events: "",
        };
    },
    created() {
        let uri = window.location.href.split('/');
        this.getEvents(uri[uri.length-1]);
    },
    methods: {
      getEvents(venue) {
        axios
            .get("/api/v1/calendars/" + venue)
            .then(resp => (this.events = resp.data.data))
            .catch(err => console.log(err.response.data));
        },
        getVenue() {

        }
    }
};
</script>

<template>
    <FullCalendar
        ref="fullCalendar"
        defaultView="timeGridWeek"
        :plugins="calendarPlugins"
        locale="sv"
        :events="events"
        :all-day-slot="false"
        slotDuration="00:30:00"
        :firstDay=1
        :businessHours="false"
        :nowIndicator="true"
        minTime="07:00:00"
        maxTime="21:00:00"
        height="auto"
    />
</template>

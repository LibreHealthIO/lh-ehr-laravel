<template>
    <layout>
        <Breadcrumb :active-link="activeLink"/>
        <div class="flex flex-row">
<!--            <div class="h-screen sticky-top w-2/6 bg-gray-200">-->
<!--                <calendar-sidebar-->
<!--                    :events="myEvents"-->
<!--                    :weekends-visible="isWeekendVisible"-->
<!--                    @set-weekends-visible="setweekendsVisible">-->
<!--                </calendar-sidebar>-->
<!--            </div>-->
<!--            <div class="w-screen w-4/6">-->
            <div class="w-screen ">
                <full-calendar
                    class="full-calendar"
                    :options="config">
                    <template #eventContent="{ timeText, event }">
                        <b>{{ timeText }}</b>
                        <i>{{ event.title }}</i>
                    </template>
                </full-calendar>
            </div>
        </div>
    </layout>

</template>


<script>
    import {mapGetters, mapActions} from "vuex"
    import Layout from "~/Shared/Layout"
    import CalendarSidebar from "../../components/CalendarSidebar";
    import Breadcrumb from "../../components/Breadcrumb";
    import FullCalendar from "@fullcalendar/vue"
    import dayGridPlugin from "@fullcalendar/daygrid"
    import interactionPlugin from "@fullcalendar/interaction"
    import momentPlugin from "@fullcalendar/moment"
    import timeGridPlugin from "@fullcalendar/timegrid"
    import scrollGridPlugin from "@fullcalendar/scrollgrid"
    import i18n from '~/i18n'

    // let myBreadcrumbs = [
    //     {title : 'Home', link : '/home'},
    //     {title : 'Patients', link : '/home/patients'},
    // ];
    let myActiveLink = i18n.t('menu.calendar');
    let calendarPlugins = [dayGridPlugin, interactionPlugin, momentPlugin, timeGridPlugin, scrollGridPlugin];
    let weekendsVisible = true;
    let demoEvents = [
        {title : 'Out of office', start : '2020-09-06', end : '2020-09-06'},
        {title : 'Out of office', start : '2020-09-10', end : '2020-09-10'},
        {title : 'Out of office', start : '2020-09-06', end : '2020-09-07'},
        {title : 'Out of office', start : '2020-09-08', end : '2020-09-08'},
        {title : 'Out of office', start : '2020-09-06', end : '2020-09-06'},
        {title : 'Out of office', start : '2020-09-07', end : '2020-09-07'},
    ];
    export default {
        name: 'calendar',
        metaInfo: { title: i18n.t('menu.calendar') },
        data: () => {
            return {
                isWeekendVisible: weekendsVisible,
                myEvents : demoEvents,
                activeLink: myActiveLink,
            };
        },
        computed: {
            ...mapGetters(['events', 'weekendsVisible']),
            config() {
                return {
                    ... this.configOptions,
                    ...this.eventHandlers
                }
            },
            configOptions () {
                return {
                    locale: i18n.locale,
                    editable: true,
                    selectable: true,
                    selectMirror: true,
                    dayMaxEvents: true,
                    events: demoEvents,
                    weekends: weekendsVisible,
                    schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
                    plugins: calendarPlugins,
                    customButtons: {
                        print: {
                            text: i18n.t('general.print'),
                            click: function() {
                                // Printing currently works for a single provider.
                                alert("Print Calendar");
                            }
                        },
                        search: {
                            text: i18n.t('general.search'),
                            click: function() {
                                alert("Search Calendar");
                            }
                        },
                        add: {
                            text: i18n.t('general.add'),
                            click: function () {
                                alert("Add to Calendar");
                            }
                        }
                    },
                    headerToolbar: {
                        left: 'prev,next today print,search,add',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    timeZone: 'UTC',
                    initialView: 'timeGridWeek',
                }
            },
            eventHandlers () {
                return {
                    dateClick: this.onDateClick,
                    eventClick: this.onEventClick,
                    eventDrop: this.onEventDrop,
                    eventResize: this.onEventDrop,
                    select: this.onDateSelect
                }
            }
        },
        methods: {
            ...mapActions([
                'createEvent',
                'updateEvent',
                'deleteEvent',
                'setweekendsVisible'
            ]),
            onDateClick (payload) {
                const title = prompt('Please enter a new title for your event');
                if (!title) {
                    return
                }
                const id = (this.events.length + 1) * 10;
                const { start, end, date, allDay } = payload;
                return this.createEvent({
                    id,
                    title,
                    date,
                    start,
                    end,
                    allDay
                })
            },
            onDateSelect (payload) {
                return this.onDateClick(payload)
            },
            onEventClick ({ event }) {
                const confirmed = confirm(`Are you sure you want to delete the event '${event.title}'?`)
                if (!confirmed) {
                    return
                }
                return this.deleteEvent(event.id)
            },
            onEventDrop ({ event }) {
                return this.updateEvent(event)
            },
            handleDateClick: function(arg) {
                alert('date click! ' + arg.dateStr)
            },
            toggleWeekends: function() {
                this.calendarOptions.weekends = !this.calendarOptions.weekends
            }
        },
        components: {
            FullCalendar,
            Layout,
            CalendarSidebar,
            Breadcrumb,
        }
    }
</script>

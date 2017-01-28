
var calendarEvents = calendarEvents;

(function ($) {

    // object containing events
    var eventList = new Object();


    /* initialize the external events
     -----------------------------------------------------------------*/
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];


    if ($('#calendar').length > 0) {

        /* initialize the calendar
         -----------------------------------------------------------------*/

        $('#calendar').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: calendarEvents,
            eventClick: function (event) {
                eventClickAction(event);
            },
            eventRender: function (event, element) {
                eventList = eventList + event;
                element.css('background-color', event.bg);
            },
            loading: function (bool) {
                if (bool) {
                    $('#loading').toggle(bool);
                }
            },
            viewRender: function () {
                thisMonthList();
            }

        });

        function eventClickAction(event) {
            renderSidebar(event);
            //$('body').toggleClass('active');
        }

        function renderSidebar(event) {
            event.startDate = moment(event.start).format("dddd, MMMM Do YYYY");
            event.startTime = moment(event.start).format("hh:mm");
            event.endDate = moment(event.end).format("dddd, MMMM Do YYYY");
            event.endTime = moment(event.end).format("hh:mm");

            $('#sidebar-calendar').removeClass('hidden');
            $('#sidebar-calendar .content').html(renderEventSidebar(event));
        }

        function renderEventSidebar(event) {

            var output = '<div class="p-a-1">' +
                    '<h5 class="m-a-0"><i class="material-icons text-muted">event</i> <span class="icon-text">' +
                    event.title +
                    '</span></h5></div><div class="p-l-1 p-r-1"' +
                    '<p>'+ event.description+'</p>'+
                    '<ul class="list-group">' +
                        '<li class="list-group-item"> <small class="text-muted"><strong>Starts:</strong></small><br/>'+ event.startDate+'</li>' +
                    '<li class="list-group-item"><small class="text-muted"><strong>Ends:</strong></small><br/>'+event.endDate+'</li>' +
                    '</ul>'
                ;
            return output;
        }

        // on load call this month list
        thisMonthList();

        // when adding a new event
        $('#addEvent').click(function () {
            var newEvent = {
                title: 'Custom Event Added',
                description: 'Added a custom event',
                type: 'meeting',
                bg: '#f4511e',
                start: new Date(),
                end: new Date()
            };
            $('#calendar').fullCalendar('renderEvent', newEvent);
            thisMonthList();
        });
    }

    // fetch list of events for current month;
    function thisMonthList() {
        var currentEvents = $('#calendar').fullCalendar('clientEvents');
        var output = 'da';
        $('#this-month-event-list').html(output);
    }


}(jQuery));
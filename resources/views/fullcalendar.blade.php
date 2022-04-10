<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <title>Laravel Fullcalender Add/Update/Delete Event Example Tutorial - Tutsmake.com</title>
        </h2>
    </x-slot>

    <div class="container">

      <div class="response"></div>

      <div id='calendar'></div>  

    </div>
    <script>
    
  $(document).ready(function () {
      var SITEURL = "{{url('/')}}";
      
        $.ajaxSetup({
            
            headers: {
                
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                
            }
            
        });

        
        var calendar = $('#calendar').fullCalendar({
            
            editable: true,
            
            events: 
            
            SITEURL + "/fullcalendareventmaster",
            daysOfWeek: [0,6],
            
            displayEventTime: true,
            
            editable: true,

            rendering:"background",
      color: "#ff9f89",
            
            eventRender: function (event, element, view) {

                if (event.allDay === 'true') {

                    event.allDay = true;

                } else {

                    event.allDay = false;

                }

            },

            selectable: false,

            selectHelper: false,

            eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                        $.ajax({

                            url: SITEURL + '/fullcalendareventmaster/update',

                            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,

                            type: "POST",

                            success: function (response) {

                                displayMessage("Updated Successfully");

                            }

                        });

                    },

        });

  });

  function displayMessage(message) {

    $(".response").html(message);
    setInterval(function() { $(".success").fadeOut(); }, 1000);
  }
</script>
</x-app-layout>

<!DOCTYPE html>

<head>

  <title>Laravel Fullcalender Add/Update/Delete Event Example Tutorial - Tutsmake.com</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

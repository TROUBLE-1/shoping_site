<?php include("session.php"); ?>
<body class="home" style="background-image: url('./images/wallpaper1.jpg');">
   <div class="container-fluid display-table">
      <div class="row display-table-row">
         <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
               <a hef="home.php"><img src="images/logo.PNG" alt="merkery_logo" class="hidden-xs hidden-sm">
               <img src="images/logo.PNG" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
               </a>
            </div>
            <div class="navi">
               <ul>
                  <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                  <li><a href="message.php"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">message</span></a></li>
                  <li><a href="statistics.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Statistics</span></a></li>
                  <li class="active"><a href="calender.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calender</span></a></li>
                  <li><a href="users.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                  <li ><a href="setting.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
               </ul>
            </div>
         </div>
         <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <div class="row">
               <header style="background-image: url('./images/wallpaper.jpg');">
                  <?php include('header.php') ?>
               </header>
            </div>
            <div class="user-dashboard">
               <h1 style="color:#afddff;font-weight: bold;font-size:40px">Calender</h1>
               <hr id="hr_line">
               <div class="row">
                  <div id="calender_body">
                     <div id='wrap'>
                        <div id='calendar'></div>
                        <div style='clear:both'></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
<head>
   <script>
      $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        /*  className colors
      
        className: default(transparent), important(red), chill(pink), success(green), info(blue)
      
        */
        /* initialize the external events
        -----------------------------------------------------------------*/
        $('#external-events div.external-event').each(function() {
          // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          };
          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject);
          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 999,
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
          });
        });
        /* initialize the calendar
        -----------------------------------------------------------------*/
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'title',
            center: 'agendaDay,agendaWeek,month',
            right: 'prev,next today'
          },
          editable: true,
          firstDay: 0, //  1(Monday) this can be changed to 0(Sunday) for the USA system
          selectable: true,
          defaultView: 'month',
          axisFormat: 'h:mm',
          columnFormat: {
            month: 'ddd', // Mon
            week: 'ddd d', // Mon 7
            day: 'dddd M/d', // Monday 9/7
            agendaDay: 'dddd d'
          },
          titleFormat: {
            month: 'MMMM yyyy', // September 2009
            week: "MMMM yyyy", // September 2009
            day: 'MMMM yyyy' // Tuesday, Sep 8, 2009
          },
          allDaySlot: false,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent', {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function(date, allDay) { // this function is called when something is dropped
            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }
          },
          events: [{
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d - 3, 16, 0),
              allDay: false,
              className: 'info'
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d + 4, 16, 0),
              allDay: false,
              className: 'info'
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false,
              className: 'important'
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false,
              className: 'important'
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d + 1, 19, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false,
            },
            {
              title: 'Click for Google',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'https://ccp.cloudaccess.net/aff.php?aff=5188',
              className: 'success'
            }
          ],
        });
      });
   </script>
   <style>
      #wrap {
      width: 1100px;
      margin: 0 auto;
      }
      #external-events {
      float: left;
      width: 150px;
      padding: 0 10px;
      text-align: left;
      }
      #external-events h4 {
      font-size: 16px;
      margin-top: 0;
      padding-top: 1em;
      }
      .external-event {
      /* try to mimick the look of a real event */
      margin: 10px 0;
      padding: 2px 4px;
      background: #3366CC;
      color: #fff;
      font-size: .85em;
      cursor: pointer;
      }
      #external-events p {
      margin: 1.5em 0;
      font-size: 11px;
      color: #666;
      }
      #external-events p input {
      margin: 0;
      vertical-align: middle;
      }
      #calendar {
      /* 		float: right; */
      margin: 0 auto;
      width: 900px;
      background-color: #FFFFFF;
      border-radius: 6px;
      box-shadow: 0 1px 2px #C3C3C3;
      -webkit-box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
      -moz-box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
      box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
      }
   </style>
</head>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="js/calender.js"></script>
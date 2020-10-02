<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2013 <a href="http://hotel.cihadoge.com/">DB Hotel Management System</a>. <span class="pull-right">Fadime Tugba DOGAN - Cihad OGE - Furkan Mustafa AKDEMIR</span> </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo base_url()?>js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo base_url()?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url()?>js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url()?>js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url()?>js/full-calendar/fullcalendar.min.js"></script>
 
<script src="<?php echo base_url()?>js/base.js"></script> 

<script src="<?php echo base_url()?>js/bootstrap-select.js"></script> 

<script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url()?>js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url()?>js/dataTables.buttons.min.js"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>

<!-- <script src="/js/buttons.bootstrap.min.js"></script> -->
<script src="<?php echo base_url()?>js/printThis.js"></script>

<?
if($page == "reservation" ) {
?>
<script type="text/javascript">
  function date2str(date) {
    var d = date.getDate(); 
    var m = date.getMonth()+1;
    var y = date.getFullYear();
    if(d<10)d='0'+d;
    if(m<10)m='0'+m;
    return y+'-'+m+'-'+d;
  }
  $(document).ready(function() {
    var d = new Date();
    if($("#calendar").length>0) {
      $("#checkin_date").val(date2str(d));
      $('#checkout_date').val(date2str(d));
    }
    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month'
      },
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
        console.log(typeof start);
        var d = new Date(start);
        console.log(d.getDate());
        console.log(date2str(start));console.log(date2str(end));
        $('#checkin_date').val(date2str(start));
        $('#checkout_date').val(date2str(end));
//        window.location.href="/reservation/make/" + year + "/" + month + "/" + day;
        return;
        var title = prompt('Event Title:');
        if (title) {
          calendar.fullCalendar('renderEvent',
            {
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
      editable: false,
      events: [
      ]
    });
    /*$('#calendar').find('.fc-widget-content').css('background-color','rgb(198, 247, 198)');
    $('#calendar').find('.fc-other-month').css('background-color','transparent');*/
  });

</script>
<? } else if($page == "dashboard") { ?>

<script>     
  // init calendar
  $(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month'
      },
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
        return;
        var title = prompt('Event Title:');
        if (title) {
          calendar.fullCalendar('renderEvent',
            {
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
      editable: true,
      events: [
        {
          title: 'New Year',
          start: new Date(y, m, 1)
        },
        {
          title: 'Project Demo',
          start: new Date(y, m, 2)
        },
        {
          title: 'CS353 Final',
          start: new Date(y, m, 8)
        }
      ]
    });
    /*$('#calendar').find('.fc-widget-content').css('background-color','rgb(198, 247, 198)');
    $('#calendar').find('.fc-other-month').css('background-color','transparent');*/
  });

        var lineChartData = {
            labels: <?php echo json_encode($next_week_freq['dates']);?>,
            datasets: [
              /*{
                  fillColor: "rgba(220,220,220,0.5)",
                  strokeColor: "rgba(220,220,220,1)",
                  pointColor: "rgba(220,220,220,1)",
                  pointStrokeColor: "#fff",
                  data: [65, 59, 90, 81, 56, 55, 40]
              },*/
              {
                  fillColor: "rgba(151,187,205,0.5)",
                  strokeColor: "rgba(151,187,205,1)",
                  pointColor: "rgba(151,187,205,1)",
                  pointStrokeColor: "#fff",
                  data: <?php echo json_encode($next_week_freq['freq_counts']);?>
              }
            ]
        };

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);

        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
              {
                  fillColor: "rgba(220,220,220,0.5)",
                  strokeColor: "rgba(220,220,220,1)",
                  data: [65, 59, 90, 81, 56, 55, 40]
              },
              {
                  fillColor: "rgba(151,187,205,0.5)",
                  strokeColor: "rgba(151,187,205,1)",
                  data: [28, 48, 40, 19, 96, 27, 100]
              }
            ]
        }    

    </script><!-- /Calendar -->
    <!-- Welcome Guide -->
    <?
    if(SHOW_GUIDE) {
    ?>
    <script src="js/guidely/guidely.min.js"></script>

    <script>
    $(function () {
      
      guidely.add ({
        attachTo: '#target-1'
        , anchor: 'top-left'
        , title: 'Today \'s Stats'
        , text: 'Puede ver cuántos servicios están registrados hoy.'
      });
      
      guidely.add ({
        attachTo: '#target-2'
        , anchor: 'top-left'
        , title: 'Next Week Reservations Chart'
        , text: 'Puedes ver la situación del hotel la próxima semana. Muestra cuántos clientes se alojarán la próxima semana.'
      });

      guidely.add ({
        attachTo: '#target-3'
        , anchor: 'top-left'
        , title: 'Most Favorite Customer'
        , text: 'Aquí puede ver el cliente que más dinero gasta en nuestro hotel. Usamos las funciones MAX, SUM, GROUP BY en nuestra base de datos.'
      });
      
      
      guidely.add ({
        attachTo: '#target-4'
        , anchor: 'top-left'
        , title: 'Most Frequent Customers'
        , text: 'Aquí puede ver los clientes más visitados. Usamos las funciones GROUP BY, ORDER aquí.'
      });
      //Comentado para que no inicialice tour de la app
      //guidely.init ({ welcome: true, startTrigger: true });


    });

    </script>
    <? } ?>
    <!--/Welcome Guide-->
<? } ?>
    <style type="text/css">
    .calendar{-webkit-user-select: none; -moz-user-select: none;}
    </style>
<script type="text/javascript">
  function open_form()
  {
    console.log("Opening Form...");
    $('#form').fadeIn();
  }
</script>
<script type="text/javascript">
  $(function () {
    <?php
    if($page == "customer"){
    ?>
      $("#TCno").on('keypress change blur', function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          //$("#errmsg").html("Digits Only").show().fadeOut("slow");
          return false;
        }

        //var tam = $("#NroIdentidad").length;
        var value = $(this).val();
        var tam = value.length;
        //console.log(tam);
        if (tam >= 8) {
          $.get('https://dni.optimizeperu.com/api/persons/'+ $(this).val() +'?format=json', 
              {nombre: "", edad: ""}, function(respuesta){
            console.log(respuesta);
            $("#firstname").val(respuesta.name).change();
            $("#lastname").val(respuesta.first_name + ' ' + respuesta.last_name).change();
            // result = JSON.parse(JSON.stringify(respuesta));
            // console.log(result);
          })
        }
      });
    <?php
    }
    ?>

    var regreserva = $("#regreserva").val();
    if(regreserva == "1"){

      //$('select').selectpicker();
      $('#customer_TCno').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
      $("#div_hour").hide();

      $( "#type_rental" ).change(function() {
        //alert( "Handler for .change() called." );
        var value = $(this).val();

        if(value == "<? echo HORAS;?>"){
          $("#div_hour").show();
          $("#div_checkout_date").hide();
        }
        if(value == "<? echo DIAS;?>"){
          $("#div_hour").hide();
          $("#div_checkout_date").show();
        }
      });
    }

    var report_reservation = $("#report_reservation").val();
    if(report_reservation == "1"){
      var table = $('#table_id').DataTable({
                  dom: 'B<"clear">lfrtip',
                  buttons: [
                      'copyHtml5',
                      //'excelHtml5',
                      //'csvHtml5',
                      //'pdfHtml5',
                      {
                          extend: 'excelHtml5',
                          exportOptions: {
                              columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15 ]
                          }
                      },
                      {
                          extend: 'pdfHtml5',
                          exportOptions: {
                              columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15 ]
                          }
                      },
                      'colvis'
                  ],
                  columnDefs: [ 
                  {
                      targets: 0,
                      visible: false
                  } ,{
                      targets: 11,
                      visible: false
                  } ,
                  {
                      targets: 15,
                      visible: false
                  }],
                  responsive: true
              });
    }
    var print_reservation = $("#print_reservation").val();
    if(print_reservation !=""){
      $('#btnImprimir').on("click", function () {
          window.open("<?php echo base_url()?>reservation/report/" +  print_reservation);
          /*$('#printReserva').printThis({
            base: "<?=$this->config->item('base_url') ?>",
            header: "<h2>Detalle de la Reserva:</h2>",
            importCSS: true,            // import parent page css
            importStyle: true,         // import style tags
            canvas: false              // copy canvas content
          });*/
          
      });
    }

    /* LISTDO DE CLIENTE - DATATABLE */
    var table = $('#table_customer').DataTable({
              
                  responsive: true
              });

  });
</script>
</body>
</html>

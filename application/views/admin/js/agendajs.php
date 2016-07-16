<script type="text/javascript">

    agenda.controller('Agenda', ['$scope', '$http', '$window',function($scope, $http, $window) {

      var request = {

          method: 'GET',

          url: host +'obt_citas',

          headers:{'Content-Type': 'application/json'}

      };

      $http(request).

       then(function(response) {

           $scope.citas = response.data;

           console.log(response.status);

           var cit = $scope.citas;

           $scope.eventos = [];

           var date = new Date();
			if (cit != "null") {
			   for(i = 0; i < cit.length; i++){
				 date.setFullYear(cit[i].fecha.split('-')[0]);
				 date.setMonth(cit[i].fecha.split('-')[1]),
				 date.setDate(cit[i].fecha.split('-')[2]);
				 $scope.eventos.push({
				   title: cit[i].nombre_cliente,
				   start: cit[i].fecha + "T" +cit[i].hora,
				   url: host + 'cita/'+cit[i].id,
				   backgroundColor: "#f56954", //red
				   borderColor: "#f56954" //red

				 });

			   }
			}

           console.log($scope.eventos);

           calendar($scope.eventos);

       }, function(response) {

         alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");

           $scope.mensaje = {

             msg:"No se envió información, comuniquese con el proveedor",

             tipo:"alert-warning"

           }

           //$scope.data = response.data || "Request failed";

           //$scope.status = response.status;

       });

    }]);

</script>



<script>

    function calendar(eventos) {



        /* initialize the calendar*/

        $('#calendar').fullCalendar({

            header: {

                left: 'prev,next today',

                center: 'title',

                right: 'month,agendaWeek,agendaDay'

            },

            eventLimit: true,

            lang: 'es',

            buttonText: {

                today: 'Hoy',

                month: 'Mes',

                week: 'Semana',

                day: 'Día'

            },

            //Random default events

            events: eventos,

            //editable: true,

            droppable: true

        });

    }

</script>

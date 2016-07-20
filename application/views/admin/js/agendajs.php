<script type="text/javascript">
    
        function Calendario(){
            var request = {
                method: 'GET',
                url: host+'obt_citas',
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
                        var backgroundColor ="";
                        var borderColor = "";
                        if(cit[i].nombre_plan.indexOf("CLASE CORTESIA") > -1){
                            backgroundColor = "#3c8dbc";//azul
                            borderColor = "#3c8dbc";//azul
                        }else{
                            backgroundColor = "#00a65a";//green
                            borderColor = "#00a65a";//green
                        }
                        $scope.eventos.push({
                        title: cit[i].nombre_cliente,
                        start: cit[i].fecha + "T" +cit[i].hora,
                        url: host+'cita/'+cit[i].id,
                        backgroundColor: backgroundColor, //red
                        borderColor: borderColor //red
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
        }
    
        function ClienteController($scope){
            $scope.ClienteController = true;
                $scope.cliente;
                $scope.clientes; // listado de clientes

                var req = {
                    method: 'GET',
                    url: host + 'clientes',
                    headers:{
                        'Content-Type': 'application/json'
                    }
                }

                $http(req).
                then(function(response) {
                    $scope.status = response.status;
                    $scope.data = response.data;
                    $scope.clientes = _.sortBy($scope.data, 'reference');
                }, function(response) {
                    alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
                    //$scope.data = response.data || "Request failed";
                    //$scope.status = response.status;
                });
        }
        
        
</script>

<script>
    function calendar(eventos) {

        /* initialize the calendar
            agenda.controller('Agenda', ['$scope', '$http', '$window',function($scope, $http, $window) { }]);
         */
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

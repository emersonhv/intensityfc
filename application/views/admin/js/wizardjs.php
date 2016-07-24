<script type="text/javascript">

    agenda.controller('Wizard', ['$scope', '$http', '$window',function($scope, $http, $window) {
        $scope.planSel;  //PLan seleccionado
        $scope.clieSel;  //Cliene seleccionado
        $scope.planes;   // listado de planes
        $scope.clientes; // listado de clientes

        $http.defaults.headers.common.Authorization = 'Basic aW50ZW5zaXR5ZmNAZ21haWwuY29tOjQyYTM2MDcyZjFlM2MxN2YxZjA3';
        var req = {
            method: 'GET',
            url: 'https://app.alegra.com/api/v1/items?start=0&limit=30&order_direction=ASC&metadata=false&query=PLAN',
            cache:true,
            headers:{
                'Content-Type': 'application/json'
            }
        }

        //{method: 'GET', url: $scope.url}

        $scope.color = ['bg-aqua','bg-green','bg-yellow','bg-red','bg-purpure','bg-pink','bg-orange','bg-blue'];
        $scope.indice = 0;
        $http(req).then(function(response) {
             $scope.status = response.status;
             $scope.data = response.data;
             $scope.planes = _.sortBy($scope.data, 'reference');
             $scope.listarCliente();
         }, function(response) {
             alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
         });

         $scope.listarCliente = function(){
            var reqcli = req;
            reqcli.url = host + 'clientes';

            $http(reqcli).then(function(response) {
                 $scope.statuscli = response.status;
                 $scope.datacli = response.data;
                 $scope.clientes = _.sortBy($scope.datacli, 'id');
				 console.log($scope.clientes);

                 if($scope.clientes.length > 29){
                   $scope.indice = $scope.indice + 30;
                 }

             }, function(response) {
                 alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
                 //$scope.data = response.data || "Request failed";
                 //$scope.status = response.status;
             });
         };

         $scope.seleccionarPLan = function(index) {
            $scope.planSel = $scope.planes[index];
            document.getElementsByClassName("noAccess")[0].style.pointerEvents = 'visible';
            $scope.planDescripcion = JSON.parse($scope.planSel.description.split('\n')[2]);
         };

         $scope.seleccionarClie = function(index) {
            $scope.clieSel = $(index).attr("cliente");
            //$scope.clieSel = $scope.clientes[index];
            document.getElementsByClassName("noAccess")[1].style.pointerEvents = 'visible';
         };

         $scope.enviar_tarea_programada = function(){

            if($scope.planDescripcion.clasesxsemana == '1') {
                $scope.tareaProgramada = {
                    idPlan:$scope.planSel,
                    idClie:$scope.clieSel,
                    clasesPorsemana:$scope.planDescripcion.clasesxsemana,
                    fecha:$scope.fecha,
                    hora:$scope.hora,
                    descripcion:JSON.parse($scope.planSel.description.split('\n')[2])
                };
            } else {
                $scope.tareaProgramada = {
                    idPlan:$scope.planSel,
                    idClie:$scope.clieSel,
                    clasesPorsemana:$scope.planDescripcion.clasesxsemana,
                    fechaCita1:$scope.fecha_c1,
                    horaCita1:$scope.hora_c1,
                    fechaCita2:$scope.fecha_c2,
                    horaCita2:$scope.hora_c2,
                    descripcion:JSON.parse($scope.planSel.description.split('\n')[2])
                };
            }

            var request = {
                method: 'POST',
                url: host + 'insertar_citas',
                data:$scope.tareaProgramada,
                headers:{'Content-Type': 'application/json'}
            };

            $http(request).then(function(response) {
                 //$window.location.href = 'ver_agenda';
                 $scope.mensaje = response.data;
                 console.log($scope.mensaje);
             }, function(response) {
                 $scope.mensaje = {
                    msg:"hubo un error al enviar información, comuniquese con el proveedor",
                    tipo:"callout-danger"
                 }
             });
         };

    }]);

</script>


<script type="text/javascript">

    agenda.controller('Cita', ['$scope', '$http', '$window', '$location',function($scope, $http, $window, $location) {

        $scope.cliente;

        $scope.plan;

        console.log($scope.idCita);

         $scope.editar_cita = function(){

            $scope.cita = {

               id:$scope.idCita,

               fecha:$scope.fecha,

               hora:$scope.hora,

            };

            var request = {

                method: 'POST',

                url: host+'/editar_cita',

                data:$scope.cita,

                headers:{'Content-Type': 'application/json'}

            };

            $http(request).

             then(function(response) {

                 $scope.mensaje = response.data;

                 $scope.mensaje = {

                   msg:"Cita guardada con éxito.",

                   tipo:"alert-success"

                 }

                 //console.log(response.status);

                 //console.log($scope.mensaje);

                 $window.location.href = '/ver_agenda';

             }, function(response) {

                 $scope.mensaje = {

                   msg:"No se envió información, comuniquese con el proveedor",

                   tipo:"alert-warning"

                 }

                 //$scope.data = response.data || "Request failed";

                 //$scope.status = response.status;

             });

         };

		  $scope.cancelar_cita = function(){

            $scope.cita = {
               id:$scope.idCita,
            };

            var request = {
                method: 'POST',
                url: host+'cancelar_cita',
                data:$scope.cita,
                headers:{'Content-Type': 'application/json'}
            };

            $http(request).
             then(function(response) {
                 $scope.mensaje = response.data;
                 $scope.mensaje = {
                   msg:"Cita Cancelada con éxito.",
                   tipo:"alert-success"
                 }
					alert($scope.mensaje.msg);
                 //console.log(response.status);
                 //console.log($scope.mensaje);
                 $window.location.href = host+'ver_agenda';
             }, function(response) {
                 $scope.mensaje = {
                   msg:"No se envió información, comuniquese con el proveedor",
                   tipo:"alert-warning"
                 }
                 //$scope.data = response.data || "Request failed";
                 //$scope.status = response.status;
             });
         };

         $scope.completar_cita = function(){

            $scope.cita = {
               id:$scope.idCita,
            };

            var request = {
                method: 'POST',
                url: host+'completar_cita',
                data:$scope.cita,
                headers:{'Content-Type': 'application/json'}
            };

            $http(request).
             then(function(response) {
                 $scope.mensaje = response.data;
                 $scope.mensaje = {
                   msg:"Cita Completada con éxito.",
                   tipo:"alert-success"
                 }

                 //console.log(response.status);
                 //console.log($scope.mensaje);
                 $window.location.href = host+'ver_agenda';
             }, function(response) {
                 $scope.mensaje = {
                   msg:"No se envió información, comuniquese con el proveedor",
                   tipo:"alert-warning"
                 }
                 //$scope.data = response.data || "Request failed";
                 //$scope.status = response.status;
             });
         };
    }]);

</script>

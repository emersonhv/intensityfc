<script type="text/javascript">

    agenda.controller('GestionCitas', ['$scope', '$http', '$window',function($scope, $http, $window) {

      $scope.cita;
      $scope.citas;
      var req = {
          method: 'GET',
          url: host + 'lista_citas',
          headers:{
              'Content-Type': 'application/json'
          }
      }

      $http(req).
       then(function(response) {
           $scope.status = response.status;
           $scope.data = response.data;
           console.log($scope.data);
           $scope.citas = $scope.data;

       }, function(response) {
           alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
           //$scope.data = response.data || "Request failed";
           //$scope.status = response.status;
       });

       /*$scope.propertyName = 'fecha';
       $scope.reverse = true;

       $scope.sortBy = function(propertyName) {
       $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
       $scope.propertyName = propertyName;
  };*/
    }]);

</script>

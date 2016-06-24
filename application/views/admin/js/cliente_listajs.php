<script type="text/javascript">

    agenda.controller('Clientes_Lista', ['$scope', '$http', '$window',function($scope, $http, $window) {
       
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
             alert("Request failed");
             //$scope.data = response.data || "Request failed";
             //$scope.status = response.status;
         });
    }]);



</script>
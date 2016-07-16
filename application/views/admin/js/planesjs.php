<script type="text/javascript">
    agenda.controller('VerPlanes', ['$scope', '$http', function($scope, $http) {

        $http.defaults.headers.common.Authorization = 'Basic aW50ZW5zaXR5ZmNAZ21haWwuY29tOjQyYTM2MDcyZjFlM2MxN2YxZjA3';
        $http.defaults.cache = true;
        var req = {
            method: 'GET',
            url: 'https://app.alegra.com/api/v1/items?start=0&limit=30&order_direction=ASC&metadata=false&query=PLAN',
            cache: true,
            headers:{
                'Content-Type': 'application/json'
            }
        }
        //{method: 'GET', url: $scope.url}
        $scope.color = ['bg-aqua','bg-green','bg-yellow','bg-red','bg-purpure','bg-pink','bg-orange','bg-blue'];
        $http(req).
            then(function(response) {
                $scope.status = response.status;
                $scope.data = response.data;
                $scope.planes = _.sortBy($scope.data, 'reference');
            }, function(response) {
                alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
                //$scope.data = response.data || "Request failed";
                //$scope.status = response.status;
            });
    }]);
</script>

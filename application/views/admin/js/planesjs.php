<script type="text/javascript">
    agenda.controller('VerPlanes', ['$scope', '$http', function($scope, $http) {

       // $http.defaults.headers.common.Authorization = 'Basic aW50ZW5zaXR5ZmNAZ21haWwuY29tOjQyYTM2MDcyZjFlM2MxN2YxZjA3';
        //$http.defaults.cache = true;
        $scope.getPlanes = function(){
            var req = {
                method: 'GET',
                url: host + 'get_planes',
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
        }
        
        /*
        $scope.guardarPlanAlegra = function(){
			$http.defaults.headers.common.Authorization = Auth;
			
			$scope.planAlegra = {
                "name": $scope.plan.name,
                "reference": $scope.plan.reference != '' ?$scope.plan.reference : null,
                "description": $scope.plan.description != '' ? $scope.plan.description : null,
                "price": $scope.plan.price != '' ? $scope.plan.price : null,
                "cantidad_citas": $scope.plan.cantidad_citas != '' ? $scope.plan.cantidad_citas : null,
                "clasesxsemana": $scope.plan.clasesxsemana != '' ? $scope.plan.clasesxsemana : null,
			}
			
			var req = {

				method: 'POST',

				url: 'https://app.alegra.com/api/v1/contacts',

				headers:{
					'Content-Type': 'application/json'
				},
				
				data: $scope.clienteAlegra
			}

			$http(req).

			 then(function(response) {

				 $scope.status = response.status;

				 $scope.data = response.data;
				 console.log("--------------------------------------------------------------------------");
				 console.log($scope.status);
				 console.log($scope.data);

			 }, function(response) {

				 alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");

				 //$scope.data = response.data || "Request failed";

				 //$scope.status = response.status;

			 });
		}
        */
        $scope.limpiarForm = function(){
			$scope.cliente = "";
		}
		
        $scope.crearPlan = function(){
			$scope.plan.plan = true;
			var req = {
				method: 'POST',
				url: host + 'crear_plan',
				headers:{
					'Content-Type': 'application/json'
				},
				
				data: $scope.plan
			}
			
            $http(req).

             then(function(response) {

                $scope.status = response.status;
				
                $scope.datacli = response.data;
				console.log($scope.datacli);
				/*if($scope.datacli.tipo == 'alert-success'){
					$scope.guardarClienteAlegra();
				}
				*/
				if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
					window.scrollBy(0, -750);
				}
				
                 //$scope.clientes = _.sortBy($scope.datacli, 'id');

             }, function(response) {

                 alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");

                 //$scope.data = response.data || "Request failed";

                 //$scope.status = response.status;

             });

        }
            
    }]);


    agenda.controller('GetPlan', ['$scope', '$http', function($scope, $http) {

       // $http.defaults.headers.common.Authorization = 'Basic aW50ZW5zaXR5ZmNAZ21haWwuY29tOjQyYTM2MDcyZjFlM2MxN2YxZjA3';
        //$http.defaults.cache = true;
        $scope.getPlanes = function(){
            var req = {
                method: 'GET',
                url: host + 'get_planes',
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
        }

    }]);
</script>

<!--
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
-->
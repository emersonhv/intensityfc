<script type="text/javascript">

    agenda.controller('Clientes', ['$scope', '$http', '$window',function($scope, $http, $window) {

        $scope.cliente;
		
		$scope.guardarClienteAlegra = function(){
			$http.defaults.headers.common.Authorization = Auth;
			
			$scope.clienteAlegra = {
                "name": $scope.cliente.nombre,
                "identification": $scope.cliente.nit != '' ? $scope.cliente.nit : null,
                "email": $scope.cliente.email != '' ? $scope.cliente.email : null,
                "phonePrimary": $scope.cliente.tel1 != '' ? $scope.cliente.tel1 : null,
                "phoneSecondary": $scope.cliente.tel2 != '' ? $scope.cliente.tel2 : null,
                "fax": $scope.cliente.fax != '' ? $scope.cliente.fax : null,
                "mobile": $scope.cliente.celular != '' ? $scope.cliente.celular : null,
                "observations": $scope.cliente.observaciones != '' ? $scope.cliente.observaciones : null,
                "type" : ["client"],
                "address" : {
                        "address" : $scope.cliente.direccion != '' ? $scope.cliente.direccion : null,
                        "city" : $scope.cliente.ciudad != '' ? $scope.cliente.ciudad : null
                },
                "seller": null,
                "term" : null,
                "priceList" : null,
                "internalContacts" : null
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

				 alert("Request failed");

				 //$scope.data = response.data || "Request failed";

				 //$scope.status = response.status;

			 });
		}
		
		$scope.limpiarForm = function(){
			$scope.cliente = "";
		}
		
        $scope.crearCliente = function(){
			$scope.cliente.cliente = true;
			var req = {

				method: 'POST',

				url: host + 'crear_cliente',

				headers:{
					'Content-Type': 'application/json'
				},
				
				data: $scope.cliente
			}
			
            $http(req).

             then(function(response) {

                $scope.status = response.status;
				
                $scope.datacli = response.data;
				console.log($scope.datacli);
				if($scope.datacli.tipo == 'alert-success'){
					$scope.guardarClienteAlegra();
				}
				
				if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
					window.scrollBy(0, -750);
				}
				
                 //$scope.clientes = _.sortBy($scope.datacli, 'id');

             }, function(response) {

                 alert("Request failed");

                 //$scope.data = response.data || "Request failed";

                 //$scope.status = response.status;

             });

        }

    }]);

</script>
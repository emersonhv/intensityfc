<script type="text/javascript">
  agenda.controller('CrearCliente', ['$scope', '$http', '$window', function ($scope, $http, $window) {
    $scope.cliente;

    $scope.guardarClienteAlegra = function () {
        $http.defaults.headers.common.Authorization = Auth;
        /*$scope.clienteAlegra = {
            "name": $scope.cliente.nombre,
            "identification": $scope.cliente.nit != '' ? $scope.cliente.nit : null,
            "email": $scope.cliente.email != '' ? $scope.cliente.email : null,
            "phonePrimary": $scope.cliente.tel1 != '' ? $scope.cliente.tel1 : null,
            "phoneSecondary": $scope.cliente.tel2 != '' ? $scope.cliente.tel2 : null,
            "fax": $scope.cliente.fax != '' ? $scope.cliente.fax : null,
            "mobile": $scope.cliente.celular != '' ? $scope.cliente.celular : null,
            "observations": $scope.cliente.observaciones != '' ? $scope.cliente.observaciones : null,
            "type": ["client"],
            "address": {
                "address": $scope.cliente.direccion != '' ? $scope.cliente.direccion : null,
                "city": $scope.cliente.ciudad != '' ? $scope.cliente.ciudad : null
            },
            "seller": null,
            "term": null,
            "priceList": null,
            "internalContacts": null
        }*/
        $scope.clienteAlegra = {
            "name": $scope.cliente.name,
            "identification": $scope.cliente.identification != '' ? $scope.cliente.identification : null,
            "email": $scope.cliente.email != '' ? $scope.cliente.email : null,
            "phonePrimary": $scope.cliente.phonePrimary != '' ? $scope.cliente.phonePrimary : null,
            "phoneSecondary": $scope.cliente.phoneSecondary != '' ? $scope.cliente.phoneSecondary : null,
            "fax": $scope.cliente.fax != '' ? $scope.cliente.fax : null,
            "mobile": $scope.cliente.mobile != '' ? $scope.cliente.mobile : null,
            "observations": $scope.cliente.observations != '' ? $scope.cliente.observations : null,
            "type": ["client"],
            "address": {
                "address": $scope.cliente.address != '' ? $scope.cliente.address : null,
                "city": $scope.cliente.ciudad != '' ? $scope.cliente.ciudad : null
            },
            "seller": null,
            "term": null,
            "priceList": null,
            "internalContacts": null
        }
        var req = {
            method: 'POST',
            url: 'https://app.alegra.com/api/v1/contacts',
            headers: {
                'Content-Type': 'application/json'
            },
            data: $scope.clienteAlegra
        }
        $http(req).
         then(function (response) {
             $scope.status = response.status;
             $scope.data = response.data;
             console.log("--------------------------------------------------------------------------");
             console.log($scope.status);
             console.log($scope.data);

         }, function (response) {
             alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
             //$scope.data = response.data || "Request failed";
             //$scope.status = response.status;
         });
    }

    $scope.limpiarForm = function () {
        $scope.cliente = "";
    }

    $scope.crearCliente = function () {
        $scope.cliente.cliente = true;
        var req = {
            method: 'POST',
            url: host + 'crear_cliente',
            headers: {
                'Content-Type': 'application/json'
            },
            data: $scope.cliente
        }

        $http(req).
         then(function (response) {
             $scope.status = response.status;
             $scope.datacli = response.data;
             console.log($scope.datacli);
             if ($scope.datacli.tipo == 'alert-success') {
                 $scope.guardarClienteAlegra();
             }

             if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
                 window.scrollBy(0, -750);
             }
             //$scope.clientes = _.sortBy($scope.datacli, 'id');
         }, function (response) {
             alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
             //$scope.data = response.data || "Request failed";
             //$scope.status = response.status;
         });
    }
}]);

agenda.controller('ActualizarCliente', ['$scope', '$http', function ($scope, $http) {
  $scope.cliente;
  var id_cliente = $(location).attr('href').split('/')[5];
  if (id_cliente != undefined) {
      var req = {
          method: 'GET',
          url: host + 'get_cliente/'+id_cliente,
          headers: {
              'Content-Type': 'application/json'
          }
      }

      $http(req).
          then(function (response) {
              $scope.data = response.data;
              $scope.cliente = $scope.data;
              console.log($scope.cliente);
          }, function (response) {
              alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
          });
    }

    $scope.actualizarClienteAlegra = function () {
        $http.defaults.headers.common.Authorization = Auth;
        $scope.clienteAlegra = {
            "id": $scope.cliente.id,
            "name": $scope.cliente.name,
            "identification": $scope.cliente.identification != '' ? $scope.cliente.identification : null,
            "email": $scope.cliente.email != '' ? $scope.cliente.email : null,
            "phonePrimary": $scope.cliente.phonePrimary != '' ? $scope.cliente.phonePrimary : null,
            "phoneSecondary": $scope.cliente.phoneSecondary != '' ? $scope.cliente.phoneSecondary : null,
            "fax": $scope.cliente.fax != '' ? $scope.cliente.fax : null,
            "mobile": $scope.cliente.mobile != '' ? $scope.cliente.mobile : null,
            "observations": $scope.cliente.observations != '' ? $scope.cliente.observations : null,
            "type": ["client"],
            "address": {
                "address": $scope.cliente.address != '' ? $scope.cliente.address : null,
                "city": $scope.cliente.ciudad != '' ? $scope.cliente.ciudad : null
            },
            "seller": null,
            "term": null,
            "priceList": null,
            "internalContacts": null
        }
        var req = {
            method: 'PUT',
            url: 'https://app.alegra.com/api/v1/contacts/'+$scope.cliente.id,
            headers: {
                'Content-Type': 'application/json'
            },
            data: $scope.clienteAlegra
        }
        $http(req).
         then(function (response) {
             $scope.status = response.status;
             $scope.data = response.data;
             console.log("--------------------------------------------------------------------------");
             console.log($scope.status);
             console.log($scope.data);

         }, function (response) {
             alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
             //$scope.data = response.data || "Request failed";
             //$scope.status = response.status;
         });
    }

    $scope.cliente;
    $scope.actualizarCliente = function () {
      var req = {
          method: 'POST',
          url: host + 'actualizar_cliente',
          headers: {
              'Content-Type': 'application/json'
          },
          data: $scope.cliente
      }

      $http(req).
          then(function (response) {
              $scope.status = response.status;
              $scope.datacli = response.data;
              console.log($scope.datacli);

              if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
                  window.scrollBy(0, -750);
              }

              if ($scope.datacli.tipo == 'alert-success') {
                  $scope.actualizarClienteAlegra();
              }

          }, function (response) {
              alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
          });
    }

    $scope.limpiarForm = function () {
        $scope.cliente = "";
    }

}]);

</script>

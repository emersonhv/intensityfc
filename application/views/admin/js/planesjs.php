<script type="text/javascript">
  agenda.controller('VerPlanes', ['$scope', '$http', function ($scope, $http) {

      var req = {
          method: 'GET',
          url: host + 'get_planes',
          headers: {
              'Content-Type': 'application/json'
          }
      }
      $scope.color = ['bg-aqua', 'bg-green', 'bg-yellow', 'bg-red', 'bg-purpure', 'bg-pink', 'bg-orange', 'bg-blue'];
      $http(req).
          then(function (response) {
              $scope.status = response.status;
              $scope.data = response.data;
              $scope.planes = $scope.data;
          }, function (response) {
              alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
          });

      }]);

  agenda.controller('GestionPlan', ['$scope', '$http', function ($scope, $http) {
    $scope.plan;

    var id_plan = $(location).attr('href').split('/')[5];
    if (id_plan != undefined) {
        var req = {
            method: 'GET',
            url: host + 'get_plan/'+id_plan,
            headers: {
                'Content-Type': 'application/json'
            }
        }

        $http(req).
            then(function (response) {
                $scope.data = response.data;
                $scope.plan = $scope.data;
                console.log($scope.data);
            }, function (response) {
                alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
            });
    }

    $scope.actualizarPlan = function () {
      var req = {
          method: 'POST',
          url: host + 'actualizar_plan',
          headers: {
              'Content-Type': 'application/json'
          },
          data: $scope.plan
      }

      $http(req).
          then(function (response) {
              $scope.status = response.status;
              $scope.datacli = response.data;
              console.log($scope.datacli);

              if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
                  window.scrollBy(0, -750);
              }

          }, function (response) {
              alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
          });
    }

    $scope.limpiarForm = function () {
        $scope.cliente = "";
    }

    $scope.crearPlan = function () {
      $scope.plan.plan = true;
      if ($scope.idPlan == "") {
          var req = {
              method: 'POST',
              url: host + 'crear_plan',
              headers: {
                  'Content-Type': 'application/json'
              },

              data: $scope.plan
          }
        }else if ($scope.idPlan != "") {
          var req = {
              method: 'POST',
              url: host + 'actualizar_plan',
              headers: {
                  'Content-Type': 'application/json'
              },

              data: $scope.plan
          }
        }
        $http(req).
          then(function (response) {
             $scope.status = response.status;
             $scope.datacli = response.data;
             console.log($scope.datacli);
             if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
                 window.scrollBy(0, -750);
             }
         }, function (response) {
             alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
         });
       }
  }]);

  agenda.controller('GetPlan', ['$scope', '$http', function ($scope, $http) {



    }]);

</script>

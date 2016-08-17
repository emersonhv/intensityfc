<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script type="text/javascript">
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: new Date
    });

    agenda.controller('Wizard', ['$scope', '$http', '$window', function($scope, $http, $window) {
        $scope.planSel; //PLan seleccionado
        $scope.clieSel; //Cliene seleccionado
        $scope.planes; // listado de planes
        $scope.clientes; // listado de clientes

        $http.defaults.headers.common.Authorization = 'Basic aW50ZW5zaXR5ZmNAZ21haWwuY29tOjQyYTM2MDcyZjFlM2MxN2YxZjA3';
        var req = {
            method: 'GET',
            url: 'https://app.alegra.com/api/v1/items?start=0&limit=30&order_direction=ASC&metadata=false&query=PLAN',
            cache: true,
            headers: {
                'Content-Type': 'application/json'
            }
        }

        //{method: 'GET', url: $scope.url}

        $scope.color = ['bg-aqua', 'bg-green', 'bg-yellow', 'bg-red', 'bg-purpure', 'bg-pink', 'bg-orange', 'bg-blue'];
        $scope.indice = 0;
        $http(req).then(function(response) {
            $scope.status = response.status;
            $scope.data = response.data;
            $scope.planes = _.sortBy($scope.data, 'reference');
            $scope.listarCliente();
        }, function(response) {
            alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
        });

        $scope.listarCliente = function() {
            var reqcli = req;
            reqcli.url = host + 'clientes';

            $http(reqcli).then(function(response) {
                $scope.statuscli = response.status;
                $scope.datacli = response.data;
                $scope.clientes = _.sortBy($scope.datacli, 'id');


                if ($scope.clientes.length > 29) {
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

        $scope.enviar_tarea_programada = function() {
            $scope.mensaje = undefined;
            if ($scope.validarFormulario()) {

                if ($scope.planDescripcion.clasesxsemana == '1') {
                    $scope.tareaProgramada = {
                        idPlan: $scope.planSel,
                        idClie: $scope.clieSel,
                        clasesPorsemana: $scope.planDescripcion.clasesxsemana,
                        fecha: $scope.fecha,
                        hora: $scope.hora,
                        descripcion: JSON.parse($scope.planSel.description.split('\n')[2])
                    };
                } else {
                    $scope.tareaProgramada = {
                        idPlan: $scope.planSel,
                        idClie: $scope.clieSel,
                        clasesPorsemana: $scope.planDescripcion.clasesxsemana,
                        fechaCita1: $scope.fecha_c1,
                        horaCita1: $scope.hora_c1,
                        fechaCita2: $scope.fecha_c2,
                        horaCita2: $scope.hora_c2,
                        descripcion: JSON.parse($scope.planSel.description.split('\n')[2])
                    };
                }

                var request = {
                    method: 'POST',
                    url: host + 'insertar_citas',
                    data: $scope.tareaProgramada,
                    headers: {
                        'Content-Type': 'application/json'
                    }
                };

                $http(request).then(function(response) {
                    //$window.location.href = 'ver_agenda';
                    $scope.mensaje = response.data;

                }, function(response) {
                    $scope.mensaje = {
                        msg: "hubo un error al enviar información, comuniquese con el proveedor",
                        tipo: "callout-danger"
                    }
                });
            } else {
                $scope.mensaje = {
                     informacion:["Las fechas deben tener formato YYYY-mm-dd",
                                   "Las horas deben tener formato HH:mm:ss",
                                   "La fecha de primera cita debe ser menor a la fecha de la segunda cita"]
               };
               // alert("Complete los campos correctamente antes de guardar la información! Las fechas llevan formato YYYY-mm-dd y las horas HH:mm:ss");
            }
        };

        var FECHA_REGEXP = /^[0-9]{4}[-][0-9]{2}[-][0-9]{2}/;
        var HORA_REGEXP = /[0-9]{2}[:][0-9]{2}[:][0-9]{2}/;

        $scope.formatoFecha = function(fecha) {
            var valfecha = false;

            if (FECHA_REGEXP.test(fecha) == false && fecha != null) {
                valfecha = true;
            }
            if (FECHA_REGEXP.test(fecha) == false && fecha == null) {
                valfecha = false;
            }
            if (FECHA_REGEXP.test(fecha) == true) {
                valfecha = false;
            }
            return valfecha;
        };

        $scope.formatoHora = function(hora) {
            var valhora = false;

            if (HORA_REGEXP.test(hora) == false && hora != null) {
                valhora = true;
            }
            if (HORA_REGEXP.test(hora) == false && hora == null) {
                valhora = false;
            }
            if (HORA_REGEXP.test(hora) == true) {
                valhora = false;
            }
            return valhora;
        };

        $scope.validarFormulario = function() {
            var validacion = true;
            if ($scope.planDescripcion.clasesxsemana == '2') {
                if (!FECHA_REGEXP.test($scope.fecha_c1) || !FECHA_REGEXP.test($scope.fecha_c2) || !HORA_REGEXP.test($scope.hora_c1) || !HORA_REGEXP.test($scope.hora_c2)) {
                    validacion = false;
                    return validacion;
                }
                if(!$scope.validarFechaMenorActual($scope.fecha_c1)){
                    validacion = false;
                    return validacion;
                }
                if(!$scope.validarFechaMenorActual($scope.fecha_c2)){
                    validacion = false;
                    return validacion;
                }
                if(!$scope.validarFecha1menorFecha2($scope.fecha_c1,$scope.fecha_c2)){
                     validacion = false;
                     return validacion;
                }
            } else if ($scope.planDescripcion.clasesxsemana == '1') {
                if (!FECHA_REGEXP.test($scope.fecha) || !HORA_REGEXP.test($scope.hora)) {
                    validacion = false;
                    return validacion;
                }
                if(!$scope.validarFechaMenorActual($scope.fecha)){
                    validacion = false;
                    return validacion;
                }
            }

            return validacion;
        };

          $scope.validarFecha1menorFecha2 = function (fecha1, fecha2){
               if (fecha1 < fecha2)
                    return true;
               else
                    return false;
          }

          $scope.validarFechaMenorActual = function (date){
               var x=new Date();
               var y = x.getFullYear();
               var m = x.getMonth()+1;
               var d = x.getDate();
               var xdate = y+"-"+(m < 10 ? "0"+m : m)+"-"+(d < 10 ? "0"+d : d);
               if (xdate <= date)
                    return true;
               else
                    return false;
          }

        $scope.reloadAgenda = function() {
            var request = {
                method: 'GET',
                url: host + 'obt_citas',
                headers: {
                    'Content-Type': 'application/json'
                }
            };
            $http(request).then(function(response) {
                $scope.citas = response.data;
                //console.log(response.status);
                var cit = $scope.citas;
                $scope.eventos = [];
                var date = new Date();
                if (cit != "null") {
                    for (i = 0; i < cit.length; i++) {
                        date.setFullYear(cit[i].fecha.split('-')[0]);
                        date.setMonth(cit[i].fecha.split('-')[1]),
                            date.setDate(cit[i].fecha.split('-')[2]);
                        var backgroundColor = "";
                        var borderColor = "";
                        if (cit[i].nombre_plan.indexOf("CLASE CORTESIA") > -1) {
                            backgroundColor = "#3c8dbc"; //azul
                            borderColor = "#3c8dbc"; //azul
                        } else {
                            backgroundColor = "#00a65a"; //green
                            borderColor = "#00a65a"; //green
                        }
                        $scope.eventos.push({
                            title: cit[i].nombre_cliente,
                            start: cit[i].fecha + "T" + cit[i].hora,
                            url: host + 'cita/' + cit[i].id,
                            backgroundColor: backgroundColor, //red
                            borderColor: borderColor //red
                        });
                    }
                }
                //console.log($scope.eventos);
                calendar($scope.eventos);
            }, function(response) {
                alert("Hubo un problema al traer los datos del servidor, recargue la página si persiste contacte con el administrador del sistema.");
                $scope.mensaje = {
                    msg: "No se envió información, comuniquese con el proveedor",
                    tipo: "alert-warning"
                }
                //$scope.data = response.data || "Request failed";
                //$scope.status = response.status;
            });
        };

    }]);
</script>

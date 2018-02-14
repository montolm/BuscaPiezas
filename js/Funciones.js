var url = 'http://localhost/RegisterParts/index.php/';
var url_controller = 'http://localhost/buscapiezas/index.php/'; //'http://www.devetechnologies.com/RegisterParts/index.php/';
var folder = 'helpers/'; //Webservises
var controller = 'Api_ws/'; //Webservises
var controller_1 = 'api/';
var format = 'format/'; //Webservises
var format_type = 'json'; //Webservises
//var is_succes = false;
/*Script para asignar los valores de ciudad y pais en el formulario de registro usuario*/
$(document).ready(function () {
    $("#btnCreateAccount").click(function (e) {
        var country = $('#idSelectCountry option:selected').text();
        var city = $('#idSelectCity option:selected').text();
        $("#idNameCountry").val(country);
        $("#idNameCity").val(city);
    });
});
/*Se llenan los select box list dependiendo de lo seleccionado*/
$(document).ready(function () {
    getSystemPart();
    getMakes();
    $("#idSelectMake").change(function () {
        getVehicleMotorTypes($("#idSelectMake").val());
    });
    $("#idSelectVehiMotor").change(function () {
        getModelFormake($("#idSelectMake").val(), $('#idSelectVehiMotor').val());
    });
    $("#idSelectModel").change(function () {
        getGenerationForModel($("#idSelectModel").val());
        getModelGas($("#idSelectModel").val());
    });
    $("#idSelectGeneration").change(function () {
        getVehicleType($("#idSelectVehiMotor").val(), $("#idSelectMake").val(), $("#idSelectModel").val(), $('#idSelectGeneration').val());
    });
    $("#idButtonPart").click(function () {
        $(".removeTrParts").remove();
        getParts($('#idSelectCategory').val(), $('#idSelectType').val());
        /*Muestra la lista de piezas por categoria y tipo de vehiculo*/
        document.getElementById('idContainerlist').style.display = 'block';
        //$('#idButtonPart').attr("disabled", true);
    });
    $("#idButtonPartForUserReplacement").click(function (e) {
         $(".removeTrReplacement").remove();
        getPartsForUserReplacement($('#idInputUser').val(),
                $('#idSelectCategory').val(),
                $("#idSelectMake").val(),
                $("#idSelectVehiMotor").val(),
                $("#idSelectModel").val());
        /*Muestra la lista de piezas por usuarios*/
        document.getElementById('idContainerlist').style.display = 'block';
      //  $('#idButtonPartForUserReplacement').attr("disabled", true);
    });
});
/*Carga los sistemas a colocarle sus piezas*/
function getSystemPart() {
    var selectCategory = $('#idSelectCategory');
    //alert(url + folder + controller + 'system/' + format + format_type);
    $.ajax({
        url: url + folder + controller + 'system/' + format + format_type,
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function (data) {
            selectCategory.find('option').remove();
            selectCategory.append('<option value="0" selected>Todos los sistemas</option>');
            $(data.systems).each(function (i, v) {
                //console.log(v.name_category);
                selectCategory.append('<option value="' + v.id_category + '">' + v.name_category + '</option>');
            });
            selectCategory.prop('disabled', false);
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log('ERROR DESCONOCIDO ' + jqXHR);
        }
    });
}

/*Carga los vehiculos de motor dependiendo de la marca enviada mediante WS*/
function getVehicleMotorTypes(idMake) {
    var vehicleMotorType = $('#idSelectVehiMotor');
    $.ajax({
        url: url + folder + controller + 'vehiclemotortype/' + idMake + '/' + format + format_type,
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function (data) {
            vehicleMotorType.find('option').remove();
            vehicleMotorType.append('<option value="0" selected>Todos los vehiculos de motor</option>');
            $(data.typeMotors).each(function (i, v) {
                //console.log(v.type_name_vehicle);
                vehicleMotorType.append('<option value="' + v.id_type_vehicle_motor + '">' + v.type_name_vehicle + '</option>');
            });
            vehicleMotorType.prop('disabled', false);
        }, error: function () {
            alert('ERROR');
        }
    });
}

/*Carga las marcas enviadas mediante el webservices de registro piezas*/
function getMakes() {
    var makes = $('#idSelectMake');
    $.ajax({
        url: url + folder + controller + 'makes/' + format + format_type,
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function (data) {
            makes.find('option').remove();
            makes.append('<option value="0" selected>Todas las marcas</option>');
            $(data.makes).each(function (i, v) {
                //console.log(v.name_vehicle_make);
                makes.append('<option value="' + v.id_vehicle_make + '">' + v.name_vehicle_make + '</option>');
            });
            makes.prop('disabled', false);
        }, error: function () {

        }
    });
}


/*Carga los modelos por marca seleccionada mediante el webservises registro piezas*/
function getModelFormake(idMake, idSelectVehiMotor) {
    var model = $('#idSelectModel');
    $.ajax({
        url: url + folder + controller + 'modelformake/' + idMake + '/' + idSelectVehiMotor + '/' + format + format_type,
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function (data) {
            model.find('option').remove();
            model.append('<option value="0" selected>Todos los modelos</option>');
            $(data.models).each(function (i, v) {
                //console.log(v.model_name);
                model.append('<option value="' + v.id_model + '">' + v.model_name + '</option>');
            });
            model.prop('disabled', false);
        }, error: function () {
            alert('ERROR');
        }
    });
}


/*Carga los modelos por marca seleccionada mediante el webservises registro piezas*/
function getGenerationForModel(idModel) {
    var selectGeneration = $('#idSelectGeneration');
    $.ajax({
        url: url + folder + controller + 'generationformodel/' + idModel + '/' + format + format_type,
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function (data) {
            selectGeneration.find('option').remove();
            selectGeneration.append('<option value="0" selected>Todas las generaciones</option>');
            $(data.generations).each(function (i, v) {
                //console.log(v.generation);
                selectGeneration.append('<option value="' + v.id_generation + '">' + v.generation + '</option>');
            });
            selectGeneration.prop('disabled', false);
        }, error: function () {
            alert('ERROR');
        }
    });
}

/*Carga los tipos de vehiculos dependiendo de los parametros enviados al webservises*/
function getVehicleType(idVehicleMotor, idVehicleMake, idModel, idGeneration) {
    var selectType = $('#idSelectType');
    $.ajax({
        url: url + folder + controller + 'typesVehicles/' + idVehicleMotor + '/' + idVehicleMake + '/' + idModel + '/' + idGeneration + '/' + format + format_type,
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function (data) {
            selectType.find('option').remove();
            selectType.append('<option value="0" selected>Todos los tipos de vehiculos</option>');
            $(data.typesVehicles).each(function (i, v) {
                //console.log(v.name_vehicle_type);
                selectType.append('<option value="' + v.id_vehicle_type + '">' + v.name_vehicle_type + '</option>');
            });
            selectType.prop('disabled', false);
        }, error: function () {
            alert('ERROR');
        }
    });
}

/*Carga los combustibles existentes por modelo definido*/
function getModelGas(idModel) {
    var selectGas = $('#idSelectGas');
    $.ajax({
        url: url + folder + controller + 'gasformodel/' + idModel + '/' + format + format_type,
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function (data) {
            selectGas.find('option').remove();
            selectGas.append('<option value="0" selected>Todos los combustibles</option>');
            $(data.gasForModel).each(function (i, v) {
                // console.log(v.type_combustible);
                selectGas.append('<option value="' + v.id_combustible + '">' + v.type_combustible + '</option>');
            });
            selectGas.prop('disabled', false);
        }, error: function () {
            alert('ERROR');
        }
    });
}
/*Retorna todas las piezas por tipo de vehiculo*/
function getParts(idCategory, idVehicleType) {
    var listParts = $('#idBodyTable');
    $.ajax({
        url: url + folder + controller + 'partsForVehicleType/' + idCategory + '/' + idVehicleType + '/' + format + format_type,
        type: 'GET',
        dataType: 'Json',
        cache: false,
        success: function (data, textStatus, jqXHR) {
            $(data.parts).each(function (i, v) {
                listParts.append('<tr class="removeTrParts"><td><input type="checkbox" class="checkthis" name="checkVal" value ="' + v.id_part + '"/></td> \n\
                        <td>' + v.name_part + '</td><td>' + v.name_category + '</td><td>' + v.name_vehicle_type + '</td>\n\
                        <td><input type="text" class="form-control input-lg" id="idPrice" name="' + v.id_part + '" value=""/></td>\n\
                        <td><input type="text" class="form-control input-lg" id="idComent" name="' + v.id_part + '_comment" value=""/></td>\n\
                        </tr>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('ERROR');
        }
    });
}

/*Retorna todas las piezas por repuesto*/
function getPartsForUserReplacement(idUser, idCategory, idmake, idVehicleTypeMotor, idModel) {
    var listParts = $('#idBodyTable');
    $.ajax({
        url: url + folder + controller + 'partForUserReplacement/' + idUser + '/' + idCategory + '/' + idmake + '/' + idVehicleTypeMotor + '/' + idModel + '/' + format + format_type,
        type: 'GET',
        dataType: 'Json',
        cache: false,
        success: function (data, textStatus, jqXHR) {
            // console.log(data.partsUserReplacement);
            $(data.partsUserReplacement).each(function (i, v) {
                listParts.append('<tr class = "removeTrReplacement"><td><input type="checkbox" class="checkthis" name="checkVal" value ="' + v.id_replacement + '"/></td>\n\
                        <td>' + v.name_category + '</td><td>' + v.name_vehicle_make + '</td><td>' + v.model_name + '</td>\n\
                        <td>' + v.generation + '</td><td>' + v.name_category + '</td><td>' + v.name_part + '</td><td>' + v.state_name + '</td>\n\
                        <td>' + v.type_combustible + '</td><td>' + v.company_name + '</td>\n\
                        <td><input type="text" class="form-control input-lg" id="idPrice" name="' + v.id_replacement + '_price" value="' + v.price + '"/></td>\n\
                        <td><input type="text" class="form-control input-lg" id="idComent" name="' + v.id_replacement + '_comment" value="' + v.comment + '"/></td>\n\
                        </tr>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('ERROR');
        }
    });
}
/*Actualiza las piezas por repuesto*/
$(document).ready(function () {
    $("#idButtonUpdateParts").click(function (e) {
        $('#idButtonUpdateParts').attr("disabled", true);
        var idCamp = null;
        var urlController = url_controller + 'search_parts_control/updatePart';
        var idForm = "#idSearchPartForm";
        $("input:checkbox:checked").each(function (i, v) {
            if (v.value !== 'on') {
                $('#idPartReplacement').val(v.value); //Asigna el id del replacement
                updateRepalcementParts(idCamp, urlController, idForm);
            }
        });
        $('#idClose').click(function (e) {
            location.reload();
        });
        $('#idClose_error').click(function (e) {
            location.reload();
        });
    });
});
/*inserta las piezas por categoria, tipo de vehiculo y repuesto*/
$(document).ready(function () {
    $("#idButtonSavePart").click(function (e) {
        var idCamp = null;
        var urlController = url_controller + 'create_parts_control/createPart';
        var idForm = "#idPartForm";
        $("input:checkbox:checked").each(function (i, v) {
            if (v.value !== 'on') {
                $('#idVehiclePart').val(v.value); //Asigna el id de cada pieza
                $("#idButtonSavePart").attr("disabled", true);
                insertRegyster(idCamp, urlController, idForm);
            }
        });
        $('#idClose').click(function (e) {
            location.reload();
        });
        $('#idClose_error').click(function (e) {
            location.reload();
        });
    });
});
/*Inserta registros en la DB de manera dinamica*/
function insertRegyster(idCamp, url, idForm) {
    if ($(idCamp).val() !== "") {
        $.ajax({
            url: url,
            type: 'POST',
            data: $(idForm).serialize(),
            success: function (respuesta) {
                alert(respuesta);
                document.getElementById('idMesage_succes').style.display = 'block';
            },
            complete: function (jqXHR, textStatus) {

            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById('idMesage_error').style.display = 'block';
                console.log('ERROR DESCONOCIDO ' + jqXHR);
            }
        });
    }

}

/*Actualiza registro data table piezas por repuestos*/
function updateRepalcementParts(idCamp, url, idForm) {
    if ($(idCamp).val() !== "") {
        $.ajax({
            url: url,
            type: 'POST',
            data: $(idForm).serialize(),
            success: function (respuesta) {
                //alert(respuesta);
                document.getElementById('idMesage_succes').style.display = 'block';
            },
            complete: function (jqXHR, textStatus) {

            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById('idMesage_error').style.display = 'block';
                console.log('ERROR DESCONOCIDO ' + jqXHR);
            }
        });
    }

}

/*Manejo de sesion activa o inactiva*/
$(document).ready(function () {
    $.idleTimer(600000);
    $(document).bind("idle.idleTimer", function () {
        $.ajax({
            url: url_controller + folder + controller_1 + 'endSesionInactivity',
            type: 'POST',
            data: '',
            success: function (respuesta) {
                $('#idButtonPart').attr("disabled", true);
                document.getElementById('idMesage_sesion').style.display = 'block';
                $('#idCloseSesion').click(function (e) {
                    window.location.href = url_controller;
                });
            }
        });
        // function you want to fire when the user goes idle
    });
    $(document).bind("active.idleTimer", function () {
        //llama mediante ajax para borrar todos los datos de sesion y ir a la
        //pagina de login
        // function you want to fire when the user becomes active again
        // alert('Hola');
    });
});

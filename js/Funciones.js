var url = 'http://localhost/RegisterParts/index.php/'; 
var url_controller = 'http://localhost/buscapiezas/index.php/'; //'http://www.devetechnologies.com/RegisterParts/index.php/';
var folder = 'helpers/';
var controller = 'api_ws/';
var format = 'format/';
var format_type = 'json';

/*Script para asignar los valores de ciudad y pais en el formulario de registro usuario*/
$(document).ready(function () {
    $("#btnCreateAccount").click(function (e) {
        var country = $('#idSelectCountry option:selected').text();
        var city = $('#idSelectCity option:selected').text();
        $("#idNameCountry").val(country);
        $("#idNameCity").val(city);
    });
});

$(document).ready(function () {
    getVehicleMotorTypes();
    getMakes();
    getSystemPart();

    $("#idSelectMake").change(function () {
        getModelFormake($("#idSelectMake").val());
    });

    $("#idSelectModel").change(function () {
        getGenerationForModel($("#idSelectModel").val());
        getModelGas($("#idSelectModel").val());
    });
    $("#idSelectGeneration").change(function () {
        getVehicleType($("#idSelectVehiMotor").val(), $("#idSelectMake").val(), $("#idSelectModel").val(), $('#idSelectGeneration').val());
    });
    $("#idButtonPart").click(function () {
        getParts($('#idSelectCategory').val(), $('#idSelectType').val());
        //  alert($('#idSelectType').val());
        /*Muestra la lista de piezas por categoria y tipo de vehiculo*/
        document.getElementById('idContainerlist').style.display = 'block';
    });
});

/*Carga los sistemas a colocarle sus piezas*/
function getSystemPart() {
    var selectCategory = $('#idSelectCategory');
    $.ajax({
        url: 'http://localhost/registerparts/index.php/helpers/api_ws/system/format/json',
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
        }, error: function () {
            alert('ERROR');
        }
    });
}

/*Carga las marcas enviadas mediante el webservices de registro piezas*/
function getVehicleMotorTypes() {
    var vehicleMotorType = $('#idSelectVehiMotor');
    $.ajax({
        url: url + folder + controller + 'vehiclemotortype/' + format + format_type, //"http://localhost/registerparts/index.php/helpers/api_ws/vehiclemotortype/format/json",
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
        url: url + folder + controller + 'makes/' + format + format_type, //http://localhost/registerparts/index.php/helpers/api_ws/makes/format/json",
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
            alert('ERROR');
        }
    });
}


/*Carga los modelos por marca seleccionada mediante el webservises registro piezas*/
function getModelFormake(idMake) {
    var model = $('#idSelectModel');
    $.ajax({
        url: url + folder + controller + 'modelformake/' + idMake + '/' + format + format_type, //'http://localhost/registerparts/index.php/helpers/api_ws/modelformake/' + idMake + '/format/json',
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
        url: url + folder + controller + 'generationformodel/' + idModel + '/' + format + format_type, //'http://localhost/registerparts/index.php/helpers/api_ws/generationformodel/' + idModel + '/format/json',
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
        url: url + folder + controller + 'typesVehicles/' + idVehicleMotor + '/' + idVehicleMake + '/' + idModel + '/' + idGeneration + '/' + format + format_type, //'http://localhost/registerparts/index.php/helpers/api_ws/typesVehicles/' + idVehicleMotor + '/' + idVehicleMake + '/' + idModel + '/' + idGeneration + '/format/json',
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
        url: url + folder + controller + 'gasformodel/' + idModel + '/' + format + format_type, //'http://localhost/registerparts/index.php/helpers/api_ws/gasformodel/' + idModel + '/format/json',
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function (data) {
            selectGas.find('option').remove();
            selectGas.append('<option value="0" selected>Todos los combustibles</option>');
            $(data.gasForModel).each(function (i, v) {
                // console.log(v.type_combustible);
                selectGas.append('<option value="' + v.id_combustible_model + '">' + v.type_combustible + '</option>');
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
        url: url + folder + controller + 'partsForVehicleType/' + idCategory + '/' + idVehicleType + '/' + format + format_type, // 'http://localhost/registerparts/index.php/helpers/api_ws/partsForVehicleType/' + idCategory + '/' + idVehicleType + '/format/json',
        type: 'GET',
        dataType: 'Json',
        cache: false,
        success: function (data, textStatus, jqXHR) {
            $(data.parts).each(function (i, v) {
                listParts.append('<tr><td><input type="checkbox" class="checkthis"/></td> <td>' + v.name_part + '</td><td>' + v.name_category + '</td><td>' + v.name_vehicle_type + '</td></tr>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('ERROR');
        }
    });

}
/*inserta las piezas por tipo de vehiculo y repuesto*/
$(document).ready(function () {
    $("#idButtonSavePart").click(function (e) {
        var idCamp = null;
        var urlController = url_controller + 'create_parts_control/createPart';
        var idForm = "#idPartForm";
        insertRegyster(idCamp, urlController, idForm);
    });
});
/*Inserta registros en la DB de manera dinamica*/
function insertRegyster(idCamp, url, idForm) {
    alert();
    if ($(idCamp).val() !== "") {
        alert(1);
        $.ajax({
            url: url,
            type: 'POST',
            data: $(idForm).serialize(),
            success: function (respuesta) {
                alert('ENTROOO_1 ' + respuesta);
            },
            complete: function (jqXHR, textStatus) {

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $(idCamp).val();
                $("#idmensaje").overhang({
                    type: "error",
                    upper: false,
                    speed: 1000,
                    message: "ERROR FATAL"
                });
                console.log('ERROR DESCONOCIDO ' + jqXHR);
            }
        });
    }

}


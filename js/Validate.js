/*Valida formulario user*/
$(document).ready(function () {
    $('#formUser').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstname: {
                validators: {
                    notEmpty: {
                        message: 'requerido'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'requerido'
                    }
                }
            },
            directionstreet: {
                validators: {
                    notEmpty: {
                        message: 'requerido'
                    }
                }
            },
            directionNumber: {
                validators: {
                    notEmpty: {
                        message: 'requerido'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'requerido'
                    },
                    emailAddress: {
                        message: 'El formato es incorrecto'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'requerido'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'requerido'
                    },
                    identical: {
                        field: 'password',
                        message: 'Contraseña y confirmación no son iguales'
                    }
                }
            }

        }
    });
});

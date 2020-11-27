"use strict";
$(function () {

    $('#sendForm').on('click', function (e) {
        e.preventDefault();
        controlForm();
    });

    $('#lastname').focus(function () {
        $('#lastname').removeClass("border-danger");
    });
    $('#firstname').focus(function () {
        $('#firstname').removeClass("border-danger");
    });
    $('#birthdate').focus(function () {
        $('#birthdate').removeClass("border-danger");
    });
    $('#phone').focus(function () {
        $('#phone').removeClass("border-danger");
    });
    $('#mail').focus(function () {
        $('#mail').removeClass("border-danger");
    });


});

function controlForm() {
    if ($('#lastname').val().controleFirstname() !== true) {
        $('#lastname').addClass("border-danger");
        return;
    }
    if ($('#firstname').val().controleFirstname() !== true) {
        $('#firstname').addClass("border-danger");
        return;
    }
    if ($('#birthdate').val().controleBirthdate() !== true) {
        $('#birthdate').addClass("border-danger");
        return;
    }
    if ($('#phone').val().controlePhone() !== true) {
        $('#phone').addClass("border-danger");
        return;
    }
    if ($('#mail').val().controleMail() !== true) {
        $('#mail').addClass("border-danger");
        return;
    }

    sendForm();
}


function sendForm() {
    $('#patientForm').submit()
}
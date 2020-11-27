"use strict";
$(function () {

    $('#sendForm').on('click', function (e) {
        e.preventDefault();
        controlForm();
    });
    $('#dateTime').focus(function () {
        $('#dateTime').removeClass("border-danger")
    })


});

function controlForm() {
    if ($('#dateTime').val().controleDateTime() !== true) {
        $('#dateTime').addClass("border-danger");
        return;
    }

    sendForm();
}


function sendForm() {
    $('#appointmentForm').submit()
}
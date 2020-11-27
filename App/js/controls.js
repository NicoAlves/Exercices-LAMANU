String.prototype.controleFirstname = function () {

    if (!this && this.length <= 0) {
        return false;
    }

    if (!/^[a-zA-Z]+$/.test(this)) {
        return false;
    }
    return true;
}

String.prototype.controleLastname = function () {

    if (!this && this.length <= 0) {
        return false;
    }

    if (!/^[a-zA-Z]+$/.test(this)) {
        return false;
    }
    return true;
}

String.prototype.controleBirthdate = function () {

    let dateofday = new Date();
    dateofday = `${dateofday.getDate()}-${dateofday.getMonth() + 1}-${dateofday.getFullYear()}`
    let birthdate = this;
    birthdate = birthdate.split('-');
    birthdate = birthdate.reverse();

    birthdate = birthdate.join('-');

    if (!birthdate && birthdate.length <= 0) {
        return false;
    }

    if (!/^(\d{1,2})[-.\/](\d{1,2})[-.\/](\d{4})$/.test(birthdate)) {
        return false;
    }


    if (birthdate == dateofday) {
        return false;
    }
    birthdate = birthdate.split('-');
    dateofday = dateofday.split('-');
    // si l'année est supérieur à l'année en cours
    if (birthdate[2] > dateofday[2]) {
        return false;
    }
    // si l'année est égale à l'année en cours et si le mois et supérieure ou égale au mois courrant
    if (birthdate[2] == dateofday[2] && birthdate[1] > dateofday[1]) {

        return false;
    }
    // si le mois et le jour sont est supérieur au jour en cours
    if (birthdate[2] >= dateofday[2] && birthdate[1] >= dateofday[1] && birthdate[0] > dateofday[0]) {
        return false;
    }

    return true;

}

String.prototype.controlePhone = function () {

    if (!this && this.length <= 0) {
        return false;
    }

    if (!/^(0)[1-9](\d{2}){4}$/.test(this)) {
        return false;
    }
    return true;
}

String.prototype.controleMail = function () {

    if (!this && this.length <= 0) {
        return false;
    }

    if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(this)) {
        return false;
    }
    return true;
}

String.prototype.controleDateTime = function () {

    let dateofday = new Date();
    dateofday = `${dateofday.getDate()}-${dateofday.getMonth() + 1}-${dateofday.getFullYear()}`
    let date = this;

    date = date.split('T');
    date = date[0];
    date = date.split('-');
    date = date.reverse();
    date = date.join('-');

    if (!date && date.length <= 0) {
        return false;
    }

    if (!/^(\d{1,2})[-.\/](\d{1,2})[-.\/](\d{4})$/.test(date)) {
        return false;
    }



    date = date.split('-');
    dateofday = dateofday.split('-');
    // si l'année est infèrieur à l'année en cours
    if (date[2] < dateofday[2]) {
        return false;
    }
    // si l'année est infèrieur ou égale à l'année en cours et si le mois et infèrieur ou égale au mois courrant
    if (date[2] <= dateofday[2] && date[1] < dateofday[1]) {

        return false;
    }
    // si le mois et le jour sont infèrieur au jour en cours
    if (date[2] <= dateofday[2] && date[1] <= dateofday[1] && date[0] < dateofday[0]) {
        return false;
    }

    return true;

}
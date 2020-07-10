require('./bootstrap');
// import * from 'bootstrap-select';
// console.log(selectpicker)

$(function () {
    require('bootstrap-select/js/bootstrap-select');
    $('[data-toggle="popover"]').popover()
    $('.popover-dismiss').popover({
        trigger: 'focus'
    })

    // Change user password safety
    $("#checkpassword").on('change', function() {
        if (this.checked) {
            $("#changepassword").attr("disabled", false)
        } else {
            $("#changepassword").attr("disabled", true)
        }
    })

    // Bootstrap select
    $('select').selectpicker();
})
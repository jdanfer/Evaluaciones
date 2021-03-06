$("#select-modelSinefecto").on("focusin", function (e) {
    console.log(e);
    var brand_id = e.target.value;
    $.get("/ajax-modelos?brand_id=" + brand_id, function (data) {
        $("#car_model_id").empty();
        $.each(data, function (sales, modeloObj) {
            $("#car_model_id").append(
                '<option value="' +
                    modeloObj.id +
                    '">' +
                    modeloObj.name +
                    "</option>"
            );
        });
    });
});

function validarEmail(email) {
    var re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

$("#email").on("keypress", function () {
    var elEmail = $("#email").val();
    var esValido = validarEmail(elEmail);
    if (esValido == true) {
        $("#email").addClass("colorVerde");
        $("#email").removeClass("colorRojo");
    } else {
        $("#email").addClass("colorRojo");
        $("#email").removeClass("colorVerde");
        $("#btn_enviar").attr("disable");
    }
});

function showTime() {
    myDate = new Date();
    hours = myDate.getHours();
    minutes = myDate.getMinutes();
    seconds = myDate.getSeconds();
    if (hours < 10) hours = 0 + hours;
    if (minutes < 10) minutes = "0" + minutes;
    if (seconds < 10) seconds = "0" + seconds;
    $("#FechaActual").text(hours + ":" + minutes + ":" + seconds);
    setTimeout("showTime()", 1000);
}

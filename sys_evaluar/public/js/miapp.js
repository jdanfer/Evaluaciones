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

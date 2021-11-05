require("./bootstrap");

$(document).ready(function () {
    // Find the html elements
    var $make = $("#make"),
        $model = $("#model"),
        $options = $model.find("option");

    $make
        .on("change", function () {
            // I'm filtering model using the data-make attribute
            $model.html($options.filter('[data-make="' + this.value + '"]'));
            $model.trigger("change");
        })
        .trigger("change");
});

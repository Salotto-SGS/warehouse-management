(() => {
    $('#damagedOrderChoice #money').click(() => {
        $('#damagedOrderChoice #money').css("background-color", "#3F3D56");
        $('#damagedOrderChoice #money').css("color", "#FFFFFF");
        $('#damagedOrderChoice #product').css("background-color", "#FFFFFF");
        $('#damagedOrderChoice #product').css("color", "#8B8B8B");
        $("#product-check").css("display", "none");
        $("#money-check").css("display", "inline");
        $("#submit-damagedOrderChoice").css("display", "inline");
    });
    $('#damagedOrderChoice #product').click(() => {
        $('#damagedOrderChoice #product').css("background-color", "#3F3D56");
        $('#damagedOrderChoice #product').css("color", "#FFFFFF");
        $('#damagedOrderChoice #money').css("background-color", "#FFFFFF");
        $('#damagedOrderChoice #money').css("color", "#8B8B8B");
        $("#money-check").css("display", "none");
        $("#product-check").css("display", "inline");
        $("#submit-damagedOrderChoice").css("display", "inline");
    });

})();
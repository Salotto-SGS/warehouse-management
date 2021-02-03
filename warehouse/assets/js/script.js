(() => {
    $('#damagedOrderChoice #money').click(() => {
        $('#damagedOrderChoice #money').css("background-color", "#3F3D56");
        $('#damagedOrderChoice #money').css("color", "#FFFFFF");
        $('#damagedOrderChoice #product').css("background-color", "#FFFFFF");
        $('#damagedOrderChoice #product').css("color", "#8B8B8B");
        $("#product-check").css("display", "none");
        $("#money-check").css("display", "inline");
        $("#submit-damagedOrderChoice").css("display", "inline");
        $('#damagedOrderChoice #money').attr("selected", "selected");
        $('#damagedOrderChoice #product').removeAttr("selected");
    });
    $('#damagedOrderChoice #product').click(() => {
        $('#damagedOrderChoice #product').css("background-color", "#3F3D56");
        $('#damagedOrderChoice #product').css("color", "#FFFFFF");
        $('#damagedOrderChoice #money').css("background-color", "#FFFFFF");
        $('#damagedOrderChoice #money').css("color", "#8B8B8B");
        $("#money-check").css("display", "none");
        $("#product-check").css("display", "inline");
        $("#submit-damagedOrderChoice").css("display", "inline");
        $('#damagedOrderChoice #money').removeAttr("selected");
        $('#damagedOrderChoice #product').attr("selected", "selected");
    });

    $('#wrongOrderChoice #money').click(() => {
        $('#wrongOrderChoice #money').css("background-color", "#3F3D56");
        $('#wrongOrderChoice #money').css("color", "#FFFFFF");
        $('#wrongOrderChoice #product').css("background-color", "#FFFFFF");
        $('#wrongOrderChoice #product').css("color", "#8B8B8B");
        $("#product-check").css("display", "none");
        $("#money-check").css("display", "inline");
        $("#submit-wrongOrderChoice").css("display", "inline");
        $('#wrongOrderChoice #money').attr("selected", "selected");
        $('#wrongOrderChoice #product').removeAttr("selected");
    });
    $('#wrongOrderChoice #product').click(() => {
        $('#wrongOrderChoice #product').css("background-color", "#3F3D56");
        $('#wrongOrderChoice #product').css("color", "#FFFFFF");
        $('#wrongOrderChoice #money').css("background-color", "#FFFFFF");
        $('#wrongOrderChoice #money').css("color", "#8B8B8B");
        $("#money-check").css("display", "none");
        $("#product-check").css("display", "inline");
        $("#submit-wrongOrderChoice").css("display", "inline");
        $('#wrongOrderChoice #money').removeAttr("selected");
        $('#wrongOrderChoice #product').attr("selected", "selected");
    });


    const urlParams = new URLSearchParams(window.location.search);
    const code = urlParams.get('code');
    const type = urlParams.get('type');
    $('#missingDeliveryForm').click(() => {
        window.location.href = '/warehouse/complaintChoice.php?code=' + code + '&type=missing_product';
    });
    $('#damagedArticleForm').click(() => {
        window.location.href = '/warehouse/complaintChoice.php?code=' + code + '&type=damaged_product'
    });
    $('#wrongArticleForm').click(() => {
        window.location.href = '/warehouse/complaintChoice.php?code=' + code + '&type=wrong_product'
    });


    $("#submit-wrongOrderChoice").click(() => {
        if ($("#wrongOrderChoice #money").attr('selected') == 'selected') {
            window.location.href = '/warehouse/confirmedReturn.php?code=' + code + '&type=change_version&goon=false'
        } else {
            window.location.href = '/warehouse/confirmedReturn.php?code=' + code + '&type=refund&goon=false'
        }
    });

    $("#submit-damagedOrderChoice").click(() => {
        if ($("#damagedOrderChoice #money").attr('selected') == 'selected') {
            window.location.href = '/warehouse/confirmedReturn.php?code=' + code + '&type=money&goon=false'
        } else {
            window.location.href = '/warehouse/confirmedReturn.php?code=' + code + '&type=product&goon=false'
        }
    });


    $('#confirmed-return').click(() => {
        window.location.href = '/warehouse/confirmedReturn.php?code=' + code + '&type=' + type + '&goon=true';
    });

})();
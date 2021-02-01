(() => {
    $('#complaintChoice #missing-card').hover(() => {
        $('#complaintChoice #missing-img').css("filter", "invert(99%) sepia(0%) saturate(87%) hue-rotate(189deg) brightness(120%) contrast(100%)");
    });
    $('#complaintChoice #damaged-card').hover(() => {
        $('#complaintChoice #damaged-img').css("filter", "invert(99%) sepia(0%) saturate(87%) hue-rotate(189deg) brightness(120%) contrast(100%)");
    });
    $('#complaintChoice #wrong-card').hover(() => {
        $('#complaintChoice #wrong-img').css("filter", "invert(99%) sepia(0%) saturate(87%) hue-rotate(189deg) brightness(120%) contrast(100%)");
    });
    $('#complaintChoice #missing-card').mouseout(() => {
        $('#complaintChoice #missing-img').css("filter", "none");
    });
    $('#complaintChoice #damaged-card').mouseout(() => {
        $('#complaintChoice #damaged-img').css("filter", "none");
    });
    $('#complaintChoice #wrong-card').mouseout(() => {
        $('#complaintChoice #wrong-img').css("filter", "none");
    });
})();
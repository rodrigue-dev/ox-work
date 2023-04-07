function getItem(id){
    $('#periode_id').text(id);
}
$(function () {

$('#delete_btn').click(function () {
    $.ajax({
        url: configs.routes.ajaxdeleteperiode,
        type: "GET",
        dataType: "JSON",
        data: {
          'item':$('#periode_id').text()
        },
        success: function (data) {
            window.location.reload(true);
        },
        error: function (err) {
            alert("An error ocurred while loading data ...");
        }
    });
})
    $('#delete_btn_conge').click(function () {
        $.ajax({
            url: configs.routes.ajaxdeleteconge,
            type: "GET",
            dataType: "JSON",
            data: {
                'item':$('#periode_id').text()
            },
            success: function (data) {
                window.location.reload(true);
            },
            error: function (err) {
                alert("An error ocurred while loading data ...");
            }
        });
    })
})


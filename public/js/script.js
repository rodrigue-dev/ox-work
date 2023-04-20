function getItem(id){
    $('#periode_id').text(id);
}
function getReportDay(id){
    $('#reportday_id').text(id);
    console.log(id)
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
    $('#confirm_btn_calandar').click(function () {
        $.ajax({
            url: configs.routes.reportcalandar,
            type: "GET",
            dataType: "JSON",
            data: {
                'item':$('#reportday_id').text()
            },
            success: function (data) {
                window.location.reload(true);
            },
            error: function (err) {
                console.log(err)
                alert("An error ocurred while loading data ...");
            }
        });
    })
    $('#selectAll').click(function(e){
        var table= $(e.target).closest('table');
        $('td input:checkbox',table).prop('checked',this.checked);
    });
    $('#send_mail').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        jsonObj = [];
        $("#table_user>tbody input[type=checkbox]:checked").each(function () {
            var row = $(this).closest('tr')[0];
            var id = row.cells[1].innerText;
            item = {};
            item['id'] = id;
            jsonObj.push(item)
        });
        console.log(JSON.stringify({data: jsonObj}))
        $.ajax({
            url: configs.routes.sendmail,
            type: "POST",
            dataType: "JSON",
            data: JSON.stringify({
                ob: jsonObj,subject:$('#subject').val(),message:$('#message_mail').text()
            }),
            success: function (data) {
                window.location.reload(true);
            },
            error: function (err) {
                console.log(err)
                alert("An error ocurred while loading data ..."+err.responseJSON.message);
            }
        });
    })
})


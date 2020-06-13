$(document).ready(function () {
    /* document ready start */
    $('body').on('change', '#trme_mrm_id', function () {
        var serviceId = $(this).val();
        var base_url = $("#baseUrl").val();
        var url = base_url + 'mapmaterialtoservice/getServiceCatDetails';
        //alert(serviceId);
        //alert(url);
        //exit;
        $.ajax({
            type: "POST",
            url: url,
            data: {serviceId: serviceId},
            dataType: "json"
        }).done(function (result) {
            //alert(JSON.stringify(result));
            if (result.ret === 1) {
                $("#desc_service").text(result.res.mss_desc);
            } else {
                alert('Something went wrong.Please try again.');
            }
        });

    });

    $('body').on('change', '#trme_tsbd_id', function () {
        var matId = $(this).val();
        var base_url = $("#baseUrl").val();
        var url = base_url + 'mapmaterialtoservice/getMaterialDetails';
        //alert(serviceId);
        //alert(url);        
        $.ajax({
            type: "POST",
            url: url,
            data: {matId: matId},
            dataType: "json"
        }).done(function (result) {
            //alert(JSON.stringify(result));
            if (result.ret === 1) {
                $("#desc_rawmat").text(result.res.mrm_desc);
            } else {
                alert('Something went wrong.Please try again.');
            }
        });

    });

    //add service to metirals
    $('body').on('click', '#addServiceToMat', function () {       
        var url = $("#addServiceToMatFrm").attr("action");
        var base_url = $("#baseUrl").val();
        var cont_name = 'materialtoservice';
        //
        var trme_mrm_id = $("#trme_mrm_id").val();
        var trme_tsbd_id = $("#trme_tsbd_id").val();
        var trme_ratio = $("#trme_ratio").val();
        var trme_item_qty = $("#trme_item_qty").val();
        var trme_msh_contract_id = $("#trme_msh_contract_id").val();        
        //alert(serviceId);
        //alert(url);
        //alert(trme_mrm_id + '--' + trme_tsbd_id + '--' + trme_ratio + '--' + trme_item_qty + '--' + trme_msh_contract_id);
        $.ajax({
            type: "POST",
            url: url,
            //data: form_data,
            data: {trme_mrm_id: trme_mrm_id, trme_tsbd_id: trme_tsbd_id, trme_ratio: trme_ratio, trme_item_qty, trme_msh_contract_id: trme_msh_contract_id},
            dataType: "json"
        }).done(function (result) {
            //alert(JSON.stringify(result));
            if (result.ret === 1) {
                loadListBody(base_url, cont_name);
                //alert(result.msg);
                $("#trme_mrm_id").val('--Select Service--');
                $("#trme_tsbd_id").val('--Select Material--');
                $("#trme_ratio").val('');
                $("#trme_item_qty").val('');
                $("#trme_msh_contract_id").val('');
                $("#desc_service").text('');
                $("#desc_rawmat").text('');
            } else {
                alert('Something went wrong.Please try again.');
            }
        });
    });

    /* document ready end */

});
$('.chkNumWDci').keypress(function (event) {
    return isNumberWithDecimal(event, this);
});


$('.chkNum').keypress(function (event) {
    return isNumber(event, this);
});

//THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE. added on 02-03-2017
function isNumberWithDecimal(evt, element) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if ((charCode !== 08) && (charCode != 46 || $(element).val().indexOf('.') != -1) && (charCode < 48 || charCode > 57) && (charCode !== 127))
        return false;

    return true;
}

function isNumber(evt, element) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if ((charCode !== 08) && (charCode < 48 || charCode > 57) && (charCode !== 127))
        return false;

    return true;
}

function loadListBody(url, cont_name) {   
    $.ajax({
        type: "GET",
        url: url + cont_name,
        data: {},
        dataType: "json"
    }).done(function (result) {
        if (result.retVal) {
            $("#loadlist").html(result.resText);
        } else {
            $("#loadlist").html("<tr><td>No record found!</td></tr>");
        }
    });
}


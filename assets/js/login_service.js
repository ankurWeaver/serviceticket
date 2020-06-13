$(document).ready(function () {
    /* document ready start */
    
    /*
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
    */
    //add service to metirals
    $('body').on('click', '#userSignUp', function () {       
        var url = $("#userSignUpFrm").attr("action");
        //alert('Hi');
        //
        var mu_company_code = $("#mu_company_code").val();
        var mu_type = $("#mu_type").val();
        var mu_username = $("#mu_username").val();
        var mu_password = $("#mu_password").val();
        var conf_password = $("#conf_password").val(); 
        var mu_name = $("#mu_name").val(); 
        
        var mu_email = $("#mu_email").val();
        var mu_mob = $("#mu_mob").val();
        var mu_gst = $("#mu_gst").val();       
        var mu_pan = $("#mu_pan").val();  
         var msg = 'Please enter following details :';
        var flag = false;
        
        if (mu_company_code === '') {
            msg += ' Employee code, ';
            flag = true;
        }

        if (mu_password === '') {
            msg += ' Password, ';
            flag = true;
        }
        if (conf_password === '') {
            msg += ' Confirm Password, ';
            flag = true;
        }
        if (mu_password !== conf_password) {
            msg += ' Mismatch Password, ';
            flag = true;
        }
        
        if (mu_name === '') {
            msg += ' Full Name, ';
            flag = true;
        }

        if (mu_email === '') {
            msg += ' Emails, ';
            flag = true;
        }
        if (mu_email !== '') {
            if (IsEmail(mu_email) === false) {
                msg += ' Invalid Emails, ';
                flag = true;
            }
        }

        if (mu_mob === '') {
            msg += ' Mobile ';
            flag = true;
        }
        if (flag) {
            $("#vaiduserreg").css("display", "block");
            $("#vaiduserreg").text(msg);
            return false;
        }
        //alert(url);
        
        
        //alert(serviceId);
        //alert(url);        
        $.ajax({
            type: "POST",
            url: url,
            //data: form_data,
            data: {mu_company_code: mu_company_code, mu_type: mu_type, mu_username: mu_username, mu_password: mu_password, mu_name: mu_name, mu_email: mu_email,mu_mob: mu_mob,mu_gst: mu_gst, mu_pan: mu_pan},
            dataType: "json"
        }).done(function (result) {
            //alert(JSON.stringify(result));
            $("#vaiduserreg").css("display", "none");
            $("#vaiduserreg").text('');
            if (result.ret === 1) {
                
                $("#mu_company_code").val('');
                $("#mu_username").val('');
                $("#mu_password").val('');
                $("#conf_password").val('');
                $("#mu_name").val('');
                $("#mu_email").val('');                
                $("#mu_mob").val('');
                $("#mu_gst").val('');
                $("#mu_pan").val('');
                
                $("#vaiduserreg").css("display", "block");
                $("#vaiduserreg").text(result.msg);
            } else {
                $("#mu_company_code").val('');
                $("#mu_username").val('');
                $("#mu_password").val('');
                $("#conf_password").val('');
                $("#mu_name").val('');
                $("#mu_email").val('');                
                $("#mu_mob").val('');
                $("#mu_gst").val('');
                $("#mu_pan").val('');
                
                $("#vaiduserreg").css("display", "block");
                $("#vaiduserreg").text(result.msg);
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

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}

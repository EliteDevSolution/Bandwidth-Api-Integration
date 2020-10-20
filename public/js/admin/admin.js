function del_user($id) {
    $.ajax({
        url: $("#baseurl").val() + 'user/delete',
        data: {'del_id': $id},
        type: 'POST',
        dataType: 'json',
        success: function (msg) {
            if (msg) {
                parent.location.href = $("#baseurl").val() + 'user';
                alert("Deleted Successfully!");
            } else {

            }
            $('#del_modal').modal('hide');
        }
    });
}
function user_form_validate() {
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    var country = $('#country').val();
    var city = $('#city').val();
    var street = $('#street').val();
    var exterior = $('#exterior').val();
    var interior = $('#interior').val();
    var colonia = $('#colonia').val();
    if ($.trim(firstname) == '') {
        alert('Please enter Product Firstname');
        $('#firstname').focus();
        return false;
    }
    if ($.trim(lastname) == '') {
        alert('Please enter User Lastname');
        $('#lastname').focus();
        return false;
    }
    if ($.trim(email) == '') {
        alert('Please enter User Email');
        $('#email').focus();
        return false;
    }
    if ($.trim(phone) == '') {
        alert('Please enter User Phone');
        $('#phone').focus();
        return false;
    }
    if ($.trim(password) == '') {
        alert('Please enter User password');
        $('#password').focus();
        return false;
    }
    if ($.trim(confirm_password) == '') {
        alert('Please enter Confirm password');
        $('#confirm_password').focus();
        return false;
    }
    if ($.trim(confirm_password) != $.trim(password)) {
        alert('Please check your password');
        $('#password').focus();
        return false;
    }
    if ($.trim(country) == '') {
        alert('Please enter Product Country');
        $('#country').focus();
        return false;
    }
    if ($.trim(city) == '') {
        alert('Please enter User City');
        $('#city').focus();
        return false;
    }
    if ($.trim(street) == '') {
        alert('Please enter User Street');
        $('#street').focus();
        return false;
    }
    if ($.trim(exterior) == '') {
        alert('Please enter User Exterior');
        $('#exterior').focus();
        return false;
    }
    if ($.trim(interior) == '') {
        alert('Please enter User Interior');
        $('#interior').focus();
        return false;
    }
    if ($.trim(colonia) == '') {
        alert('Please enter Confirm Colonia');
        $('#colonia').focus();
        return false;
    }
    return true;
}
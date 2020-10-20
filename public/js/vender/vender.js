function delete_vendor(id) {
    $.ajax({
        url: vendor_delete,
        data: {vid: id},
        type: 'POST',
        dataType:'json',
        success: function(data) {
            console.log(data);
            if (data.msg){
                $('#vendor_table').html(data.html);
                $('#tr_'+id).css('display', 'none');
                $('#success_text').text('Vendor deleted correctly.');
                $('#success_msg').css('display', 'block');
            }else {
                $('#warning_text').text("Vendor didn't delete.");
                $('#warning_msg').css('display', 'block');
                $('#vendor_table').html(data.html);
            }

            $('#del_modal').modal('hide');
        }
    });
}

function add_vendor_modal() {
    $('#modal_name').text('Add Vendor');
    $('#vendor_ctrl').attr('href', 'javascript:add_vendor()');
    $('#vendor_modal').modal();
}

function add_vendor() {
    if (vendor_form_validate() != true)
        return;
    var No = 0;
    $( "[id^='tr_']" ).each(function( index ) {
        No++;
    });
    var name = $('#name').val();
    var street = $('#street').val();
    var extstreetnumber = $('#extStreetNumber').val();
    var inStreetNumber = $('#inStreetNumber').val();
    var complementaryInfo = $('#complementary_info').val();
    var city = $('#city').val();
    var zipcode = $('#zipcode').val();
    var country = $('#country').val();
    var phonenumber = $('#phonenumber').val();
    var mail = $('#mail').val();
    var state = $('#state').val();
    $.ajax({
        url: vendor_add,
        data: {name: name, street:street , extStreetNumber: extstreetnumber, inStreetNumber: inStreetNumber, complementaryInfo: complementaryInfo, city: city,zipcode:zipcode,
            country:country, phonenumber: phonenumber, mail:mail, state:state,
        },
        type: 'POST',
        dataType: 'text',
        success: function(data) {
            console.log(data);
            if (data) {
                $('#vendor_table').html(data);
                $('#vendor_modal').modal('hide');
                $('#success_text').text('Success add vendor.');
                $('#success_msg').css('display', 'block');
                 name = $('#name').val('');
                 street = $('#street').val('');
                 extstreetnumber = $('#extStreetNumber').val('');
                 inStreetNumber = $('#inStreetNumber').val('');
                 complementaryInfo = $('#complementary_info').val('');
                 city = $('#city').val('');
                 zipcode = $('#zipcode').val('');
                 country = $('#country').val('');
                 phonenumber = $('#phonenumber').val('');
                 mail = $('#mail').val('');
                 state = $('#state').val('');
            }
            else{
                $('#vendor_modal').modal('hide');
                $('#warning_text').text("Failure add vendor!");
                $('#warning_msg').css('display', 'block');
                name = $('#name').val('');
                street = $('#street').val('');
                extstreetnumber = $('#extStreetNumber').val('');
                inStreetNumber = $('#inStreetNumber').val('');
                complementaryInfo = $('#complementary_info').val('');
                city = $('#city').val('');
                zipcode = $('#zipcode').val('');
                country = $('#country').val('');
                phonenumber = $('#phonenumber').val('');
                mail = $('#mail').val('');
                state = $('#state').val('');
            }
        }
    });
}

function edit_vendor_modal(id) {
    $('#name').val($('#tr_'+id+" td:eq(1)").text());
    $('#street').val($('#tr_'+id+" td:eq(2)").text());
    $('#extStreetNumber').val($('#tr_'+id+" td:eq(3)").text());
    $('#inStreetNumber').val($('#tr_'+id+" td:eq(4)").text());
    $('#complementary_info').val($('#tr_'+id+" td:eq(5)").text());
    $('#city').val($('#tr_'+id+" td:eq(6)").text());
    $('#zipcode').val($('#tr_'+id+" td:eq(7)").text());
    $('#country').val($('#tr_'+id+" td:eq(8)").text());
    $('#phonenumber').val($('#tr_'+id+" td:eq(9)").text());
    $('#mail').val($('#tr_'+id+" td:eq(10)").text());
    $('#state').val($('#tr_'+id+" td:eq(11)").text());
    $('#modal_name').text('Vendor Edit');
    $('#vendor_ctrl').attr('href', 'javascript:edit_vendor('+id+')');
    $('#vendor_modal').modal();
}

function edit_vendor(id) {
    if (vendor_form_validate() != true)
        return;
    var name = $('#name').val();
    var street = $('#street').val();
    var extStreetNumber = $('#extStreetNumber').val();
    var inStreetNumber = $('#inStreetNumber').val();
    var complementaryInfo = $('#complementary_info').val();
    var city = $('#city').val();
    var zipcode = $('#zipcode').val();
    var country = $('#country').val();
    var phonenumber = $('#phonenumber').val();
    var mail = $('#mail').val();
    var state = $('#state').val();

    $.ajax({
        url: vendor_edit,
        data: {vid:id,name: name, street:street , extStreetNumber: extStreetNumber, inStreetNumber: inStreetNumber, complementaryInfo: complementaryInfo, city: city,zipcode:zipcode,
            country:country, phonenumber: phonenumber, mail:mail, state:state,
        },
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (data) {
                $('#vendor_modal').modal('hide');
                $('#success_text').text('Vendor updated correctly.');
                $('#success_msg').css('display', 'block');
                $('#vendor_table').html(data);
                name = $('#name').val('');
                street = $('#street').val('');
                extStreetNumber = $('#extStreetNumber').val('');
                inStreetNumber = $('#inStreetNumber').val('');
                complementaryInfo = $('#complementary_info').val('');
                city = $('#city').val('');
                zipcode = $('#zipcode').val('');
                country = $('#country').val('');
                phonenumber = $('#phonenumber').val('');
                mail = $('#mail').val('');
                state = $('#state').val('');
                $('#vender_table').html(data);
            }
            else{
                $('#vender_table').html(data);
                $('#vendor_modal').modal('hide');
                $('#warning_text').text("Vendor didn't update.");
                $('#warning_msg').css('display', 'block');
                name = $('#name').val('');
                street = $('#street').val('');
                extStreetNumber = $('#extStreetNumber').val('');
                inStreetNumber = $('#inStreetNumber').val('');
                complementaryInfo = $('#complementary_info').val('');
                city = $('#city').val('');
                zipcode = $('#zipcode').val('');
                country = $('#country').val('');
                phonenumber = $('#phonenumber').val('');
                mail = $('#mail').val('');
                state = $('#state').val('');
            }
        }
    });
}

function search_vendor() {
    var key_word = $('#search_str').val();
    $.ajax({
        url: vendor_search,
        data: {srch_key: key_word},
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if (data) {
                $('#vendor_table').html(data);
            }
            else
                $('#vendor_table').html("");
        }
    });
}

function vendor_form_validate() {
    var name = $('#name').val();
    var street = $('#street').val();
    var extStreetNumber = $('#extStreetNumber').val();
    var inStreetNumber = $('#inStreetNumber').val();
    var complementaryInfo = $('#complementary_info').val();
    var city = $('#city').val();
    var zipcode = $('#zipcode').val();
    var country = $('#country').val();
    var phonenumber = $('#phonenumber').val();
    var mai = $('#mail').val();
    var state = $('#state').val();
    // alert(state);
    // return false;
    if ($.trim(name) == '') {
        alert('Please enter Product Name');
        $('#name').focus();
        return false;
    }
    if ($.trim(street) == '') {
        alert('Please enter Product Code');
        $('#street').focus();
        return false;
    }
    if ($.trim(extStreetNumber) == '') {
        alert('Please enter Product Category');
        $('#extStreetNumber').focus();
        return false;
    }
    if ($.trim(inStreetNumber) == '') {
        alert('Please enter Product buyPrice');
        $('#inStreetNumber').focus();
        return false;
    }
    if ($.trim(complementaryInfo) == '') {
        alert('Please enter Product sellPrice');
        $('#complementary_info').focus();
        return false;
    }

    if ($.trim(city) == '') {
        alert('Please enter Product sellPrice');
        $('#city').focus();
        return false;
    }
    if ($.trim(zipcode) == '') {
        alert('Please enter Product sellPrice');
        $('#zipcode').focus();
        return false;
    }
    if ($.trim(country) == '') {
        alert('Please enter Product sellPrice');
        $('#country').focus();
        return false;
    }
    if ($.trim(phonenumber) == '') {
        alert('Please enter Product sellPrice');
        $('#phonenumber').focus();
        return false;
    }if ($.trim(mail) == '') {
        alert('Please enter Product sellPrice');
        $('#mail').focus();
        return false;
    }
    return true;
}

$(document).ready(function() {
	$("#search_str").keydown(function (e) {
		if (e.keyCode == 13) {
			search_vendor();
		}
	});
	$("#search_btn").click(search_vendor);
	
});
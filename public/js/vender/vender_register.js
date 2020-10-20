$(document).ready( function () {
    $('#attach').click(function () {
        // var attach_url="";
        var name = $('#name').val();
        var street = $('#street').val();
        var extStreetNumber = $('#extStreetNumber').val();
        var inStreetNumber = $('#inStreetNumber').val();
        var comp_info = $('#comp_info').val();
        var city = $('#city').val();
        var zip_code = $('#zip_code').val();
        var country = $('#country').val();
        var phone_number = $('#phone_number').val();
        var mail = $('#email').val();
        var note = $('#note').val();
        var state = $('#state').val();
        if(!name.length){
            $('#name').focus();
        }else if(!street.length){
            $('#street').focus();
        }else if(!extStreetNumber.length){
            $('#extStreetNumber').focus();
        }else if(!inStreetNumber.length){
            $('#inStreetNumber').focus();
        }else if(!comp_info.length){
            $('#comp_info').focus();
        }else if(!city.length){
            $('#city').focus();
        }else if(!zip_code.length){
            $('#zip_code').focus();
        }else if(!country.length){
            $('#country').focus();
        }else if(!phone_number.length){
            $('#phone_number').focus();
        }else if(!mail.length){
            $('#email').focus();
        }else {
            alert(attach_url);
            $.ajax({
                type: "POST",
                url: attach_url,data: {name:name,street:street,extStreetNumber:extStreetNumber,inStreetNumber:inStreetNumber,comp_info:comp_info,city:city,state:state,zip_code:zip_code,country:country,phone_number:phone_number,mail:mail},
                dataType: "text",
                success:
                    function(data){
                        alert('Welcome! Successful.');  //as a debugging message.
                        location.href = cancel_url;
                    }
            });
        }


    });
    $('#cancel').click(function () {
        location.href = cancel_url;
    });
});
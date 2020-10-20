$(document).ready(function() {
	$('#warehouse_save').click(function(){
		var name = $('#name').val();
        if(name == "")
        {
            toastr.warning("Enter Phonnumber!","Notice");
            $('#name').focus();
            return;
        }
		$.ajax({
			url: $("#baseurl").val() + 'regphonenumber/phonenumber_add',
			data: {'name': name},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.msg=='success') {
                    parent.location.href = $("#baseurl").val() + 'regphonenumber';
				}
				else
				{
					toastr.warning("Existing PhoneNumber!","Notice");
				}
			}
		});
	});

    $('#multiaddbtn').click(function(){
        if($('#insertnumber').val() == "")
        {
            toastr.warning("Enter Insert text!", "Notice");
            $('#insertnumber').focus();
            return;
        }
        $('#multiinsert').attr('href','javascript:multiinsert()');
        $("#insert_modal").modal();
    });
});

function multiinsert()
{
    var inserttxt = $('#insertnumber').val();
    $.ajax({
    url: $("#baseurl").val() + 'regphonenumber/multiinsert',
    data: {'insertdata': inserttxt},
    type: 'POST',
    dataType: 'json',
    success: function(data) {
        if (data.msg=='success') {
            parent.location.href = $("#baseurl").val() + 'regphonenumber';
        }
        else
        {
            toastr.warning("Operation failed!","Notice");
        }
      }
    });
}

function delete_warehouse(id) {
    $('#warehouse_del').attr('href','javascript:del_warehouse('+id+')');
	$("#del_modal").modal();
}

function delete_all()
{
    $('#warehouse_del').attr('href','javascript:delete_all_sure()');
    $("#del_modal").modal();
}

function add_warehouse(){
	$("#add_modal").modal();
}

function delete_all_sure()
{
    $.ajax({
        url: $("#baseurl").val() + 'regphonenumber/delete_all',
        data: {'deleteall': 'deleteall'},
        type: 'POST',
        dataType: 'json',
        success: function (msg) {
            if (msg) {
                parent.location.href = $("#baseurl").val() + 'regphonenumber';
            } else {
                toastr.warning("Operation failed!", "Notice");
            }
            $('#del_modal').modal('hide');
        }
    });
}

function del_warehouse($id) {
    $.ajax({
        url: $("#baseurl").val() + 'regphonenumber/delete',
        data: {'del_id': $id},
        type: 'POST',
        dataType: 'json',
        success: function (msg) {
            if (msg) {
                parent.location.href = $("#baseurl").val() + 'regphonenumber';
            } else {
                toastr.warning("Operation failed!", "Notice");
            }
            $('#del_modal').modal('hide');
        }
    });
}
function edit_warehouse_modal(id)
{
    $.ajax({
        url: $("#baseurl").val() + 'regphonenumber/get_warehouse_id',
        data: {'id':id},
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            $('#warehouse_edit').attr('href','javascript:edit_warehouse('+id+')');
            $("#edit_modal").modal();
            $('#editname').val(data['phonenumber']);
        }
    });
}
function edit_warehouse(id) {
    var editname = $('#editname').val();
    if(editname == "")
    {
        toastr.warning("Enter Phonnumber!","Notice");
        $('#editname').focus();
        return;
    }
    $.ajax({
        url: $("#baseurl").val() + 'regphonenumber/edit',
        data: {'edit_id': id,'name':editname},
        type: 'POST',
        dataType: 'json',
        success: function (msg) {
            if (msg) {
                $('#editname').val('');
                parent.location.href = $("#baseurl").val() + 'regphonenumber';
            } else {
                toastr.error("Problem happened in edit!", "Notice");
            }
            $('#edit_modal').modal('hide');
        }
    });
}

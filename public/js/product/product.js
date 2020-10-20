
function search_product() {
	var key_word = $('#search_str').val();
	$.ajax({
		url: $("#baseurl").val() + '/products/search',
		data: {srch_key: key_word},
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			if (data) {
				$('#product_table').html(data);
			}
			else
				alert(data);
		}
	});
}

$(document).ready(function() {
	$("#search_str").keydown(function (e) {
	  if (e.keyCode == 13) {
	    search_product();
	  }
	});

	$("#search_btn").click(search_product);
});

function delete_product($id) {
	$.ajax({
		url: $("#baseurl").val() + '/products/delete',
		data: {'del_id': $id},
		type: 'POST',
		dataType:'json',
		success: function(msg) {
			if (msg){
				$('#tr_'+$id).css('display', 'none');
				$('#success_text').text('Product deleted correctly.')
				$('#success_msg').css('display', 'block');
				setTimeout(function() {
						$('#success_msg').css('display', 'none');						
					}, 2000);
			}else {
				$('#warning_text').text("Product didn't delete.");
				$('#warning_msg').css('display', 'block');
				setTimeout(function() {
						$('#warning_msg').css('display', 'none');						
					}, 2000);
			}

			$('#del_modal').modal('hide');
		}
	});
}

function add_product_modal() {
	$('#name').val('');
	$('#code').val('');
	$('#category').val('');
	$('#description').val('');
	$('#buyPrice').val('');
	$('#sellPrice').val('');
	$('#modal_name').text('Add Product');
	$('#product_ctrl').attr('href', 'javascript:add_product()');
	$('#product_ctrl').text('Add');
	$('#product_modal').modal();
}

function add_product() {
	if (product_form_validate() != true)
		return;
	var p_name = $('#name').val();
	var p_code = $('#code').val();
	var p_category = $('#category').val();
	var p_description = $('#description').val();
	var p_buyprice = $('#buyPrice').val();
	var p_sellprice = $('#sellPrice').val();

	$.ajax({
		url: $("#baseurl").val() + '/products/add',
		data: {name: p_name, code: p_code, category: p_category, description: p_description, buyprice: p_buyprice, sellprice: p_sellprice},
		type: 'POST',
		dataType: 'json',
		success: function(html) {
			console.log(html);
			switch(html) {
				case 'form_validation_error':
					$('#warning_text').text("Product Code must be 4 characters.");
					$('#warning_msg').css('display', 'block');
					setTimeout(function() {
						$('#warning_msg').css('display', 'none');						
					}, 2000);
					break;
				case 'already_exist':
					$('#warning_text').text("Product Code already exist!");
					$('#warning_msg').css('display', 'block');
					setTimeout(function() {
						$('#warning_msg').css('display', 'none');						
					}, 2000);
					break;
				default:
					$('#product_table').html(html);
					$('#product_modal').modal('hide');
					$('#success_text').text('Product added correctly.');
					$('#success_msg').css('display', 'block');
					setTimeout(function() {
						$('#success_msg').css('display', 'none');						
					}, 2000);
					break;
			}
		}
	});
}

function edit_product_modal(id) {
	$('#name').val($('#tr_'+id+" td:eq(1)").text());
	$('#code').val($('#tr_'+id+" td:eq(2)").text());
	$('#category').val($('#tr_'+id+" td:eq(3)").text());
	$('#description').val($('#tr_'+id+" td:eq(4)").text());
	$('#buyPrice').val($('#tr_'+id+" td:eq(5)").text());
	$('#sellPrice').val($('#tr_'+id+" td:eq(6)").text());
	$('#modal_name').text('Edit Product');
	$('#product_ctrl').attr('href', 'javascript:edit_product('+id+')');
	$('#product_ctrl').text('Save');
	$('#product_modal').modal();
}

function edit_product(id) {
	if (product_form_validate() != true)
		return;
	var p_name = $('#name').val();
	var p_code = $('#code').val();
	var p_category = $('#category').val();
	var p_description = $('#description').val();
	var p_buyprice = $('#buyPrice').val();
	var p_sellprice = $('#sellPrice').val();

	$.ajax({
		url: $("#baseurl").val() + '/products/edit',
		data: {e_id: id, name: p_name, code: p_code, category: p_category, description: p_description, buyprice: p_buyprice, sellprice: p_sellprice},
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			if (data) {
				$('#product_table').html(data);
				$('#product_modal').modal('hide');
				$('#success_text').text('Product updated correctly.');
				$('#success_msg').css('display', 'block');
			}
			else{
				$('#product_modal').modal('hide');
				$('#warning_text').text("Product didn't update.");
				$('#warning_msg').css('display', 'block');
			}
		}
	});
}

function product_form_validate() {
	var p_name = $('#name').val();
	var p_code = $('#code').val();
	var p_category = $('#category').val();
	var p_description = $('#description').val();
	var p_buyprice = $('#buyPrice').val();
	var p_sellprice = $('#sellPrice').val();
	if ($.trim(p_name) == '') {
		alert('Please enter Product Name');
		$('#name').focus();
		return false;
	}
	if ($.trim(p_code) == '') {
		alert('Please enter Product Code');
		$('#code').focus();
		return false;
	}
	if ($.trim(p_category) == '') {
		alert('Please enter Product Category');
		$('#category').focus();
		return false;
	}
	if ($.trim(p_buyprice) == '') {
		alert('Please enter Product buyPrice');
		$('#buyPrice').focus();
		return false;
	}
	if ($.trim(p_sellprice) == '') {
		alert('Please enter Product sellPrice');
		$('#sellPrice').focus();
		return false;
	}

	return true;
}
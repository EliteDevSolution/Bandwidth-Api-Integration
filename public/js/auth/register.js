function validate() {
	var pwd = $("#password").val();
	var confirmpwd = $("#confirm_pwd").val();
	if(pwd != confirmpwd)
		return false;
	return true;
}

$(document).ready(function () {
	$("#register").click(validate);
});

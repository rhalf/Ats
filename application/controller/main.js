var globalUser = new User();
// var globalCompany = new Company();
// var globalBusinessField = new BusinessField();
// var globalBusinessField = new BusinessField();

var arrayGlobalUser = new Array();
var arrayGlobalCompany = new Array();
var arrayGlobalBusinessField = new Array();
var arrayGlobalStatus = new Array();
var arrayGlobalUserLogType = new Array();
var arrayGlobalStatus = new Array();



$.post('application/model/service/business_field_select.php', function(data) {
	arrayGlobalBusinessField.length = 0;
	$.each(data.businessfield, function(index,object){
		arrayGlobalBusinessField.push(object);
	});
},'json');

$.post('application/model/service/status_select.php', function(data) {
	arrayGlobalStatus.length = 0;
	$.each(data.status, function(index,object){
		arrayGlobalStatus.push(object);
	});                    
},'json');

$.post('application/model/service/user_select.php', function(data) {
	arrayGlobalUser.length = 0;
	$.each(data.user, function(index,object){
		arrayGlobalUser.push(object);
	});                    
},'json');


$.post('application/model/service/user_log_type_select.php', function(data) {
	arrayGlobalUserLogType.length = 0;
	$.each(data.userlogtype, function(index,object){
		arrayGlobalUserLogType.push(object);
	});                    
},'json');

//------------------------------------------------------------------------


function getNameBusinessField(id) {
	for (var index = 0;index < arrayGlobalBusinessField.length; index++) {
		if (arrayGlobalBusinessField[index].Id == id) {
			return arrayGlobalBusinessField[index].Name;
		}
	}
}

function getNameStatus(id) {
	for (var index = 0;index < arrayGlobalStatus.length; index++) {
		if (arrayGlobalStatus[index].Id == id) {
			return arrayGlobalStatus[index].Name;
		}
	}
}

function getNameUser(id) {
	for (var index = 0;index < arrayGlobalUser.length; index++) {
		if (arrayGlobalUser[index].Id == id) {
			return arrayGlobalUser[index].Name;
		}
	}
}

function getNameUserLogType(id) {
	for (var index = 0;index < arrayGlobalUserLogType.length; index++) {
		if (arrayGlobalUserLogType[index].Id == id) {
			return arrayGlobalUserLogType[index].Name;
		}
	}
}













function Validate() {
	this.IsEmpty = function(data) {
		var string  = this.Trim(data);
		if (string.length > 0) {
			return false;
		} else {
			return true;
		}
	};
	this.Trim = function(data) {
		return $.trim(data);
	};
}


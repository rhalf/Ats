var globalActiveUser = new User();

var globalUser = new Array();
var globalCompany = new Array();
var globalBusinessField = new Array();
var globalStatus = new Array();
var globalUserLogType = new Array();
var globalClientResponse = new Array();
var globalProductOffered = new Array();
var globalUserLog = new Array();
var globalContact = new Array();
var globalContactType = new Array();
var globalProduct = new Array();
var globalPrivilege = new Array();

//------------------------------------------------------------------------
function globalLoadUser(callback) {
	$.post('application/model/service/user_select.php', function(data) {
		globalUser.length = 0;
		$.each(data.user, function(index,object){
			globalUser.push(object);
		});        
		if( callback != null ){ callback(); };
	},'json');
}
function globalLoadCompany(callback) {
	$.post('application/model/service/company_select.php', function(data) {
		globalCompany.length = 0;
		$.each(data.company, function(index,object){
			globalCompany.push(object);
		});     
		if( callback != null ){ callback(); };              
	},'json');
}
function globalLoadBusinessField(callback) {
	$.post('application/model/service/business_field_select.php', function(data) {
		globalBusinessField.length = 0;
		$.each(data.businessfield, function(index,object){
			globalBusinessField.push(object);
		});
		if( callback != null ){ callback(); };
	},'json');
}
function globalLoadStatus(callback) {
	$.post('application/model/service/status_select.php', function(data) {
		globalStatus.length = 0;
		$.each(data.status, function(index,object){
			globalStatus.push(object);
		});   
		if( callback != null ){ callback(); };
	},'json');
}
function globalLoadUserLogType(callback) {
	$.post('application/model/service/user_log_type_select.php', function(data) {
		globalUserLogType.length = 0;
		$.each(data.userlogtype, function(index,object){
			globalUserLogType.push(object);
		});      
		if( callback != null ){ callback(); };             
	},'json');
}
function globalLoadProductOffered(callback) {
	$.post('application/model/service/product_offered.php', function(data) {
		globalProductOffered.length = 0;
		$.each(data.productoffered, function(index,object){
			globalProductOffered.push(object);
		});      
		if( callback != null ){ callback(); };
	},'json');
}
function globalLoadUserLog(callback) {
	$.post('application/model/service/user_log_select.php', function(data) {
		globalUserLog.length = 0;
		$.each(data.userlog, function(index,object){
			globalUserLog.push(object);
		});     
		if( callback != null ){ callback(); };
	},'json');
}
function globalLoadContact(callback) {
	$.post('application/model/service/contact_select.php', function(data) {
		globalContact.length = 0;
		$.each(data.contact, function(index,object){
			globalContact.push(object);
		});     
		if( callback != null ){ callback(); };
	},'json');
}
function globalLoadContactType(callback) {
	$.post('application/model/service/contact_type_select.php', function(data) {
		globalContactType.length = 0;
		$.each(data.contacttype, function(index,object){
			globalContactType.push(object);
		});     
		if( callback != null ){ callback(); };
	},'json');
}
function globalLoadProduct(callback) {
	$.post('application/model/service/product_select.php', function(data) {
		globalProduct.length = 0;
		$.each(data.product, function(index,object){
			globalProduct.push(object);
		});     
		if( callback != null ){ callback(); };
	},'json');
}
function globalLoadClientResponse(callback) {
	$.post('application/model/service/client_response_select.php', function(data) {
		globalClientResponse.length = 0;
		$.each(data.clientResponse, function(index,object){
			globalClientResponse.push(object);
		});     
		if( callback != null ){ callback(); };
	},'json');
}

function globalLoadPrivilege(callback) {
	$.post('application/model/service/privilege_select.php', function(data) {
		globalPrivilege.length = 0;
		$.each(data.privilege, function(index,object){
			globalPrivilege.push(object);
		});     
		if( callback != null ){ callback(); };
	},'json');
}
//------------------------------------------------------------------------
function getBusinessField(id) {
	for (var index = 0;index < globalBusinessField.length; index++) {
		if (globalBusinessField[index].Id == id) {
			return globalBusinessField[index];
		}
	}
}
function getStatus(id) {
	for (var index = 0;index < globalStatus.length; index++) {
		if (globalStatus[index].Id == id) {
			return globalStatus[index];
		}
	}
}
function getUser(id) {
	for (var index = 0;index < globalUser.length; index++) {
		if (globalUser[index].Id == id) {
			return globalUser[index];
		}
	}
}
function getUserLogType(id) {
	for (var index = 0;index < globalUserLogType.length; index++) {
		if (globalUserLogType[index].Id == id) {
			return globalUserLogType[index];
		}
	}
}
function getContactType(id) {
	for (var index = 0;index < globalContactType.length; index++) {
		if (globalContactType[index].Id == id) {
			return globalContactType[index];
		}
	}
}
function getProduct(id) {
	for (var index = 0;index < globalProduct.length; index++) {
		if (globalProduct[index].Id == id) {
			return globalProduct[index];
		}
	}
}
function getPrivilege(id) {
	for (var index = 0;index < globalPrivilege.length; index++) {
		if (globalPrivilege[index].Id == id) {
			return globalPrivilege[index];
		}
	}
}
//------------------------------------------------------------------------
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
//------------------------------------------------------------------------
if (typeof($.session.get('user')) == 'undefined') {
	dialogLogin();
} else {
	var progress = new LoadingBar();

	$(function() {
		progress.Initialized();
	});


	var data = $.session.get('user');
	globalActiveUser = JSON.parse(data);

	
	var itemsLoaded = 0;

	globalLoadUser(function() {
		itemsLoaded++;
	});
	globalLoadCompany(function() {
		itemsLoaded++;
	});
	globalLoadBusinessField(function() {
		itemsLoaded++;
	});
	globalLoadStatus(function() {
		itemsLoaded++;
	});
	globalLoadUserLogType(function() {
		itemsLoaded++;
	});
	globalLoadProductOffered(function() {
		itemsLoaded++;
	});
	globalLoadContact(function() {
		itemsLoaded++;
	});
	globalLoadContactType(function() {
		itemsLoaded++;
	});
	globalLoadPrivilege(function() {
		itemsLoaded++;
	});

	var interval = setInterval(function() {
		console.log(itemsLoaded);

		$(function() {
			progress.SetValue((itemsLoaded / 9)*100);
		});
		if (itemsLoaded >= 9) {
			clearInterval(interval);
			$.get('application/view/layout/container.php', function(data) {
				$('body').append(data);
			});
			$(function() {
				progress.Destroy();	
			});					
		}
	},100);
}
//------------------------------------------------------------------------
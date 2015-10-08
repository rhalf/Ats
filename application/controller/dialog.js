function dialogLogin() {
	$.get('application/view/dynamic/login.html', function( data ) {
		var div = '<div id="dialog"></div>';
		$('#dialog').remove();
		$('body').append(div);
		$('#dialog').html(data);
		$('#dialog').dialog({
			title: "Login",
			show:  "fade",
			hide: "fade",
			height: "auto",
			width: "auto"
		});
		$('#dialog').dialog("open");
	});
}
function dialogLogout() {
	$.get('application/view/dynamic/logout.html', function( data ) {
		var div = '<div id="dialog"></div>';
		$('#dialog').remove();
		$('body').append(div);
		$('#dialog').html(data);
		$('#dialog').dialog({
			title: "Logout",
			show:  "fade",
			hide: "fade",
			height: "auto",
			width: "auto"
		});
		$('#dialog').dialog("open");
	});
}
function dialogCompanyAdd() {
	$.get('application/view/dynamic/company_insert.html', function( data ) {
		var div = '<div id="dialog"></div>';
		$('#dialog').remove();
		$('body').append(div);
		$('#dialog').html(data);
		$('#dialog').dialog({
			title: "Add Company",
			show:  "fade",
			hide: "fade",
			height: "auto",
			width: "auto"
		});
		$('#dialog').dialog("open");
	});
}
function dialogCompanyUpdate(company) {
	$.get('application/view/dynamic/company_update.html', function( data ) {
		var div = '<div id="dialog"><script>var company = '+ JSON.stringify(company) + '</script></div>';
		$('#dialog').remove();
		$('body').append(div);
		$('#dialog').html(data);
		$('#dialog').dialog({
			title: "Update Company",
			show:  "fade",
			hide: "fade",
			height: "auto",
			width: "auto"
		});
		$('#dialog').dialog("open");
	});
}
function dialogProductOfferedAdd() {
	$.get('application/view/dynamic/product_offered_insert.html', function( data ) {
		var div = '<div id="dialog"></div>';
		$('#dialog').remove();
		$('body').append(div);
		$('#dialog').html(data);
		$('#dialog').dialog({
			title: "Add Product Offered",
			show:  "fade",
			hide: "fade",
			height: "auto",
			width: "auto"
		});
		$('#dialog').dialog("open");
	});
}
function dialogProductOfferedUpdate(productOffered) {
	$.get('application/view/dynamic/product_offered_update.html', function( data ) {
		var div = '<div id="dialog"><script>var productOffered = ' + JSON.stringify(productOffered) + ';</script></div>';
		$('#dialog').remove();
		$('body').append(div);
		$('#dialog').html(data);
		$('#dialog').dialog({
			title: "Update Product Offered",
			show:  "fade",
			hide: "fade",
			height: "auto",
			width: "auto"
		});
		$('#dialog').dialog("open");
	});
}
//=======================================================================================
function dialogGoogleSearchAddress(company) {
	$('#dialogGoogleSearchAddress').remove();
	$('body').append('<div id="dialogGoogleSearchAddress"><script>var company = '+ JSON.stringify(company) + '</script></div>');
	$.get('application/view/dynamic/google_seach_address.html', function( data ) {
		$('#dialogGoogleSearchAddress').html(data);
		$('#dialogGoogleSearchAddress').dialog({
			title: "Get Address",
			show:  "fade",
			hide: "fade",
			height: 350,
			width: 600
		});
		$('#dialogGoogleSearchAddress').dialog("open");
	});
}


function companyView() {
	$.get('application/view/dynamic/company.html', function( data ) {
		$('#tabControl #companyView').remove();
		$('#tabControl #companyViewContent').remove();

		$('#tabControl').append("<div id='companyViewContent'/>");
		$('#tabControl #companyViewContent').html(data);

		$('#tabControl ul').append("<li id='companyView'><a href='#companyViewContent'>Company</a><span class='ui-icon ui-icon-close' role='presentation'></span></li>");
		$('#tabControl').tabs("refresh");
		$('#tabControl').tabs('option', 'active', -1);
	});
}

function companyProductsOffered() {
	$.get('application/view/dynamic/product_offered.html', function( data ) {
		$('#tabControl #productOffered').remove();
		$('#tabControl #productsOfferedContent').remove();

		$('#tabControl').append("<div id='productsOfferedContent'/>");
		$('#tabControl #productsOfferedContent').html(data);

		$('#tabControl ul').append("<li id='productOffered'><a href='#productsOfferedContent'>Products Offered</a><span class='ui-icon ui-icon-close' role='presentation'></li>");
		$('#tabControl').tabs("refresh");
		$('#tabControl').tabs('option', 'active', -1);
	});
}

function companyLogs() {
	$.get('application/view/dynamic/user_log.html', function( data ) {
		$('#tabControl #userLog').remove();
		$('#tabControl #userLogContent').remove();

		$('#tabControl').append("<div id='userLogContent'/>");
		$('#tabControl #userLogContent').html(data);

		$('#tabControl ul').append("<li id='userLog'><a href='#userLogContent'>Logs</a><span class='ui-icon ui-icon-close' role='presentation'></li>");
		$('#tabControl').tabs("refresh");
		$('#tabControl').tabs('option', 'active', -1);
	});
}


// function dialogCompanyAddBusinessField() {
// 	$('body').append('<div id="dialog" style="font-size: 0.8em"></div>');
// 	$.get('forms/companyAddBusinessField.html', function( data ) {
// 		$('#dialog').html(data);
// 	});
// 	$('#dialog').dialog({
// 		title: "Add Business Field",
// 		heightStyle: "content"
// 	});
// 	$('#dialog').dialog("open");
// }

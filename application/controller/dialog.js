function dialogLogin() {
	$('#dialog').remove();
	$('body').append('<div id="dialog"></div>');
	$.get('application/view/dynamic/login.html', function( data ) {
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
	$('#dialog').remove();
	$('body').append('<div id="dialog"></div>');
	$.get('application/view/dynamic/logout.html', function( data ) {
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
	$('#dialog').remove();
	$('body').append('<div id="dialog"></div>');
	$.get('application/view/dynamic/company_insert.html', function( data ) {
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
	$('#dialog').remove();
	$('body').append('<div id="dialog"><script>var company = '+ JSON.stringify(company) + '</script></div>');
	$.get('application/view/dynamic/company_update.html', function( data ) {
		$('#dialog').html(data);
		$('#dialog').dialog({
			title: "Update Company",
			show:  "fade",
			hide: "fade",
			height: "auto",
			width: "auto",
			object: company
		});
		$('#dialog').dialog("open");
	});
}
function dialogProductOfferedAdd() {
	$('#dialog').remove();
	$('body').append('<div id="dialog"></div>');
	$.get('application/view/dynamic/product_offered_insert.html', function( data ) {
		$('#dialog').html(data);
		$('#dialog').dialog({
			title: "Update Company",
			show:  "fade",
			hide: "fade",
			height: "auto",
			width: "auto",
			object: company
		});
		$('#dialog').dialog("open");
	});
}
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
			width: 600,
			object: company
		});
		$('#dialogGoogleSearchAddress').dialog("open");
	});
}


function companyView() {
	$('#tabControl #companyView').remove();
	$('[href="#companyView"]').remove();
	$('#tabControl').append("<div id='companyView'/>");
	$.get('application/view/dynamic/company.html', function( data ) {
		$('#tabControl #companyView').html(data);
		$('#tabControl ul').append("<li><a href='#companyView'>Company</a></li>");
		$('#tabControl').tabs("refresh");
		$('#tabControl').tabs({collapsible:false});

		// var index = $('#tabControl').tabs('length') - 1;
		// $('#tabControl').tabs({ active:  index});
	});
}

function companyProductsOffered() {
	$('#tabControl #companyProductsOffered').remove();
	$('[href="#companyProductsOffered"]').remove();
	$('#tabControl').append("<div id='companyProductsOffered'/>");
	$.get('application/view/dynamic/company_product_offered.html', function( data ) {
		$('#tabControl #companyProductsOffered').html(data);
		$('#tabControl ul').append("<li><a href='#companyProductsOffered'>Products Offered</a></li>");
		$('#tabControl').tabs("refresh");
		$('#tabControl').tabs({collapsible:false});
		// var index = $('#tabControl').tabs('length') - 1;
		// $('#tabControl').tabs({ active:  index});
	});
}

function companyLogs() {
	$('#tabControl #companyLogs').remove();
	$('[href="#companyLogs"]').remove();
	$('#tabControl').append("<div id='companyLogs'/>");
	$.get('application/view/dynamic/company_logs.html', function( data ) {
		$('#tabControl #companyLogs').html(data);
		$('#tabControl ul').append("<li><a href='#companyLogs'>Logs</a></li>");
		$('#tabControl').tabs("refresh");
		$('#tabControl').tabs({collapsible:false});


		// var index = $('#tabControl').tabs('length') - 1;
		// $('#tabControl').tabs({ active:  index});
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

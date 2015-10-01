<div id="accordion">
	<div id="accordion-sales">Sales</div>
	<ul id="menuSales">
		<li id="salesCompany">Company</li>
		<li id="salesCompanyProductsOffered">Products Offered</li>
		<li id="salesCompanyLogs">Logs</li>
	</ul>
	<div id="accordion-options">Options</div>
	<ul id="menuOptions">
		<li id="userLogout">Logout</li>
	</ul>
</div>



<script type="text/javascript">
$('document').ready(function() {
	$('#accordion').accordion({
		collapsible: true,
		heightStyle: "content",
		active: false
	});

	$('#menuSales').menu();
	$('#menuOptions').menu();



	$('#salesCompany').click(function() {
		companyView();	
	});
	$('#salesCompanyProductsOffered').click(function() {
		companyProductsOffered();	
	});
	$('#salesCompanyLogs').click(function() {
		companyLogs();	
	});
	$('#userLogout').click(function() {
		dialogLogout();		
	});

});
	
</script>
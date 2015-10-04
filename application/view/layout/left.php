<div id='userDisplay'>
	<ul>
	</ul>
</div>


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
//var user = JSON.parse($.session.get('user'));
$('#userDisplay ul').append('<li>Username :<br/>' + globalActiveUser.Name + '</li>');
$('#userDisplay ul').append('<li>Email :<br/>' + globalActiveUser.Email + '</li>');

$('#userDisplay ul').append('<li>Privilege :<br/>' + globalActiveUser.Privilege + '</li>');
$('#userDisplay ul').append('<li>Status :<br/>' + globalActiveUser.Status + '</li>');
$('#userDisplay ul').append('<li>DateTimeCreated :<br/>' + globalActiveUser.DateTimeCreated + '</li>');
$('#userDisplay ul').append('<li>DateTimeRenewed :<br/>' + globalActiveUser.DateTimeRenewed + '</li>');


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
</script>
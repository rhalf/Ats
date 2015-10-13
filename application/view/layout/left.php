
<div id="accordion">
	<div>User</div>
	<div id='menuUserDisplay'>
		<table></table>
	</div>
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

	var privilege = ats.getObject(ats.ListPrivilege, sessionUser.Privilege);
	var userStatus = ats.getObject(ats.ListStatus, sessionUser.Status);


	$('#menuUserDisplay table').append('<tr><td>Username</td><td>' + sessionUser.Name + '</td></tr>');
	$('#menuUserDisplay table').append('<tr><td>Email</td><td>' + sessionUser.Email + '</tr>');

	$('#menuUserDisplay table').append('<tr><td>Privilege</td><td>' + privilege.Name + '</td></tr>');
	$('#menuUserDisplay table').append('<tr><td>Status</td><td>' + userStatus.Name + '</td></tr>');
	$('#menuUserDisplay table').append('<tr><td>DateTimeCreated</td><td>' + sessionUser.DateTimeCreated + '</td></tr>');
	$('#menuUserDisplay table').append('<tr><td>DateTimeRenewed</td><td>' + sessionUser.DateTimeRenewed + '</td></tr>');
	

	if (sessionUser.Privilege <= 2) {
		$('#accordion').append('<div id="accordion-admin">Admin</div>');
		$('#accordion').append('<ul id="menuAdmin"><li id="adminUser">User</li></ul>');

	}

	$('#accordion').accordion({
		collapsible: true,
		heightStyle: "content",
		active: false
	});

	$('#menuSales').menu();
	$('#menuOptions').menu();
	$('#menuAdmin').menu();

	$('#salesCompany').click(function() {
		viewCompany();	
	});
	$('#salesCompanyProductsOffered').click(function() {
		viewProductsOffered();	
	});
	$('#salesCompanyLogs').click(function() {
		viewLogs();	
	});

	$('#userLogout').click(function() {
		dialogLogout();		
	});

	$('#adminUser').click(function() {
		viewUser();	
	});
</script>

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
	
		var privilege = getObject(ats.ListPrivilege, user.Privilege);
		var status = getObject(ats.ListStatus, user.Status);


	$('#menuUserDisplay table').append('<tr><td>Username</td><td>' + user.Name + '</td></tr>');
	$('#menuUserDisplay table').append('<tr><td>Email</td><td>' + user.Email + '</tr>');

	$('#menuUserDisplay table').append('<tr><td>Privilege</td><td>' + privilege.Name + '</td></tr>');
	$('#menuUserDisplay table').append('<tr><td>Status</td><td>' + status.Name + '</td></tr>');
	$('#menuUserDisplay table').append('<tr><td>DateTimeCreated</td><td>' + user.DateTimeCreated + '</td></tr>');
	$('#menuUserDisplay table').append('<tr><td>DateTimeRenewed</td><td>' + user.DateTimeRenewed + '</td></tr>');
	

	if (user.Privilege <= 2) {
		$('#accordion').append('<div id="accordion-management">Management</div>');
		$('#accordion').append('<ul id="menuAddUser"><li id="addUser">Add User</li></ul>');

	}







	$('#accordion').accordion({
		collapsible: true,
		heightStyle: "content",
		active: false
	});

	$('#menuSales').menu();
	$('#menuOptions').menu();
	$('#menuAddUser').menu();

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
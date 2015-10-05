
<div id="accordion">
	<div>User</div>
	<div id='userDisplay'>
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
	
	$('#userDisplay table').append('<tr><td>Username</td><td>' + globalActiveUser.Name + '</td></tr>');
	$('#userDisplay table').append('<tr><td>Email</td><td>' + globalActiveUser.Email + '</tr>');

	$('#userDisplay table').append('<tr><td>Privilege</td><td>' + getPrivilege(globalActiveUser.Privilege).Name + '</td></tr>');
	$('#userDisplay table').append('<tr><td>Status</td><td>' + getStatus(globalActiveUser.Status).Name + '</td></tr>');
	$('#userDisplay table').append('<tr><td>DateTimeCreated</td><td>' + globalActiveUser.DateTimeCreated + '</td></tr>');
	$('#userDisplay table').append('<tr><td>DateTimeRenewed</td><td>' + globalActiveUser.DateTimeRenewed + '</td></tr>');
	

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
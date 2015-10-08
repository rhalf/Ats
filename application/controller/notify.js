// function notify(message) {
// 	var div = "<div id='notify'>" + message + "</div>";
// 	$('#notify').remove();
// 	$('body').append(div);

// 	$("#notify").css({
// 		'border' : '1px solid #0000FF',
// 		'border-radius' : '5px',
// 		'background' : 'rgba(0,0,255,0.1)',
// 		'color' : '#000000',
// 		'min-width' : '200px',
// 		'min-height' : '20px',
// 		'position' : 'absolute',
// 		'right' : '0px',
// 		'margin' : '5px',
// 		'padding' : '5px',
// 		'display' : 'none'
// 	});

// 	$("#notify").show("drop");
// 	setTimeout(function() {
// 		$("#notify").hide("drop");
// 	},3000);
// }

// function notifyError(message) {
// 	var div = "<div id='notify'>" + message + "</div>";
// 	$('#notify').remove();
// 	$('body').append(div);

// 	$("#notify").css({
// 		'border' : '1px solid #FF0000',
// 		'border-radius' : '5px',
// 		'background' : 'rgba(255,0,0,0.1)',
// 		'color' : '#000000',
// 		'min-width' : '200px',
// 		'min-height' : '20px',
// 		'position' : 'absolute',
// 		'right' : '0px',
// 		'margin' : '5px',
// 		'padding' : '5px',
// 		'display' : 'none'
// 	});

// 	$("#notify").show("drop");
// 	setTimeout(function() {
// 		$("#notify").hide("drop");
// 	},5000);
// }
function notify(message) {
	var div = "<div id='notify'>" + message + "</div>";
	$('#notify').remove();
	$('body').append(div);
	$('#notify').dialog({
		title: "Information",
		show:  "fade",
		hide: "fade",
		height: "auto",
		width: "auto",
		modal: true,
		buttons: {
			"Ok": function() {
				$( this ).dialog( "close" );
			}
		}
	});
	$('#notify').dialog("open");

}

function notifyError(message) {
	var div = "<div id='notify'>" + message + "</div>";
	$('#notify').remove();
	$('body').append(div);

	$('#notify').dialog({
		title: "Error",
		show:  "fade",
		hide: "fade",
		height: "auto",
		width: "auto",
		modal: true,
		buttons: {
			"Ok": function() {
				$( this ).dialog( "close" );
			}
		}
	});
	$('#notify').dialog("open");
}




function LoadingBar() {
	this.Html = '<div id="dialogLoading"><div id="progressbar"></div></div>';
	this.Initialized = function() {
		$('body').append(this.Html);
		$('#dialogLoading').dialog({
			title: "Loading...",
			show:  "fade",
			hide: "fade",
			height: 100,
			width: 400,
			modal: true
		});
		$('#dialogLoading #progressbar').progressbar({
			height: 50,
			value: 0
		});
		$('#dialogLoading').dialog("open");
		//console.log('instantiated');
	};
	
	

	this.SetValue = function(inputValue) {
		var value = $('#progressbar').progressbar("value");
		var intervalId = setInterval(function() {
			if (value < inputValue) {
				value+=2;
				$('#progressbar').progressbar({
					value: value
				});
			}else {
				clearInterval(intervalId);
			}
		},100);
		//console.log('Value set to ' + inputValue);
	};

	this.Destroy = function() {
		$('#dialogLoading').remove();
		//console.log('Removed');
	};
}


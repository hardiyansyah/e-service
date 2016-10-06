$(function(){
	var noteBefore = $('#note-before');
	var noteAfter = $('#note-after');
	var notifBefore = $('#notif-before');
	var notifAfter = $('#notif-after');
	var digit = $('#digit');
		ts = new Date(2012, 0, 1),
		newYear = true;

	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts2 = (new Date()).getTime() + 40*24*60*60*1000;
		ts = (new Date()).getTime() + 3*24*60*60*1000;
		// ts = (new Date()).getTime() + 3*1000;
		// ts2 = (new Date()).getTime() + 5*1000;
		// newYear = false;
	}
 
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			var message = "";
			var messageNotif = "";
			// message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			// message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			// message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			// message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			message += "Sisa Waktu Anda adalah";
			if(days == 0 && hours == 0 && minutes == 0 && seconds == 0){
				noteBefore.slideUp();
				noteAfter.slideDown();
				messageNotif += "Anda Sudah Melebihi Batas Waktu Yang Ditentukan";
				$( "#countdown" ).slideUp(); 
				$(".digit.static").css("background-color", "red");
				$(".digit.static").css("background-image", "red");
				$("#countdown2").fadeIn();
				$.ajax({
					
				})
			}
			// notifBefore.html(messageNotif);
			// noteBefore.html(message);
		}
	});

	$('#countdown2').countdown({
		timestamp	: ts2,
		callback	: function(days, hours, minutes, seconds){
			// var message = "";
			// message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			// message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			// message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			// message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			// noteBefore.html(message);
		}
	});	
});

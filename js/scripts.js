function countEmails(){
	var emails = $("#client-emails").val();
	var splitEmails = emails.split(',');
	$("#total-emails").html('Total Email Found: <b>'+splitEmails.length+'</b>');
	if(splitEmails.length > 100){
		var differs = splitEmails.length - 100;
		$("#error").html("emails has exceed the maximum, please remove <b>"+differs+"</b>  ");
		return false;
	}
}

function sendMail(){
	var senderName = $("#sender-name").val();
	var senderEmail = $("#sender-email").val();
	var senderSubject = $("#sender-subject").val();
	var senderMessage = $("#sender-message").val();

	var clientEmails = $("#client-emails").val();

	$.ajax({
		type: "POST",
		url: "__factory/send-mail.php",
		data: {
			senderName:senderName,
			senderEmail:senderEmail,
			senderSubject:senderSubject,
			senderMessage:senderMessage,
			clientEmails:clientEmails
		},
		cache: true,
		success: function (data){
			$("#mail-div").hide();
			$("#mail-status").html(data);
		}
	});

	return false;
}
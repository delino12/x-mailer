<?php
/**
* Send Mail Class
*/
class SendMassMail
{

	protected $sender_name;
	protected $sender_email;
	protected $sender_subject;
	protected $sender_message;
	
	function __construct($sender_name, $sender_email, $sender_subject, $sender_message)
	{
		# code...
		$this->sender_name = $sender_name;
		$this->sender_email = $sender_email;
		$this->sender_subject = $sender_subject;
		$this->sender_message = $sender_message;
	}

	public function send($client_emails){

		$from = $this->sender_name." <$this->sender_email>";
		$headers = "From: $from \n";
		$headers .= "X-Priority: 1\n"; //1 Urgent Message, 3 Normal
		$headers .= "Content-Type:text/html; charset=\"iso-8859-1\"\n";

		$single_emails = explode(",", $client_emails);
		$total = count($single_emails);
		for($i = 0; $i < $total; $i++){

			# sending single mails
			if(mail($single_emails[$i], $this->sender_subject, $this->sender_message, $headers)){
				echo 'Mail sent to '. $single_emails[$i];
			}
		}

		echo 'Total mail sent: ['.$total.'] ';
	}
}
?>
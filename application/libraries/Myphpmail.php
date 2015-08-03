<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myphpmail {
    

	function SendMail($data){

	require_once ("PHPMailer/PHPMailerAutoload.php");//載入PHPMailer類別 
		  $mail = new PHPMailer();
		  $mail->IsSMTP();
		  //Enable SMTP debugging
		  // 0 = off (for production use)
		  // 1 = client messages
		  // 2 = client and server messages
		  $mail->SMTPDebug = 0;
		  $mail->SMTPAuth = true;//使用Gmail的SMTP需要驗證，所以這裡要設true
		  $mail->SMTPSecure = "ssl";
		  $mail->Debugoutput = 'html';
		  
		  //Gmail的SMTP是使用465port
		  $mail->Host = "smtp.gmail.com";
		  $mail->Port = 465;
		  $mail->Username = 'it@gotutor4u.com';//帳號
		  $mail->Password ='gotutor0987^';//密碼
		
		  $mail->From = 'info@gotutor4u.com';//寄件者
		  $mail->FromName = 'GoTutor';//寄件者姓名
		  if(is_array($data['list'])){
			foreach($data['list'] as $email){
				$mail->AddAddress($email);
			}
		  }
		  else{
			$mail->AddAddress($data['list']);
		  } 
		 	/*
			$mail->AddAttachment($_FILES['file2']['tmp_name'],
					 $_FILES['file2']['name']);
			*/
		  $mail->CharSet = "utf-8";
		  $mail->Subject = $data['subject'];//主旨
		  $mail->Body = $data['body'];//內文
		  $mail->AltBody = "Your browser does not support HTML";
		//send the message, check for errors
		if (!$mail->send()) {
			return  $data=array('send'=>0,'info'=>$mail->ErrorInfo);
		} else {
			return  $data=array('send'=>1,'info'=>$mail->ErrorInfo);
		}
	}
}
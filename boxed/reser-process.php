<?php
	//Retrieve form data. 
	//GET - user submitted data using AJAX
	//POST - in case user does not support javascript, we'll use POST instead
	$name = ($_GET['name']) ? $_GET['name'] : $_POST['name'];
	$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
	$comment = ($_GET['comment']) ?$_GET['comment'] : $_POST['comment'];
	$date = ($_GET['date']) ?$_GET['date'] : $_POST['date'];
	$phone = ($_GET['phone']) ?$_GET['phone'] : $_POST['phone'];
	$personnum = ($_GET['personnum']) ?$_GET['personnum'] : $_POST['personnum'];
	$branch = ($_GET['branch']) ?$_GET['branch'] : $_POST['branch'];
	$occasion = ($_GET['occasion']) ?$_GET['occasion'] : $_POST['occasion'];
	$food = ($_GET['food']) ?$_GET['food'] : $_POST['food'];
	
	//flag to indicate which method it uses. If POST set it to 1
	if ($_POST) $post=1;
	
	//Simple server side validation for POST data, of course, you should validate the email
	if (!$name) $errors[count($errors)] = 'Please enter your name.';
	if (!$email) $errors[count($errors)] = 'Please enter your email.';
	if (!$comment) $errors[count($errors)] = 'Please enter your comment.';
	if (!$date) $errors[count($errors)] = 'Please enter correct date.';
	if (!$phone) $errors[count($errors)] = 'Please enter your phone.';
	if (!$personnum) $errors[count($errors)] = 'Please enter your Preferred food.';
	if (!$branch) $errors[count($errors)] = 'Please enter your branch.';
	if (!$occasion) $errors[count($errors)] = 'Please enter your occasion.';
	if (!$food) $errors[count($errors)] = 'Please enter your food.';
	
	//if the errors array is empty, send the mail
	if (!$errors) {
	
		//recipient - YOUR EMAIL.. or whatever
		$to = 'Your Name <arafa.webdesigner@gmail.com>';	
		//sender - from the form
		$from = $name . ' <' . $email . '>';
		
		//subject and the html message
		$subject = 'Comment from ' . $name;	
		$message = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head></head>
		<body>
		<table>
			<tr><td>Name</td><td>' . $name . '</td></tr>
			<tr><td>Email</td><td>' . $email . '</td></tr>
			<tr><td>Date</td><td>' . $date . '</td></tr>
			<tr><td>Phone</td><td>' . $phone . '</td></tr>
			<tr><td>Preferred food</td><td>' . $personnum . '</td></tr>
			<tr><td>Branch</td><td>' . $branch . '</td></tr>
			<tr><td>Occasion</td><td>' . $occasion . '</td></tr>
			<tr><td>Food</td><td>' . $food . '</td></tr>
			<tr><td>Comment</td><td>' . nl2br($comment) . '</td></tr>
		</table>
		</body>
		</html>';
	
		//send the mail
		$result = sendmail($to, $subject, $message, $from);
		
		//if POST was used, display the message straight away
		if ($_POST) {
			if ($result) echo 'Thank you! We have received your message.';
			else echo 'Sorry, unexpected error. Please try again later';
			
		//else if GET was used, return the boolean value so that 
		//ajax script can react accordingly
		//1 means success, 0 means failed
		} else {
			echo $result;	
		}
	
	//if the errors array has values
	} else {
		//display the errors message
		for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
		echo '<a href="form.html">Back</a>';
		exit;
	}





//Simple mail function with HTML header
function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}

?>
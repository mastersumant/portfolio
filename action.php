<?php
$name = filter_input(INPUT_POST, 'name');
$mail = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$message = filter_input(INPUT_POST, 'message');

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
  }
$host = "localhost";
$dbusername = "";
$dbpassword = "";
$dbname = "";
    // Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO portfolio (name, email, phone, message)
values ('$name','$mail','$phone','$message')";
if ($conn->query($sql)){
 $body="Hii {$name},\n\n";
 $body.="Thank you for getting in touch! \n\nI have received your message and would like to thank you for writing to me. \n\nIf your inquiry is urgent, please use the contact number below to talk to me. \n\nOtherwise, I will reply by email as soon as possible.";
 $body.="\n\nThe contact information shared by you :\n\n";
 $body.="Name : {$name}\n";
 $body.="Email : {$mail}\n";
 $body.="Contact : {$phone}\n";
 $body.="\nTalk to you soon,\n      ~Sumant Kr.";
 $body.="\n\nContact : +917619481923";
 $subject="Thanks for your contact";	        	        
 $from = "sumant@sitsark.in";
 $headers = "From:" . $from;
 mail($mail,$subject,$body,$headers);
header("Location: http://portfolio.sitsark.in/");
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}


?>
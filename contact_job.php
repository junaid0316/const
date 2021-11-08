<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal = $_POST['postal'];
    $cover = $_POST['cover'];
    $refer = $_POST['refer'];
    $willing = $_POST['willing'];
    $citi = $_POST['citi'];
    $edu = $_POST['edu'];
    $coru = $_POST['coru'];
    $age = $_POST['age'];
    $linkurl = $_POST['linkurl'];
    $web = $_POST['web'];
    $dsalary = $_POST['dsalary'];
    $sdate = $_POST['sdate'];
    $overtime = $_POST['overtime'];
    $charac = $_POST['charac'];
    $refername = $_POST['refername'];


    $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'mj448551@gmail.com';                 // SMTP username
    $mail->Password = 'aixhjunni0349';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('mj448551@gmail.com', 'Constant');
    $mail->addAddress('mj448551@gmail.com');     // Add a recipient
    $mail->addReplyto($_POST['email']);

    $mail->isHTML(true);  
    $mail->addAttachment($_FILES['resume']['tmp_name'], $_FILES['resume']['name']);                                // Set email format to HTML
    $mail->Subject = 'New Mail from Constant';
    $mail->Body    = "<h3>First Name: $fname".".<br></br>Last Name: ".$lname.".<br></br>Email: ".$email.".<br></br>Phone: ".$phone.".<br></br>Address: ".$address.".<br></br>City: ".$city.".<br></br>State: ".$state.".<br></br>Postal Code: ".$postal.".<br></br>Cover letter: ".$cover.".<br></br>Referred By: ".$refer.".<br></br>Willing to Relocate: ".$willing.".<br></br>Citizen Ship/Employment Eligibility: ".$citi.".<br></br>Education: ".$edu.".<br></br>College or University: ".$coru.".<br></br>Older than 18 or not: ".$age.".<br></br>LinkedIn URL: ".$linkurl.".<br></br>Website, Blog or Portfolio: ".$web.".<br></br>Desired Salary: ".$dsalary.".<br></br>Earliest Start Date: ".$sdate.".<br></br>Can you work Overtime: ".$overtime.".<br></br>Thing make you unique: ".$charac.".<br></br>Reference: ".$refername.".</h3>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    header('Location: index.html');

    if($mail->send()) {
        header('Location: index.html');
        exit();
    } else {
        header('Location: index.html');
        exit();
    }
}
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
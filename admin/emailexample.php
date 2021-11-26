$msg=" Email Found";
        $to=$email;
        $subject= "Reset Password";
        $message= "
        Hello $name, <br>
        <br>
        <br>
        please click this link to reset your password:
        <br>
        <a href='http://localhost/DIGITAL%20HOSPITAL/resetpwd.php?set=$aid&hash=$hash&role=$role'  >Click Here</a>
        ";
            //$headers="From:jigarvakil9200@gmail.com"."\r\n";
            //mail($to,$subject,$message,$headers);


        require 'PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer();

            //Enable SMTP debugging.
        $mail->SMTPDebug = 1;
            //Set PHPMailer to use SMTP.
        $mail->isSMTP();
            //Set SMTP host name
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
              //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = TRUE;
              //Provide username and password
        $mail->Username = "digitalhospital.official@gmail.com";
        $mail->Password = "jigar011";
              //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "false";
        $mail->Port = 587;
              //Set TCP port to connect to

        $mail->From = "digitalhospital.official@gmail.com";
        $mail->FromName = "Digital Hospital";

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send())
        {
        header("location:login.php");
        }
        else
        {
            header("location:resetpwdmail.php?msg=Mail Not Sent");
            //$msg="";
        }
    }
    
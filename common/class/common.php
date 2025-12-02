<?php
//While insert data into db

function setVal($connection, $str)
{   
    if( function_exists("get_magic_quotes_gpc") && !get_magic_quotes_gpc())
    {
        $str = addslashes(trim($str));
    } else {
        $str = trim($str);
    }
    mysqli_real_escape_string($connection, $str);
    //$badWords = array("/delete/i", "/update/i", "/union/i", "/insert/i", "/drop/i", "/http/i", "/--/i", "/shutdown/i");
    //$str = preg_replace($badWords, "", $str);
    $str = preg_replace("/(update)(.*?)(set)/i", " ", $str);
    $str = preg_replace("/(insert)(.*?)(into)/i", " ", $str);
    $str = preg_replace("/(delete)(.*?)(from)/i", " ", $str);
    $str = preg_replace("/(drop)(.*?)(table)/i", " ", $str);
    $str = preg_replace("/(drop)(.*?)(database)/i", " ", $str);
    $str = preg_replace("/(alter)(.*?)(table)/i", " ", $str);
    $str = preg_replace("/(select)(.*?)(from)/i", " ", $str);
    $str = preg_replace("/(<script)(.*?)(<\/script>)/i", " ", $str);
    $str = preg_replace("/(<embed)(.*?)(<\/embed>)/i", " ", $str);
    $str = preg_replace("/(show)(.*?)(table)/i", " ", $str);
    $str = preg_replace("/(show)(.*?)(fields)/i", "", $str);
    return $str;
}

//While get data from the db
function getval($str)
{
    return stripslashes(trim($str));
}

function selectQuery($connection, $query)
{
    $resultQuery = mysqli_query($connection, $query) or die(mysqli_error($connection));
    return $resultQuery;
}

function deleteQuery($connection, $query)
{
    mysqli_query($connection, $query) or die(mysqli_error($connection));
}

function insertQuery($connection, $query)
{
    //echo $query;
    $resultQuery = mysqli_query($connection, $query) or die(mysqli_error($connection));
    return mysqli_insert_id($connection);
}

function updateQuery($connection, $query)
{
    //echo $query;
    return $resultQuery = mysqli_query($connection, $query) or die(mysqli_error($connection));
}
function getReadToken($HeadersData)
{
   // print_r("in hdr");
    foreach ($HeadersData as $name => $value) {
      //  print_r(strtoupper($name));
        if (strtoupper($name) == "HEARDERS_R" || $name == "Hearders-R") {
            return $value;
        }

    }
}

function msgbox($msgtype, $msg) {
	if ($msgtype == "success")
		return '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> '. $msg .'</div>';
	else if ($msgtype == "failed" || $msgtype == "")
	    return '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a> '. $msg .'</div>';

	// setTimeout(function () {
	// 	$(".close").click();
	// }, 5000);
}
function send_mail($email_to, $subject, $message, $connection)
{
    require_once 'class.phpmailer.php';
    require_once 'class.pop3.php';
    require_once 'class.smtp.php';

    $objmail = new PHPMailer;
    $objmail->IsSMTP();
    $objmail->SMTPAuth = false;

    switch (MAILER) {
        case 'SIMPLE':
            $objmail->IsMail();
            break;
        case 'SMTP':
            $objmail->IsSMTP();
            $objmail->SMTPSecure = SMTP_SECURE;
            $objmail->Host = SMTP_SERVER;
            $objmail->Port = SMTP_PORT;
            if (SMTP_AUHTENTICAION) {
                $objmail->SMTPAuth = true;
                $objmail->Username = SMTP_USER_NAME;
                $objmail->Password = SMTP_USER_PASSWORD;
            }
            break;
        case 'SENDMAIL':
            $objmail->IsSendmail();
            break;
    }

    $objmail->FromName = 'Sagax Team'; // $email_from_name;
    $objmail->From =  SMTP_USER_NAME;
    //$objmail->SetFrom(($smtp_username != '') ? $smtp_username : SMTP_USER_NAME, ($email_from_name != '') ? $email_from_name : 'The Refinery');
    $objmail->Subject = $subject;
    $objmail->Body = $message;
    $objmail->AltBody = "";
    $objmail->IsHTML(true);
    //$objmail->SMTPDebug = 1;
    $email_to_name ='';
    if (strtolower(SITE_MODE) == "local" || strtolower(SITE_MODE) == "zerozone") {//for developer env and local staging
        //$email_to = "test@zerozone.com";
        $email_to = "miloni.ace@outlook.com";
        $objmail->AddAddress($email_to, $email_to_name);
        $objmail->AddReplyTo($email_to, $email_to_name);
    } 
    else if (strtolower(SITE_MODE) == "staging"){//for customer's staging
        $email_to = "vipultanna@aceinfoway.com";
        $objmail->AddAddress($email_to, $email_to_name);
        $objmail->AddReplyTo($email_to, $email_to_name);
    }

    //echo "<pre>";    print_r($objmail); exit;

    /********************************************** Log Insert *************************************************/
    if ($objmail->Send()) {
        $mail_status = true;
        $stop_mail = false;
    } else {
        $mail_status = false;
        $stop_mail = true;
    }

    /********************************************** Log Update *************************************************/
    $status_log = ($mail_status) ? 1 : 0;
    /********************************************** Log Update *************************************************/
    return $mail_status;

}
?>
<?php

$EmailFrom = "SC-Grand.ru";
$EmailTo = "info@sc-grand.ru";
$Subject = "Обратная связь ск-гранд";
$name = Trim(stripslashes($_POST['name'])); 
$mail = Trim(stripslashes($_POST['mail'])); 
$question = Trim(stripslashes($_POST['question']));

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Имя: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Почтовый ящик: ";
$Body .= $mail;
$Body .= "\n";
$Body .= "Вопрос: ";
$Body .= $question;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

/* Do work */
  if(isset($_REQUEST["destination"])){
      header("Location: {$_REQUEST["destination"]}");
  }else if(isset($_SERVER["HTTP_REFERER"])){
      header("Location: {$_SERVER["HTTP_REFERER"]}");
  }else{
       /* some fallback, maybe redirect to index.php */
  }
  
?>
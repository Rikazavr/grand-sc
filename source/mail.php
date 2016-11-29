<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['childname'])) {$childname = $_POST['childname'];}
    if (isset($_POST['birthday'])) {$birthday = $_POST['birthday'];}
    if (isset($_POST['parentname'])) {$parentname = $_POST['parentname'];}
    if (isset($_POST['email'])) {$email = $_POST['email'];}
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
    if (isset($_POST['rank'])) {$rank = $_POST['rank'];}
    if (isset($_POST['sport'])) {$sport = $_POST['sport'];}
    if (isset($_POST['additional'])) {$additional = $_POST['additional'];}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}
    if (isset($_POST['office'])) {$formData = $_POST['office'];}
// не забудь сменить почтовый ящик
    $to = "info@sc-grand.ru";
    $sendfrom   = "Запись_ск_сайт@admin.ru";
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "$formData<br><b> 
                            Имя ребёнка:</br></br>$childname<br><b>
                            Возраст ребенка:</br></b>$birthday<br><b>
                            ФИО родителя:</b></b>$parentname<br><b>
                            Почта:</b></br>$email<br><b>
                            Номер телефона:</b></br>$phone<br><b>
                            Разряд:</b></b>$rank<br><b>
                            вид спорта:</br></br>$sport<br><b>
                            Комментарии:</br></br>$additional</br></br>" ;
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<center><p class="success">Спасибо, ваша заявка принята!</p></center>';
    }
    else 
    {
    echo '<center><p class="fail"><b>Ошибка. Анкета не отправлена! Пожалуйста, обновите страницу и попробуйте сново!</b></p></center>';
    }
} else {
    http_response_code(403);
    echo "Попробуйте еще раз";
}
?>
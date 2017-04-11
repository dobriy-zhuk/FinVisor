<?php

if (isset($_POST['name_order'])) {
    $name_order = $_POST['name_order'];
}
if (isset($_POST['phone_order'])) {
    $phone_order = $_POST['phone_order'];
}
if (isset($_POST['inn_order'])) {
    $inn_order = $_POST['inn_order'];
}
if (isset($_POST['url_order'])) {
    $url_order = $_POST['url_order'];
}
if (isset($_POST['subject'])) {
    $subject = $_POST['subject'];
}

// Create the email and send the message
$to = 'kvasovao@yandex.ru';
$email_subject = $subject;
$email_body = "$subject\nИмя: $name_order\nТелефон: $phone_order\nИНН: $inn_order\nСайт: $url_order";
$headers = "From: $name_order\n";
$headers .= "Reply-To: $name_order";
mail($to,$email_subject,$email_body,$headers);

echo "$name_order, Ваша заявка принята.<br> Мы свяжемся с Вами в ближайшее время!";

?>
<?php
$phone_number = htmlspecialchars($_POST['phone_number']);
echo (ctype_digit($phone_number))? "Номер телефону містить лише цифри" : "Номер телефону містить не лише цифри";
?>
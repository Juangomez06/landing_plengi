<?php
// Reemplaza con tu dirección de correo receptora
$receiving_email_address = 'deyeki5269@ckuer.com';

// Verifica que la biblioteca PHP Email Form existe
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('¡No se pudo cargar la biblioteca "PHP Email Form"!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

// Configuración básica del formulario
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Configuración SMTP
$contact->smtp = array(
  'host' => 'live.smtp.mailtrap.io',
  'username' => 'smtp@mailtrap.io',
  'password' => '61fd2d77a2e3fedb65c2ef9337c74489',
  'port' => '587'
);

// Añadir mensajes del formulario
$contact->add_message($_POST['name'], 'Nombre');
$contact->add_message($_POST['email'], 'Correo electrónico');
$contact->add_message($_POST['message'], 'Mensaje', 10);

// Enviar y mostrar el resultado
echo $contact->send();
?>

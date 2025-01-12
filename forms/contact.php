<?php
 
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Не удалось загрузить библиотеку «PHP Email Form!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['имя'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['предмет'];

 
  $contact->add_message( $_POST['имя'], 'от');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['сообщение'], 'Сообщение', 10);

  echo $contact->send();
?>

<?php
session_start();//on démarre la session
  
  $errors = array(); // on crée une vérif de champs
if(!array_key_exists('name', $_POST) || $_POST['name'] == '') {// on verifie l'existence du champ et d'un contenu
  $errors ['name'] = "vous n'avez pas renseigné votre nom";
  }
if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {// on verifie l'existence de la clé
  $errors ['mail'] = "vous n'avez pas renseigné votre email";
  }
if(!array_key_exists('message', $_POST) || $_POST['message'] == '') {
  $errors ['message'] = "vous n'avez pas renseigné votre message";
  }
//On check les infos transmises lors de la validation
  if(!empty($errors)){ // si erreur on renvoie vers la page précédente
    $_SESSION['errors'] = $errors;//on stocke les erreurs
    $_SESSION['inputs'] = $_POST;
    header('Location: ../contacter.php');
  }else{
    $_SESSION['success'] = 1;
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'FROM:' . htmlspecialchars($_POST['email']);
    $to = 'ni.brossault@laposte.net'; // Insérer adresse email ICI
    $subject = 'Message envoyé(e) par M/Mme ' . htmlspecialchars($_POST['name']);
    $str .= chr(39);
    $description = htmlentities($_POST['message'],ENT_QUOTES);
    $message_content = '
    <table>
    <tr>
    <td><b>Emetteur du message:</b></td>
    </tr>
    <tr>
    <td>'. $subject .' : <i> ' . htmlspecialchars($_POST['email']) .'</td>
    </tr>
    <tr>
    <td><b>Contenu du message:</b></td>
    </tr>
    <tr>
    <td>'. nl2br($description) .'</td>
    </tr>
    </table>
    ';
  mail($to, $subject, $message_content, $headers);
    header('Location: ../contact.php');
  }
  ?>
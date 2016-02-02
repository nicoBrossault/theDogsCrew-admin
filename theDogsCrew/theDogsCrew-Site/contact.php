<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dogs' Crew</title>
    <link rel="stylesheet" href="css/general.css">
    <!-- Bootstrap -->
      <link href="dist/css/bootstrap.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript" src="dossierJS/jquery-1.11.3.min.js"></script>
      </head>
      <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>

        <?php 
          include('navbar.php');
        ?>
        <div class="row" style="margin-top:100px">
          <div class="presentation" style="margin-top:2%;">
            <div class="row" style="width:90%; padding-left:23%; padding-right:7%">
              <div class="pied">
                <?php 
                  if(isset($_SESSION['langue'])){
                    if($_SESSION['langue']==1){
                      $nom="Votre nom";
                      $email="Votre email";
                      $message="Votre message";
                      $envoie="Envoyer";
                      $sql=$db->query("SELECT * FROM `textsite` WHERE `type`='contact' AND `idLangue`=".$_SESSION['langue']);
                      while ($data = $sql->fetch()){
                        echo utf8_encode('<h1 style="font-size:30px; text-align:center">'.$data['libelle'].'</h1><p>'.$data['text'].'</p>');
                      }
                    }else{
                      $nom="Your name";
                      $email="Your email";
                      $message="Your message";
                      $envoie="Submit";
                      if($_SESSION['langue']==2){
                        $sql=$db->query("SELECT * FROM `textsite` WHERE `type`='contact' AND `idLangue`=".$_SESSION['langue']);
                        while ($data = $sql->fetch()){
                          echo utf8_encode('<h1 style="font-size:30px;">'.$data['libelle'].'</h1><p>'.$data['text'].'</p>');
                        }
                      }else{
                        $nom="Ihren namen";
                        $email="Ihre email";
                        $message="Ihre nachricht";
                        $envoie="Senden";
                        $sql=$db->query("SELECT * FROM `textsite` WHERE `type`='contact' AND `idLangue`=".$_SESSION['langue']);
                        while ($data = $sql->fetch()){
                          echo utf8_encode('<h1 style="font-size:30px;">'.$data['libelle'].'</h1><p>'.$data['text'].'</p>');
                        }
                      }
                    }
                  } 
                ?>
              </div>
            </div>
          </div>

          <!-- CONTENT -->        
          <div class="container article">
          <?php if(array_key_exists('errors',$_SESSION)): ?>
            <div class="alert alert-danger">
              <?php implode('<br>', $_SESSION['errors']); ?>
            </div>
          <?php endif; 
          if(array_key_exists('success',$_SESSION)): ;?>
            <div class="alert alert-success">
              Votre email a bien été transmis !
            </div>
          <?php endif; ?>
          <br>
          <br>
          <form action="php/send_form.php" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputname"><?=$nom; ?></label>
                  <input required type="text" name="name" class="form-control" id="inputname" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>">
                </div><!--/*.form-group-->
              </div><!--/*.col-md-6-->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputemail" style="padding-left:85%"><?=$email; ?></label>
                  <input required type="email" name="email" class="form-control" id="inputemail" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>">
                </div><!--/*.form-group-->
              </div><!--/*.col-md-6-->
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputmessage"><?=$message; ?></label>
                  <textarea required id="inputmessage" name="message" class="form-control" rows="8"><?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?></textarea>
                </div><!--/*.form-group-->
              </div><!--/*.col-md-12-->       
              <div class="col-md-12">
                <button type='submit' class='btn btn-primary'><?=$envoie; ?></button>
              </div><!--/*.col-md-12-->
            </div><!--/*.row-->
          </form>
          
          </div><!--/*.container-->
        <!-- END CONTENT -->
        <br>
      </div>
      <?php
        include('footer.php');
      ?>
      </body>
    </html>
    <?php
      unset($_SESSION['inputs']); // on nettoie les données précédentes
      unset($_SESSION['success']);
      unset($_SESSION['errors']);
    ?>
<?php @session_start(); ?>
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
    <div class="contient-navbar">
      <?php
        include('navbar.php');
      ?>
    </div>
    <?php
      if($_SESSION['langue']==1){
        $titre="Compagnie";
      }elseif($_SESSION['langue']==2){
        $titre="Company";
      }else{
        $titre="Kompanie";
      }

      $page=$db->query('SELECT * FROM page WHERE titre="'.$titre.'" AND idLAngue='.$_SESSION['langue']);
      while ($data = $page->fetch()){
        if($data['image']!=NULL){
          echo utf8_encode('
            <div class="page center-block">
              <div id="texte-article">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <br>
                        <h3 style="padding-top:2%">'.$data['titre'].'</h3>
                        <br>'.$data['date'].'
                        <br>'.$data['texte'].'
                      </td>
                      <td>
                        <br>
                        <img src="'.$data['image'].'" class="img-responsive center-block" alt="Responsive image" style="width:45%">
                        <br>
                      </td>
                  </tboby>
                </table>
              </div>
            </div>');
        }else{
          echo utf8_encode('
          <div class="page center-block">
            <div id="texte-article">
              <h3 style="padding-top:2%">'.$data['titre'].'</h3>
              <br>'.$data['date'].'
              <br>'.$data['texte'].'
            </div>
          </div>');
        }
      }
    ?>

    <?php 
      include('footer.php');
    ?>
  </body>
</html>
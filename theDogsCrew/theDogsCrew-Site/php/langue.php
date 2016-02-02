<?php
	if(isset($_POST['langue'])){
		$_SESSION['langue']=$_POST['langue'];
	}
  
	function select($idlangue){
  		if(isset($_SESSION['langue'])){
  			if($idlangue==$_SESSION['langue']){
	  			return "selected";
	  		}
	  	}
	}
?>
<form action="#" method="post">
  <select name="langue">
    <?php

		$langue=$db->query('SELECT * FROM langue');
      	while ($data = $langue->fetch()){
      		$id=$data['id'];
			echo utf8_encode('<option value="'.$data['id'].'" '.select($id).'>'.$data['langue'].'</option>');
      	}
		
    ?>
  </select>
  <br>
  <input type="submit">
</form>
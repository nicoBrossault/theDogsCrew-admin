<?php
	if(isset($library_src) && isset($script_foot)){
		echo $library_src;
		echo $script_foot;
	}
?>
<div id="content"><?=$content; ?></div>

<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/general.js"></script>
<script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
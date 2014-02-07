<h1>Sigueme en twitter <?php echo $twitter;?></h1>
<?php foreach($model as $data):?>
	<h3><?php echo $data->username;?></h3>
<?php endforeach;?>
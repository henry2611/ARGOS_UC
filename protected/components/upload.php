<?php

if ($_FILES['archivo']["error"] > 0)
{
	echo "Error: " . $_FILES['archivo']['error'] . "<br>";
}else{
	$file = $_FILES['archivo']['tmp_name'];
	$uploadsFolder = "../../Resources/".$_FILES['archivo']['name'];

	$powerpnt = new COM("powerpoint.application") or die("Unable to instantiate Powerpoint");

	$presentation = $powerpnt->Presentations->Open(realpath($file), false, false, false) or die("Unable to open presentation");

	foreach($presentation->Slides as $slide)
	{
		$slideName = "Slide_" . $slide->SlideNumber;
		$exportFolder = realpath($uploadsFolder);
		$slide->Export($exportFolder."\\".$slideName.".jpg", "jpg", "1280", "800");
	}
	$powerpnt->quit();
}

?>
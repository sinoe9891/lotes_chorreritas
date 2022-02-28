
<?php
$zip_file = "src/upload/zip/12.zip";
touch($zip_file); // just create a zip file



$zip = new ZipArchive;
$this_zip = $zip->open($zip_file);

 if($this_zip){
// 	$file_with_path = "src/upload/12/dannysinoevelasquezcadena_2.jpeg";
// 	$name = "1.jpg";
// 	$zip->addFile($file_with_path,$name);

 	$folder = opendir('src/upload/12');

 	if($folder){
 		while( false !== ($image = readdir($folder))){
 			if($image !== "." && $image !== ".."){
 				echo $image."<br>";
 				 $file_with_path = "src/upload/12/".$image;
 				 $zip->addFile($file_with_path,$image);
 			}
 		}
 		closedir($folder);
 	}



 	 if(file_exists($zip_file)){
	echo "Existe"; 	
 	$demo_name = "my-image.zip";
		 header('Content-type: application/zip');
		 header('Content-Disposition: attachment; filename="'.$demo_name.'"');
		 readfile($zip_file); // auto download
		// //if you wnat to delete this zip file after download
		 unlink($zip_file);
 	}


 }



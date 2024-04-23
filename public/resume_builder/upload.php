<?php








// Check if there is an error with the file upload
if ($_FILES['file']['error'] > 0) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
} else {
    // Generate a unique filename using microtime
    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);

    // Define the upload directory path
    $uploadDirectory = 'upload/';
	
	
			if (is_dir($uploadDirectory)) {
		   // Move the uploaded file to the specified directory
			move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDirectory . $newfilename);
			  // Output the new filename for reference
			echo $newfilename;
			} else {
			echo "The directory does not exist.";
			}
	
	
	

   

  
}

?>
<?php
	$file = './stu/stu_download/'.$_GET['id'];
   	$title=$_GET['id'];

    header("Pragma: public");
	
	//$filetype=filetype($file);

     //$filename=basename($file);

    //header ("Content-Type: ".$filetype);
    //header ("Content-Length: ".filesize($file));
	
	
    header('Content-disposition: attachment; filename='.$title);
  
    
    header('Content-Transfer-Encoding: binary');
    ob_clean();
    flush();

    $chunksize = 1 * (1024 * 1024); // how many bytes per chunk
    if (filesize($file) > $chunksize) {
        $handle = fopen($file, 'rb');
        $buffer = '';

        while (!feof($handle)) {
            $buffer = fread($handle, $chunksize);
            echo $buffer;
            ob_flush();
            flush();
        }

        fclose($handle);
    } else {
        readfile($file);
    }
	?>
	<?php
				session_start();
				if($_SESSION['username']==true and $_SESSION['password']==true)
				{
					
				}
				else
				{
					header('location: /rljit_cse/login.html');
				}		
?>

<?php


	if( isset( $_POST['my_file_upload'] ) ){  
		// ВАЖНО! тут должны быть все проверки безопасности передавемых файлов и вывести ошибки если нужно

		$uploaddir = './uploads_video'; // . - текущая папка где находится submit.php

		// cоздадим папку если её нет
		if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );

		$files      = $_FILES; // полученные файлы
		$done_files = array();

		// переместим файлы из временной директории в указанную
		foreach( $files as $file ){
			// $name = $_SESSION['full_name'];
			$thisDate = date("Y-m-d H:i:s");
			$file_name = "video_" . $_SESSION['full_name'] . "$thisDate" . ".mp4";
			if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
				$done_files[] = realpath( "$uploaddir/$file_name" );
			}
			
		}

		$data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки файлов.');
if ($done_files) {
	# code...
}
		die( json_encode( $data ) );
	}


?>
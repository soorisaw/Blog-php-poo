<?php

class MediaManager extends Manager {


	public function saveFile($pathRecord)
	{
		if(isset($_FILES['file']) && !empty($_FILES['file']))
		//if(Form::validate($_FILES, ['file']))
		{
			$tmpName = $_FILES['file']['tmp_name'];
			$name = $_FILES['file']['name'];
			$size = $_FILES['file']['size'];
			$error = $_FILES['file']['error'];

			$imgExtension = explode('.', $name);
			$extension = strtolower(end($imgExtension));

			$extensions = ['jpg', 'png', 'jpeg', 'gif'];
			$maxSize = 500000;

			if(in_array($extension, $extensions))
			{
				if($size <= $maxSize)
				{
					if($error == 0)
					{
						$generateName = uniqid('',true);
						$imgFile = $generateName.".".$extension;

						//move_uploaded_file($tmpName, $pathRecord.$imgFile);
						 move_uploaded_file($tmpName, "$pathRecord.$imgFile");

						return $imgFile;
						
					}
					else
					{
						echo "Une erreur est survenue lors de l'upload";
					}
				}
				else
				{
				echo "Votre image est trop grande";
				}
			}
			else
			{
				echo "Mauvaise extension";
			}

		}
	}

}






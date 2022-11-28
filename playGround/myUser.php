<?php
$object = new User;$object

$object->name = "Brandon";
$object-> password = "thePassword";



$object->save_user();
stealInfo($object);

function stealInfo($userdata){
	$fh = fopen("testFile.txt", 'w') or die ("Failed to create file\n");
	$text = <<<_END
username: $userdata->name
password: $userdata->password
_END;
	
	fwrite($fh, $text) or die ("Could not write to file");
	fclose($fh);
	echo"File 'testFile.txt' written successfully\n";
	}




class user
{
	public $name, $password;
	
	function save_user(){
		echo "User is saved<br>";
	}
	

}

?>
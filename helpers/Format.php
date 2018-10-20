



<?php 

class Format  
{
	public function formatdate($date)
	{
		return date('F j, Y,g:i a',strtotime($date));

	}

	public function bodyTextShorten($bodyText,$limit)
	{
		
		$bodyText= $bodyText. " ";
		$bodyText= substr($bodyText,0,$limit);
		// $bodyText= substr($bodyText,0,strpos($bodyText,' '));
		$bodyText= $bodyText."......";
		return $bodyText;
	}

	public function validation($data)
	{
		$data=trim($data);
		$data= stripcslashes($data);
		$data= htmlspecialchars($data);
		return $data;
	}
	public function title()
	{
		$path=$_SERVER['SCRIPT_FILENAME'];
		$title=basename($path,'.php');
		$title=str_replace('_', '', $title);
			if ($title=='index') {
				$title='home';

			}
			elseif ($title=='contact') {
				$title='contact';
			}

			return $title=ucwords($title);
	}
	
}
 ?>
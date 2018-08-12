<?php	
	class main
	{
		
		public $title = "Rekrutacja - Zadanie 1";
		public $charset = "UTF-8";
		public $description = "System do zarządzania ligą gry w piłkarzyki";
		public $author = "Julian Chodorowski";
		public $keywords = "rekrutacja";
		
		public function __set($name, $value)
		{
			$this -> $name = $value;
		}
		
		Public function Display()
		{
			echo "<html>\n<head>\n";
				$this -> DisplayTitle();
				$this -> DisplayMetadata();
				$this -> DisplayStyle();
			echo "</head>\n<body>\n";
				echo "<div id=\"container\">";
				$this -> DisplayContainer();
				echo "</body>\n</html>\n";
		 
		}
		
		public function DisplayTitle()
		{
			echo "<title>".$this -> title."</title>";
		}
		
		public function DisplayMetadata()
		{
			echo "<meta charset=\"".$this -> charset."\"/>";
			echo "<meta name=\"description\" content=\"". $this -> description."\"/>";
			echo "<meta name=\"author\" content=\"".$this -> author."\"/>";
			echo "<meta name=\"keywords\" content=\"".$this -> keywords."\"/>"; 
		}
		
		public function DisplayStyle()
		{
			echo "<link href=\"style.css\" type=\"text/css\" rel=\"stylesheet\">";
		}
	}
?>
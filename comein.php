<?php 

    $Static_FilePath="static/";
   // echo $_SERVER["REQUEST_URI"];
    $get_path=str_replace("/","",$_SERVER["REQUEST_URI"]);
	
	if(file_exists($Static_FilePath.$get_path))
	{
		include($Static_FilePath.$get_path);//进入静态资源
	}
	else 
	{
		if(file_exists("api/".$get_path.".service")) // 加载 controller
		{
			require("functions");
			require("api/".$get_path.".service");
			$class_name=$get_path."Service";
			$loadClass=new $class_name();
			$loadClass->run();
		}
	}
	
    
	
    
     
?>
<?php

	class View{

		function render($sViewName = "index"){

			$loader = new Twig_Loader_Filesystem(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR .'templates');
			$twig = new Twig_Environment($loader, array(
			    /*'cache' => '/path/to/compilation_cache',*/
			));

			echo $twig->render($sViewName.'.html', array('name' => 'Fabien'));
		}
	}
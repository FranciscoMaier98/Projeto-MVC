<?php
class Core {

	public function run() {
        $url = '/'.(isset($_GET['q'])?$_GET['q']:'');

		$parametros = array();
		if(!empty($url) && $url != '/') {
			$url = explode('/', $url);
			array_shift($url);

			$atualController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && $url[0] != '/') {
				$atualAcao = $url[0];
				array_shift($url);
			} else {
				$atualAcao = 'index';
			}

			if(count($url) > 0) {
				$parametros = $url;
			}

		} else {
			$atualController = 'homeController';
			$atualAcao = 'index';
		}


		if(!file_exists('controllers/'.$atualController.'.php')) {
			$atualController = 'notFoundController';
			$atualAcao = 'index';
		}

		$c = new $atualController();
		
		if(!method_exists($c, $atualAcao)) {
			$atualAcao = 'index';
		}

		
		call_user_func_array(array($c, $atualAcao), $parametros);

	}

}
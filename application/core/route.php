<?php 

class Route {

    public static function start(){ 
        
        // контроллер и действие по умолчанию
        $controller_name = 'main';
        $action_name = 'index';                  
        
        // $routes = $_GET['url'];
        $routes = explode('/', $_SERVER['REQUEST_URI']);   
        
        // получаем имя контроллера
        if( !empty($routes[1]) ){
            $controller_name = $routes[1];
        }

        if( !empty($routes[2]) ){
            $action_name = $routes[2];
        }

        //добавляем префиксы
        $model_name = 'model_'.$controller_name;
		$controller_name = 'controller_'.$controller_name;
		$action_name = 'action_'.$action_name;
        
        //подключаем файл с классом модели
        $model_file = strtolower($model_name).'.php';
		$model_path = $_SERVER["DOCUMENT_ROOT"].'/application/models/'.$model_file;
		if(file_exists($model_path))
		{
			include $_SERVER["DOCUMENT_ROOT"].'/application/models/'.$model_file;            
		}

        //подключаем файлы с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
		$controller_path = $_SERVER["DOCUMENT_ROOT"].'/application/controllers/'.$controller_file;
		if(file_exists($controller_path))
		{
			include $_SERVER["DOCUMENT_ROOT"].'/application/controllers/'.$controller_file;
		}
		else
		{
			Route::ErrorPage404();
		}

        //создаем контроллер 
        $controller = new $controller_name;
		$action = $action_name;
        

		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}

    }

    function ErrorPage404() {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location'.$host.'404');
    }

}
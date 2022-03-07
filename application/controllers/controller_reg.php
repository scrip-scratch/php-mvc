<?php

class Controller_reg extends Controller {

    function __construct(){        
        $this-> view = new View();
        $this-> model = new Model_reg();
    }

    public function action_index(){

        $this -> view -> generate('reg_view.php', 'template_view.php');
        
        $regSuccess = false;
               
        if(!empty($_POST)) {
            $regSuccess = $this -> model -> regNewUser();                                     
            if($regSuccess){
                $this -> view -> popup_success();
            }           
		}
    }
}


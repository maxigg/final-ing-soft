<?php

abstract class Controller {
    
    protected $objView;
    
    public function __construct($strController=false) {
        //error_log(__FILE__  ." ==> ".__METHOD__);
        if($strController){
            $objRequest = new Request($strController);
            $this->objView = new View($objRequest);

            error_log(__METHOD__." --> new Request($strController); new View($objRequest)");
        }
         else{
            error_log(__METHOD__." --> new View(new Request())");
            $this->objView = new View(new Request());
         }
    }
    
    abstract public function index();
    
    /**
    *
    * Recibe el Name del Model de datos, lo busca. 
    * Si existe lo instancia y lo devueve a quien lo solicito
    * @param Recive el Name del Model.
    * @return Devuelve el Model.
    * @throws Exception.
    *
    **/
    protected function objLoadModel($strNameModel){
        error_log(__METHOD__);
        $strNameModel = $strNameModel . 'Model';
        $strRutaModel = APP_PATH . 'MODELS' . DS . $strNameModel . '.php';
        
        if(is_readable($strRutaModel)){
            require_once $strRutaModel;
            $objModel = new $strNameModel;
            return $objModel;
        } else {
            throw new Exception('Error Model ==> '.$strNameModel);
        }
    }

   
    /**
    * 
    * Redirects to a given path, or to the BASE_URL
    * @param String.
    * @return nada
    * @throws Vacio.
    *
    **/
    final protected function redirect($strRelativeURL = false){
        //error_log(__METHOD__);
        if(isset($strRelativeURL)){
            error_log(__METHOD__."::".BASE_URL.$strRelativeURL);
            header('location:' . BASE_URL . $strRelativeURL);
            //exit;
        }else{
            header('location:' . BASE_URL);
            //exit;
        }
    }



    public function isInteger($integer){
        if(isset($integer) && !empty($integer)){
            $integer = filter_input($integer, FILTER_VALIDATE_INT);
            return $integer;
        }
        return 0;
    }
    
    public function isString($string){
        if(isset($string) && !empty($string)){
            $string = htmlspecialchars($string, ENT_QUOTES);
            return $string;
        }
        return '';
    }


/*************************** HELPERS ***************************/
    
    public function pictureUploader($file, $photoDirectory = IMAGES, $photoName){
        //print_r($file);die();
        $file_ext = '.jpg';
        if(isset($file)){
            $file_type = $file['type'];
            $file_type = explode("/",$file_type);
            $file_ext = '.' . $file_type[1];
            $file_size = $file['size'];
        }
        $photo = $photoName . $file_ext;
        //si ya existia la foto la borro
        if(is_file($photoDirectory.$photo))
            unlink($photoDirectory.$photo);

        $photo = $photoDirectory . $photoName . $file_ext;
        //print_r($photo);
        
        if(!move_uploaded_file($file['tmp_name'], $photo))
            return false;

        return $photo;
            
    }
/*************************** HELPERS ***************************/

}

?>

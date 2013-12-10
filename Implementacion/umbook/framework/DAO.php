<?php

class DAO extends PDO
{


    public function __construct() {
        error_log( __FILE__  ." >  > ".__METHOD__);
        parent::__construct(
                'mysql:host=' . DB_HOST .
                ';dbname=' . DB_NAME,
                DB_USER, 
                DB_PASS, 
                array());
        self::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function boolEjecutarModificacionSQL($strSQL) {
        error_log( __FILE__  ." >  > ".__METHOD__);
        
        $intRes = $this->exec($strSQL);

        if($intRes==0)
            return false;
        else
            return true;
    }


    public function arrayEjecutarConsultaSQL($strSQL) {
        error_log( __FILE__  ." >  > ".__METHOD__);
       
        $objResult = $this->query($strSQL);

        return $objResult->fetchAll();
    }


}

?>

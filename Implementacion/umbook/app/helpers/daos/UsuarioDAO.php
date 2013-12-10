<?php

class UsuarioDAO extends DAO {

	/**
	 * createValueObject-method. This method is used when the Dao class needs
	 * to create new value object instance. The reason why this method exists
	 * is that sometimes the programmer may want to extend also the valueObject
	 * and then this method can be overrided to return extended valueObject.
	 * NOTE: If you extend the valueObject class, make sure to override the
	 * clone() method in it!
	 */

	public $conn;

	public function __construct(){
		$this->conn = new Datasource();
	}


	function createValueObject() {
		return new UsuarioDAO();
	}


	function load($id) {

		$sql = "SELECT id, user, pass FROM usuario WHERE (id = ".$id.") ";
		$result = $this->arrayEjecutarConsultaSQL($sql);

		foreach($result as $row) {
			$temp = new usuarioModel();
			$temp->setId($id);
			$temp->setUser($row[1]);
			$temp->setPass($row[2]);
		}
		return $temp;
	}


	function loadAll() {


		$sql = "SELECT * FROM usuario ORDER BY id ASC ";

		$searchResults = $this->listQuery($sql);

		return $searchResults;
	}


	function busqueda($query){
		$sql = "SELECT id, user, FROM  `usuario`
				WHERE
				`user` LIKE  '%".$query."%'
						LIMIT 0 , 30";

		$result = $this->arrayEjecutarConsultaSQL($sql);
		$searchResults = array();
		foreach($result as $row) {		 
			$temp = new usuarioModel();		 
			$temp->setId($row[0]);
			$temp->setUser($row[1]);			 
			array_push($searchResults, $temp);
		}
		return $searchResults;
	}

	 
	function checkLogin($usuario) {


		$sql = "SELECT id FROM usuario where user = '".$usuario->user."' and pass='".$usuario->pass."'";
		$result = $this->arrayEjecutarConsultaSQL($sql);
		$searchResults=0;
		foreach ($result as $row){
			if($row[0] != null){
				$searchResults = $row[0];
			}else{
				return false;
			}
		}
		return $searchResults;		
	}

	/**
	 * create-method. This will create new row in database according to supplied
	 * valueObject contents. Make sure that values for all NOT NULL columns are
	 * correctly specified. Also, if this table does not use automatic surrogate-keys
	 * the primary-key must be specified. After INSERT command this method will
	 * read the generated primary-key back to valueObject if automatic surrogate-keys
	 * were used.
	 *
	 * @param conn         This method requires working database connection.
	 * @param valueObject  This parameter contains the class instance to be created.
	 *                     If automatic surrogate-keys are not used the Primary-key
	 *                     field must be set for this to work properly.
	 */
	function create(&$valueObject) {

		$sql = "INSERT INTO usuario (user, pass) VALUES ( ";
		$sql = $sql."'".$valueObject->getUser()."', ";
		$sql = $sql."'".$valueObject->getPass()."') ";

		$result = $this->boolEjecutarModificacionSQL($sql);

		return $result;
	}


	/**
	 * save-method. This method will save the current state of valueObject to database.
	 * Save can not be used to create new instances in database, so upper layer must
	 * make sure that the primary-key is correctly specified. Primary-key will indicate
	 * which instance is going to be updated in database. If save can not find matching
	 * row, NotFoundException will be thrown.
	 *
	 * @param conn         This method requires working database connection.
	 * @param valueObject  This parameter contains the class instance to be saved.
	 *                     Primary-key field must be set for this to work properly.
	 */
	function save(&$valueObject) {

		$sql = "UPDATE usuario SET user = '".$valueObject->getUser()."', ";
		$sql = $sql."pass = '".$valueObject->getPass()."'";
		$sql = $sql." WHERE (id = ".$valueObject->getId().") ";
		$result = $this->boolEjecutarModificacionSQL($sql);

		if ($result != 1) {
			return false;
		}

		return $result;
	}

	function savePerfil(&$valueObject) {

		$sql = "UPDATE usuario SET user = '".$valueObject->getUser()."' ";
		$sql = $sql." WHERE (id = ".Session::get('id').") ";
		 
		$result = $this->boolEjecutarModificacionSQL($sql);
		 
		if ($result != 1) {
			return false;
		}
		return $result;
	}


	function setPass(&$valueObject) {

		$sql = "UPDATE usuario SET pass = '".$valueObject->getPass()."'  WHERE (id = ".Session::get('id').")";
		$result = $this->boolEjecutarModificacionSQL($sql);

		if ($result != 1) {
			return false;
		}
		return $result;
	}

	/**
	 * delete-method. This method will remove the information from database as identified by
	 * by primary-key in supplied valueObject. Once valueObject has been deleted it can not
	 * be restored by calling save. Restoring can only be done using create method but if
	 * database is using automatic surrogate-keys, the resulting object will have different
	 * primary-key than what it was in the deleted object. If delete can not find matching row,
	 * NotFoundException will be thrown.
	 *
	 * @param conn         This method requires working database connection.
	 * @param valueObject  This parameter contains the class instance to be deleted.
	 *                     Primary-key field must be set for this to work properly.
	 */
	function delete(&$valueObject) {

		if (!$valueObject->getId()) {
			return false;
		}

		$sql = "DELETE FROM usuario WHERE (id = ".$valueObject->getId().") ";
		$result = $this->boolEjecutarModificacionSQL($sql);

		if ($result != 1) {
			return false;
		}
		return $result;
	}

	/**
	 * deleteAll-method. This method will remove all information from the table that matches
	 * this Dao and ValueObject couple. This should be the most efficient way to clear table.
	 * Once deleteAll has been called, no valueObject that has been created before can be
	 * restored by calling save. Restoring can only be done using create method but if database
	 * is using automatic surrogate-keys, the resulting object will have different primary-key
	 * than what it was in the deleted object. (Note, the implementation of this method should
	 * be different with different DB backends.)
	 *
	 * @param conn         This method requires working database connection.
	 */
	function deleteAll() {

		$sql = "DELETE FROM usuario";
		$result = $this->boolEjecutarModificacionSQL($sql);

		return $result;
	}


	/**
	 * coutAll-method. This method will return the number of all rows from table that matches
	 * this Dao. The implementation will simply execute "select count(primarykey) from table".
	 * If table is empty, the return value is 0. This method should be used before calling
	 * loadAll, to make sure table has not too many rows.
	 *
	 * @param conn         This method requires working database connection.
	 */
	function countAll() {

		$sql = "SELECT count(*) FROM usuario";
		$allRows = 0;

		$result = $this->arrayEjecutarConsultaSQL($sql);

		if($result != null){
			foreach($result as $row) {
				$allRows = $row[0];
			}
		}
		return $allRows;
	}


	/**
	 * searchMatching-Method. This method provides searching capability to
	 * get matching valueObjects from database. It works by searching all
	 * objects that match permanent instance variables of given object.
	 * Upper layer should use this by setting some parameters in valueObject
	 * and then  call searchMatching. The result will be 0-N objects in vector,
	 * all matching those criteria you specified. Those instance-variables that
	 * have NULL values are excluded in search-criteria.
	 *
	 * @param conn         This method requires working database connection.
	 * @param valueObject  This parameter contains the class instance where search will be based.
	 *                     Primary-key field should not be set.
	 */
	function searchMatching(&$valueObject) {

		$first = true;
		$sql = "SELECT * FROM usuario WHERE 1=1 ";

		if ($valueObject->getId() != 0) {
			if ($first) {
				$first = false;
			}
			$sql = $sql."AND id = ".$valueObject->getId()." ";
		}

		if ($valueObject->getUser() != "") {
			if ($first) {
				$first = false;
			}
			$sql = $sql."AND user LIKE '".$valueObject->getUser()."%' ";
		}

		if ($valueObject->getPass() != "") {
			if ($first) {
				$first = false;
			}
			$sql = $sql."AND pass LIKE '".$valueObject->getPass()."%' ";
		}


		$sql = $sql."ORDER BY id ASC ";

		// Prevent accidential full table results.
		// Use loadAll if all rows must be returned.
		if ($first)
			return array();

		$searchResults = $this->listQuery($sql);

		echo '<pre>';
		print_r($searchResults);
		exit();

		return $searchResults;
	}


	/**
	 * databaseUpdate-method. This method is a helper method for internal use. It will execute
	 * all database handling that will change the information in tables. SELECT queries will
	 * not be executed here however. The return value indicates how many rows were affected.
	 * This method will also make sure that if cache is used, it will reset when data changes.
	 *
	 * @param conn         This method requires working database connection.
	 * @param stmt         This parameter contains the SQL statement to be excuted.
	 */
	function databaseUpdate($sql) {
		$result = $this->conn->execute($sql);
		return $result;
	}

	function databaseQuery(&$sql) {
		$result = $this->conn->query($sql);
		return $result;
	}



	/**
	 * databaseQuery-method. This method is a helper method for internal use. It will execute
	 * all database queries that will return only one row. The resultset will be converted
	 * to valueObject. If no rows were found, NotFoundException will be thrown.
	 *
	 * @param conn         This method requires working database connection.
	 * @param stmt         This parameter contains the SQL statement to be excuted.
	 * @param valueObject  Class-instance where resulting data will be stored.
	 */
	function singleQuery(&$sql, &$valueObject) {

		$result = $this->arrayEjecutarConsultaSQL($sql);

		if($result != null){
			foreach($result as $row) {
				$valueObject->setId($row[0]);
				$valueObject->setUser($row[1]);
				$valueObject->setPass($row[2]);
			}
		} else {
			return false;
		}
		return true;
	}


	/**
	 * databaseQuery-method. This method is a helper method for internal use. It will execute
	 * all database queries that will return multiple rows. The resultset will be converted
	 * to the List of valueObjects. If no rows were found, an empty List will be returned.
	 *
	 * @param conn         This method requires working database connection.
	 * @param stmt         This parameter contains the SQL statement to be excuted.
	 */
	function listQuery(&$sql) {

		$result = $this->arrayEjecutarConsultaSQL($sql);
		$searchResults = array();
		foreach($result as $row) {
			$temp = $this->createValueObject();

			$temp->setUser($row[0]);
			$temp->setPass($row[1]);
			array_push($searchResults, $temp);
		}

		return $searchResults;
	}
}

?>

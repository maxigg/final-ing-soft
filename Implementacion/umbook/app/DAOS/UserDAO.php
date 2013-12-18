<?php

class UserDAO extends DAO {

	/**
	 * createValueObject-method. This method is used when the Dao class needs
	 * to create new value object instance. The reason why this method exists
	 * is that sometimes the programmer may want to extend also the valueObject
	 * and then this method can be overrided to return extended valueObject.
	 * NOTE: If you extend the valueObject class, make sure to override the
	 * clone() method in it!
	 */

	function load($id) {

		$sql = "SELECT id, user, password, email, path_photo, notifications FROM user WHERE (id = ".$id.") ";
		$result = $this->arrayEjecutarConsultaSQL($sql);

		foreach($result as $row) {
			$temp = new UserModel();
			$temp->setIntId($id);
			$temp->setStrUser($row[1]);
			$temp->setStrPassword($row[2]);
			$temp->setStrEmail($row[3]);
			$temp->setStrPathPhoto($row[4]);
			$temp->setStrNotifications($row[5]);
		}
		return $temp;
	}


	function loadAll() {


		$sql = "SELECT * FROM user ORDER BY id ASC ";

		$searchResults = $this->listQuery($sql);

		return $searchResults;
	}


	function search($query){
		$sql = "SELECT id, user, FROM  `user`
				WHERE
				`user` LIKE  '%".$query."%'
						LIMIT 0 , 30";

		$result = $this->arrayEjecutarConsultaSQL($sql);
		$searchResults = array();
		foreach($result as $row) {		 
			$temp = new UserModel();		 
			$temp->setId($row[0]);
			$temp->setUser($row[1]);			 
			array_push($searchResults, $temp);
		}
		return $searchResults;
	}

	 
	function checkLogin($User) {

		/*var_dump($User);
		exit();*/
		$sql = "SELECT id FROM user where user = '".$User->strUser."' and password='".$User->strPassword."'";
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

		$sql = "INSERT INTO user (name, last_name, email, user, password, birthday) VALUES ( ";
		$sql = $sql."'".$valueObject->getStrName()."', ";
		$sql = $sql."'".$valueObject->getStrLastName()."', ";
		$sql = $sql."'".$valueObject->getStrEmail()."', ";
		$sql = $sql."'".$valueObject->getStrUser()."', ";
		$sql = $sql."'".$valueObject->getStrPassword()."', ";
		$sql = $sql."'".$valueObject->getStrBirthday()."') ";

		$result = $this->boolEjecutarModificacionSQL($sql);

		return $result;
	}

	public function createPathPhoto($pathPhoto){

		$sql = "INSERT INTO user (path_photo) VALUES ( ";
		$sql = $sql."'".$valueObject->getStrPathPhoto()."') ";

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
	function update(&$valueObject) {

		$sql = "UPDATE user SET user = '".$valueObject->getStrUser()."', ";
		$sql = $sql."email = '".$valueObject->getStrEmail()."',";
		$sql = $sql."password = '".$valueObject->getStrPassword()."'";
		$sql = $sql." WHERE (id = ".$valueObject->getIntId().") ";
		$result = $this->boolEjecutarModificacionSQL($sql);

		if ($result != 1) {
			return false;
		}

		return $result;
	}

	function updateProfile(&$valueObject) {

		$sql = "UPDATE user SET user = '".$valueObject->getStrUser()."' ";
		$sql = $sql." WHERE (id = ".Session::get('id').") ";
		 
		$result = $this->boolEjecutarModificacionSQL($sql);
		 
		if ($result != 1) {
			return false;
		}
		return $result;
	}


	function updatePassword(&$valueObject) {

		$sql = "UPDATE user SET password = '".$valueObject->getStrPassword()."'  WHERE (id = ".Session::get('id').")";
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
	function disableById(&$valueObject) {

		if (!$valueObject->getStrId()) {
			return false;
		}
		
		$sql = "UPDATE user SET state=0 WHERE id=".$valueObject->getStrId()."";
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

		$sql = "DELETE FROM user";
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

		$sql = "SELECT count(*) FROM user";
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
		$sql = "SELECT * FROM user WHERE 1=1 ";

		if ($valueObject->getStrId() != 0) {
			if ($first) {
				$first = false;
			}
			$sql = $sql."AND id = ".$valueObject->getStrId()." ";
		}

		if ($valueObject->getStrUser() != "") {
			if ($first) {
				$first = false;
			}
			$sql = $sql."AND user LIKE '".$valueObject->getStrUser()."%' ";
		}

		if ($valueObject->getStrPassword() != "") {
			if ($first) {
				$first = false;
			}
			$sql = $sql."AND password LIKE '".$valueObject->getStrPassword()."%' ";
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

<?php

class UserDAO extends DAO {
	
	/**
	 * create-method. This will create new row in database according to supplied
	 * valueObject contents. Make sure that values for all NOT NULL columns are
	 * correctly specified. Also, if this table does not use automatic surrogate-keys
	 * the primary-key must be specified. After INSERT command this method will
	 * read the generated primary-key back to valueObject if automatic surrogate-keys
	 * were used.
	 *
	 * @param object UserModel         This method requires working database connection.
	 * @param boolean
	 */
	public function create(&$objUser) {

		$sql = "INSERT INTO user (name, last_name, email, user, password, path_photo, birthday) VALUES ( ";
		$sql = $sql."'".$objUser->getStrName()."', ";
		$sql = $sql."'".$objUser->getStrLastName()."', ";
		$sql = $sql."'".$objUser->getStrEmail()."', ";
		$sql = $sql."'".$objUser->getStrUser()."', ";
		$sql = $sql."'".$objUser->getStrPassword()."', ";
		$sql = $sql."'http://localhost/final-ing-soft/Implementacion/umbook/APP/RESOURCES/img/nophoto.jpg', ";
		$sql = $sql."'".$objUser->getStrBirthday()."') ";

		$result = $this->boolEjecutarModificacionSQL($sql);
		//print_r($result);die();
		return $result;
	}

	/**
	 * Checks if user and password are correct
	 *
	 * @param object UserModel
	 * @return object UserModel
	 */
	public function checkLogin(&$user) {

		$sql = "SELECT id, name, last_name, user, password, email, path_photo, birthday, role, notifications, state
		FROM user WHERE user = '".$user->strUser."' AND password='".$user->strPassword."' AND state<>0";
		
		if( !$result = $this->arrayEjecutarConsultaSQL($sql) )
			return false;

		foreach ($result as $row ) {
			//print_r($row);
			$user->setIntId($row[0]);
			$user->setStrName($row[1]);
			$user->setStrLastName($row[2]);
			$user->setStrUser($row[3]);
			$user->setStrPassword($row[4]);
			$user->setStrEmail($row[5]);
			$user->setStrPathPhoto($row[6]);
			$user->setStrBirthday($row[7]);
			$user->setIntRole($row[8]);
			$user->setStrNotifications($row[9]);
			$user->setBooleanState($row[10]);
		}
		return $user;
	}

	/**
	 * Checks the email is already used
	 *
	 * @param object UserModel
	 * @return boolean
	 */
	public function checkEmail(&$objUser) {
		
		$sql = "SELECT `user` FROM user WHERE user = '".$objUser->getStrEmail();
		
		if( !$result = $this->boolEjecutarModificacionSQL($sql) )
			return false;

		return true;
	}

	/**
     * Find groups of an user
     *
     * @param object $objUser 
     *
     * @return object $objUser
     */
	public function getGroups(&$objUser){
		echo __FILE__.__METHOD__." --> NOT IMPLEMENTED";die();
		
		$groups = array();
		return false;
	}

    /**
     * Find users that match the $query pattern
     *
     * @param mixed $query the finding patern
     *
     * @return array obj UserModel
     */
	public function getUsers($search){
		$id = Session::getSessionVariable('objUser')->getIntId();
		
		$sql = "SELECT id, user, name, last_name, path_photo FROM user
				WHERE role=0 AND state<>0 AND id<>".$id." AND (user LIKE '%".$search."%' OR name LIKE '%".$search."%' OR last_name LIKE '%".$search."%')";		
		//echo $sql;die();

		$result = $this->arrayEjecutarConsultaSQL($sql);
		
		if(0 == count($result))
			return false;
		
		$arrayUsers = array();
		foreach($result as $row) {
			$temp = new UserModel();
			$temp->setintId($row[0]);
			$temp->setStrUser($row[1]);
			$temp->setStrName($row[2]);
			$temp->setStrLastName($row[3]);
			$temp->setStrPathPhoto($row[4]);
			array_push($arrayUsers, $temp);
		}
		return $arrayUsers;
	}

	/**
     * Pull friends
     *
     * @param array int
     * @return array object UserModel
     */
	function getUsersById(&$arrayIds){
		if(0 == count($arrayIds))
			return false;
		elseif(1 == count($arrayIds))
			$usersIds = array_shift($arrayIds);
		else
			$usersIds = implode(',', $arrayIds);

		$sql = "SELECT id, user, name, last_name, path_photo FROM user WHERE user.id IN(".$usersIds.")";
		//print_r($sql);die();
		$result = $this->arrayEjecutarConsultaSQL($sql);
		//print_r($result);
		if(0 != count($result)){
			$friends = array();
			foreach($result as $item)
				array_push($friends, $item);
			//print_r($result);
			return $friends;
		}
		return false;
	}

	public function createPathPhoto($pathPhoto){

		$sql = "INSERT INTO user (path_photo) VALUES ( ";
		$sql = $sql."'".$pathPhoto."') ";

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
	function updateProfile(&$objUser) {

		$sql = "UPDATE user SET user = '".$objUser->getStrUser()."', ";
		$sql = $sql."email = '".$objUser->getStrEmail()."', ";
		$sql = $sql."notifications = '".$objUser->getStrNotifications()."', ";
		$sql = $sql."path_photo = '".$objUser->getStrPathPhoto()."' ";
		$sql = $sql."WHERE (id = ".$objUser->getIntId().") ";
		//print_r($sql);die();
		$result = $this->boolEjecutarModificacionSQL($sql);

		return $result;
	}

	function updatePassword(&$objUser) {
		
		$sql = "UPDATE user SET password = '".$objUser->getStrPassword()."'  WHERE (id = ".$objUser->getIntId().")";
		//print_r($sql);die();
		$result = $this->boolEjecutarModificacionSQL($sql);

		return $result;
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



/*****************HELPERS**********************/
	/**
	 * databaseQuery-method. This method is a helper method for internal use. It will execute
	 * all database queries that will return only one row. The resultset will be converted
	 * to valueObject. If no rows were found, NotFoundException will be thrown.
	 *
	 * @param conn         This method requires working database connection.
	 * @param stmt         This parameter contains the SQL statement to be excuted.
	 * @param valueObject  Class-instance where resulting data will be stored.
	 */
	private function singleQuery(&$sql, &$valueObject) {

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
	private function listQuery(&$sql) {

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
/*****************HELPERS**********************/


/*****************ADMINISTRATOR**********************/
	/**
     * List all the users --> Administrator Only
     *
     * @param mixed $query the finding patern
     *
     * @return array of users
     */
	function loadAll() {
		if( 1 == Session::getSessionVariable('role')){
			$sql = "SELECT * FROM user ORDER BY id ASC ";
			$searchResults = $this->listQuery($sql);
			return $searchResults;
		}else 
			return false;
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
	function deleteUser($id = 0) {

		$sql = "DELETE * FROM user WHERE id='".$id."'";
		print_r($sql);die();
		if($result = $this->boolEjecutarModificacionSQL($sql))
			return $result;

		return false;
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
/*****************ADMINISTRATOR**********************/


}

?>

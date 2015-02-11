<?php

class UserModel {
	
	public $intId;
    public $strName;
    public $strLastName;
    public $strEmail;
	public $strUser;
	public $strPassword;
    public $strPathPhoto;
    public $strBirthday;
    public $intRole;
    public $strNotifications;
    public $booleanState;
    public $arrayObjAlbums = array();
    public $arrayObjGroups = array();
    public $arrayObjPublications = array();
    public $arrayObjFriends = array();
    public $arrayObjRequests = array();//sent requests

    /**
     * Transforms requests into Partial Users
     *  SHOULD WORK WITH ONE ITEM INSTEAD OF AN ARRAY!!!!!!!!!!!!!!!
     */
    static public function resultToUserModel(&$result){
        $objUsers = array();
        $objUser = new UserModel();
        foreach ($result as $value) {
            $objUser->setIntId($value['id']);
            $objUser->setStrUser($value['user']);
            $objUser->setStrName($value['name']);
            $objUser->setStrLastName($value['last_name']);
            $objUser->setStrPathPhoto($value['path_photo']);
            array_push($objUsers, $objUser);
            $objUser = new UserModel();
        }
        return $objUsers;
    }

   /**
     * Sets the values of an User in the registration.
     *
     */
    public function setUserModel(){
        $this->setstrName($_POST['name']);
        $this->setstrLastName($_POST['lastname']);
        $this->setstrEmail($_POST['email']);
        $this->setstrUser($_POST['userR']);
        $this->setStrPassword($_POST['passwordR']);
        $this->setstrBirthday($_POST['birthday']);
    }

    /**
     * Gets the value of intId.
     *
     * @return mixed
     */
    public function getIntId()
    {
        return $this->intId;
    }

    /**
     * Sets the value of intId.
     *
     * @param mixed $intId the int id
     *
     * @return self
     */
    public function setIntId($intId)
    {
        $this->intId = $intId;
        return $this;
    }

    /**
     * Gets the value of strName.
     *
     * @return mixed
     */
    public function getStrName()
    {
        return $this->strName;
    }

    /**
     * Sets the value of strName.
     *
     * @param mixed $strName the str name
     *
     * @return self
     */
    public function setStrName($strName)
    {
        $this->strName = $strName;
        return $this;
    }

    /**
     * Gets the value of strLastName.
     *
     * @return mixed
     */
    public function getStrLastName()
    {
        return $this->strLastName;
    }

    /**
     * Sets the value of strLastName.
     *
     * @param mixed $strLastName the str last name
     *
     * @return self
     */
    public function setStrLastName($strLastName)
    {
        $this->strLastName = $strLastName;
        return $this;
    }

    /**
     * Gets the value of strEmail.
     *
     * @return mixed
     */
    public function getStrEmail()
    {
        return $this->strEmail;
    }

    /**
     * Sets the value of strEmail.
     *
     * @param mixed $strEmail the str email
     *
     * @return self
     */
    public function setStrEmail($strEmail)
    {
        $this->strEmail = $strEmail;
        return $this;
    }

    /**
     * Gets the value of strUser.
     *
     * @return mixed
     */
    public function getStrUser()
    {
        return $this->strUser;
    }

    /**
     * Sets the value of strUser.
     *
     * @param mixed $strUser the str user
     *
     * @return self
     */
    public function setStrUser($strUser)
    {
        $this->strUser = $strUser;
        return $this;
    }

    /**
     * Gets the value of strPassword.
     *
     * @return mixed
     */
    public function getStrPassword()
    {
        return $this->strPassword;
    }

    /**
     * Sets the value of strPassword.
     *
     * @param mixed $strPassword the str password
     *
     * @return self
     */
    public function setStrPassword($strPassword)
    {
        $this->strPassword = $strPassword;
        return $this;
    }

    /**
     * Gets the value of strPathPhoto.
     *
     * @return mixed
     */
    public function getStrPathPhoto()
    {
        return $this->strPathPhoto;
    }

    /**
     * Sets the value of strPathPhoto.
     *
     * @param mixed $strPathPhoto the str path photo
     *
     * @return self
     */
    public function setStrPathPhoto($strPathPhoto)
    {
        $this->strPathPhoto = $strPathPhoto;
        return $this;
    }

    /**
     * Gets the value of strBirthday.
     *
     * @return mixed
     */
    public function getStrBirthday()
    {
        return $this->strBirthday;
    }

    /**
     * Sets the value of strBirthday.
     *
     * @param mixed $strBirthday the str birthday
     *
     * @return self
     */
    public function setStrBirthday($strBirthday)
    {
        $this->strBirthday = $strBirthday;
        return $this;
    }

    /**
     * Gets the value of intRol.
     *
     * @return mixed
     */
    public function getIntRole()
    {
        return $this->intRole;
    }

    /**
     * Sets the value of intRol.
     *
     * @param mixed $intRol the int rol
     *
     * @return self
     */
    public function setIntRole($intRol)
    {
        $this->intRole = $intRol;
        return $this;
    }

    /**
     * Gets the value of strNotifications.
     *
     * @return mixed
     */
    public function getStrNotifications()
    {
        return $this->strNotifications;
    }

    /**
     * Sets the value of strNotifications.
     *
     * @param mixed $strNotifications the str notifications
     *
     * @return self
     */
    public function setStrNotifications($strNotifications)
    {
        $this->strNotifications = $strNotifications;
        return $this;
    }

    /**
     * Gets the value of booleanState.
     *
     * @return mixed
     */
    public function getBooleanState()
    {
        return $this->booleanState;
    }

    /**
     * Sets the value of booleanState.
     *
     * @param mixed $booleanState the boolean state
     *
     * @return self
     */
    public function setBooleanState($booleanState)
    {
        $this->booleanState = $booleanState;
        return $this;
    }

    /**
     * Gets the value of ArrayObjAlbums.
     *
     * @return mixed
     */
    public function getArrayObjAlbums()
    {
        return $this->arrayObjAlbums;
    }

    /**
     * Sets the value of ArrayObjAlbums.
     *
     * @param mixed $ArrayObjAlbums the arrayobj album albums
     *
     * @return self
     */
    public function setArrayObjAlbums($ArrayObjAlbums)
    {
        $this->arrayObjAlbums = $ArrayObjAlbums;
        return $this;
    }

    /**
     * Gets the value of ArrayObjGroups.
     *
     * @return mixed
     */
    public function getArrayObjGroups()
    {
        return $this->arrayObjGroups;
    }

    /**
     * Sets the value of ArrayObjGroups.
     *
     * @param mixed $ArrayObjGroups the arrayobj group groups
     *
     * @return self
     */
    public function setArrayObjGroups($ArrayObjGroups)
    {
        $this->arrayObjGroups = $ArrayObjGroups;
        return $this;
    }

    /**
     * Gets the value of ArrayObjPublications.
     *
     * @return mixed
     */
    public function getArrayObjPublications()
    {
        return $this->arrayObjPublications;
    }

    /**
     * Sets the value of ArrayObjPublications.
     *
     * @param mixed $ArrayObjPublications the arrayobj publication publications
     *
     * @return self
     */
    public function setArrayObjPublications($ArrayObjPublications)
    {
        $this->arrayObjPublications = $ArrayObjPublications;
        return $this;
    }

    /**
     * Gets the value of ArrayObjFriends.
     *
     * @return mixed
     */
    public function getArrayObjFriends()
    {
        return $this->arrayObjFriends;
    }

    /**
     * Sets the value of ArrayObjFriends.
     *
     * @param mixed $ArrayObjFriends the arrayobj user friends
     *
     * @return self
     */
    public function setArrayObjFriends($ArrayObjFriends)
    {
        $this->arrayObjFriends = $ArrayObjFriends;
        return $this;
    }

    /**
     * Gets the value of ArrayIntRequests.
     *
     * @return mixed
     */
    public function getArrayObjRequests()
    {
        return $this->arrayObjRequests;
    }

    /**
     * Sets the value of ArrayIntRequests.
     *
     * @param mixed $ArrayIntRequests
     *
     * @return self
     */
    public function setArrayObjRequests($ArrayObjRequests)
    {
        $this->arrayObjRequests = $ArrayObjRequests;
        return $this;
    }

}

?>
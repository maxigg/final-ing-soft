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
    public $arrayobjAlbumAlbums;
    public $arrayobjGroupGroups;
    public $arrayobjPublicationPublications;
    public $arrayobjUserFriends;


    public function setUserModel(){
        $this->setstrName($_POST['name']);
        $this->setstrLastName($_POST['lastname']);
        $this->setstrEmail($_POST['email']);
        $this->setstrUser($_POST['user']);
        $this->setStrPassword($_POST['password']);
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
        return $this->intRol;
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
        $this->intRol = $intRol;

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
     * Gets the value of arrayobjAlbumAlbums.
     *
     * @return mixed
     */
    public function getArrayobjAlbumAlbums()
    {
        return $this->arrayobjAlbumAlbums;
    }

    /**
     * Sets the value of arrayobjAlbumAlbums.
     *
     * @param mixed $arrayobjAlbumAlbums the arrayobj album albums
     *
     * @return self
     */
    public function setArrayobjAlbumAlbums($arrayobjAlbumAlbums)
    {
        $this->arrayobjAlbumAlbums = $arrayobjAlbumAlbums;

        return $this;
    }

    /**
     * Gets the value of arrayobjGroupGroups.
     *
     * @return mixed
     */
    public function getArrayobjGroupGroups()
    {
        return $this->arrayobjGroupGroups;
    }

    /**
     * Sets the value of arrayobjGroupGroups.
     *
     * @param mixed $arrayobjGroupGroups the arrayobj group groups
     *
     * @return self
     */
    public function setArrayobjGroupGroups($arrayobjGroupGroups)
    {
        $this->arrayobjGroupGroups = $arrayobjGroupGroups;

        return $this;
    }

    /**
     * Gets the value of arrayobjPublicationPublications.
     *
     * @return mixed
     */
    public function getArrayobjPublicationPublications()
    {
        return $this->arrayobjPublicationPublications;
    }

    /**
     * Sets the value of arrayobjPublicationPublications.
     *
     * @param mixed $arrayobjPublicationPublications the arrayobj publication publications
     *
     * @return self
     */
    public function setArrayobjPublicationPublications($arrayobjPublicationPublications)
    {
        $this->arrayobjPublicationPublications = $arrayobjPublicationPublications;

        return $this;
    }

    /**
     * Gets the value of arrayobjUserFriends.
     *
     * @return mixed
     */
    public function getArrayobjUserFriends()
    {
        return $this->arrayobjUserFriends;
    }

    /**
     * Sets the value of arrayobjUserFriends.
     *
     * @param mixed $arrayobjUserFriends the arrayobj user friends
     *
     * @return self
     */
    public function setArrayobjUserFriends($arrayobjUserFriends)
    {
        $this->arrayobjUserFriends = $arrayobjUserFriends;

        return $this;
    }
}

?>
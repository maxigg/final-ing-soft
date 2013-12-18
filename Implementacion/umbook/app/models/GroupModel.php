<?php

class GroupModel {
	
	public $intId;
    public $strName;
    public $objUserOwner;
	public $arrayObjUserMembers;
    public $arrayObjPermissionPermissions;

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
     * Gets the value of objUserOwner.
     *
     * @return mixed
     */
    public function getObjUserOwner()
    {
        return $this->objUserOwner;
    }

    /**
     * Sets the value of objUserOwner.
     *
     * @param mixed $objUserOwner the obj user owner
     *
     * @return self
     */
    public function setObjUserOwner($objUserOwner)
    {
        $this->objUserOwner = $objUserOwner;

        return $this;
    }

    /**
     * Gets the value of arrayObjUserMembers.
     *
     * @return mixed
     */
    public function getArrayObjUserMembers()
    {
        return $this->arrayObjUserMembers;
    }

    /**
     * Sets the value of arrayObjUserMembers.
     *
     * @param mixed $arrayObjUserMembers the array obj user members
     *
     * @return self
     */
    public function setArrayObjUserMembers($arrayObjUserMembers)
    {
        $this->arrayObjUserMembers = $arrayObjUserMembers;

        return $this;
    }

    /**
     * Gets the value of arrayObjPermissionPermissions.
     *
     * @return mixed
     */
    public function getArrayObjPermissionPermissions()
    {
        return $this->arrayObjPermissionPermissions;
    }

    /**
     * Sets the value of arrayObjPermissionPermissions.
     *
     * @param mixed $arrayObjPermissionPermissions the array obj permission permissions
     *
     * @return self
     */
    public function setArrayObjPermissionPermissions($arrayObjPermissionPermissions)
    {
        $this->arrayObjPermissionPermissions = $arrayObjPermissionPermissions;

        return $this;
    }
}

?>
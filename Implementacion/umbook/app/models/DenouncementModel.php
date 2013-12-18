<?php

class DenouncementModel {
	
	public $intId;
    public $objUserUser;
    public $intIdResource;
  
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
     * Gets the value of objUserUser.
     *
     * @return mixed
     */
    public function getObjUserUser()
    {
        return $this->objUserUser;
    }

    /**
     * Sets the value of objUserUser.
     *
     * @param mixed $objUserUser the obj user user
     *
     * @return self
     */
    public function setObjUserUser($objUserUser)
    {
        $this->objUserUser = $objUserUser;

        return $this;
    }

    /**
     * Gets the value of intIdResource.
     *
     * @return mixed
     */
    public function getIntIdResource()
    {
        return $this->intIdResource;
    }

    /**
     * Sets the value of intIdResource.
     *
     * @param mixed $intIdResource the int id resource
     *
     * @return self
     */
    public function setIntIdResource($intIdResource)
    {
        $this->intIdResource = $intIdResource;

        return $this;
    }
}

?>
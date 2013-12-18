<?php

class NotificationModel {
	
	public $intId;
    public $objUSerUser;
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
     * Gets the value of objUSerUser.
     *
     * @return mixed
     */
    public function getObjUSerUser()
    {
        return $this->objUSerUser;
    }

    /**
     * Sets the value of objUSerUser.
     *
     * @param mixed $objUSerUser the obj u ser user
     *
     * @return self
     */
    public function setObjUSerUser($objUSerUser)
    {
        $this->objUSerUser = $objUSerUser;

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
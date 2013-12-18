<?php

class CommentModel {
	
	public $intId;
    public $strMessage;
    public $strData;
    public $intIdResource;
	public $objUserOwner;

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
     * Gets the value of strMessage.
     *
     * @return mixed
     */
    public function getStrMessage()
    {
        return $this->strMessage;
    }

    /**
     * Sets the value of strMessage.
     *
     * @param mixed $strMessage the str message
     *
     * @return self
     */
    public function setStrMessage($strMessage)
    {
        $this->strMessage = $strMessage;

        return $this;
    }

    /**
     * Gets the value of strData.
     *
     * @return mixed
     */
    public function getStrData()
    {
        return $this->strData;
    }

    /**
     * Sets the value of strData.
     *
     * @param mixed $strData the str data
     *
     * @return self
     */
    public function setStrData($strData)
    {
        $this->strData = $strData;

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
}

?>
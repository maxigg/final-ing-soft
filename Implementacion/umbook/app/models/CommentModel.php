<?php

class CommentModel {
	
	private $intId;
    private $intIdResource;
    private $objUserOwner;
    private $strMessage;
    private $strDate;
    private $intResourceType; // 1-> Publication | 2->Picture
	

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
     * Gets the value of strDate.
     *
     * @return mixed
     */
    public function getStrDate()
    {
        return $this->strDate;
    }

    /**
     * Sets the value of strDate.
     *
     * @param mixed $strDate the str date
     *
     * @return self
     */
    public function setStrDate($strDate)
    {
        $this->strDate = $strDate;

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

    /**
     * Gets the Resource Type.
     *
     * @return mixed
     */
    public function getIntResourceType()
    {
        return $this->intResourceType;
    }

    /**
     * Sets the Resource Type.
     *
     * @param mixed $intResourceType the int Type id
     *
     * @return self
     */
    public function setIntResourceType($intResourceType)
    {
        $this->intResourceType = $intResourceType;

        return $this;
    }

}

?>
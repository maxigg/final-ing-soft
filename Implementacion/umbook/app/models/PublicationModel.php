<?php

class PublicationModel {
	
	private $intId;
    private $intIdOwner;
    private $strDate;
	private $strMessage;
	private $arrayObjComments;

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
     * Gets the value of strOwner.
     *
     * @return mixed
     */
    public function getIntIdOwner()
    {
        return $this->intIdOwner;
    }

    /**
     * Sets the value of intIdOwner.
     *
     * @param mixed $intIdOwner the Id of the owner
     *
     * @return self
     */
    public function setIntIdOwner($intIdOwner)
    {
        $this->intIdOwner = $intIdOwner;

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
     * Gets the value of arrayObjComments.
     *
     * @return mixed
     */
    public function getArrayObjComments()
    {
        return $this->arrayObjComments;
    }

    /**
     * Sets the value of arrayObjComments.
     *
     * @param mixed $arrayObjComments the array obj Comments
     *
     * @return self
     */
    public function setArrayObjComments($arrayObjComments)
    {
        $this->arrayObjComments = $arrayObjComments;

        return $this;
    }
}

?>
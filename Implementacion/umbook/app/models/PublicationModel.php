<?php

class PublicationModel {
	
	public $intId;
    public $strOwner;
    public $strPublisher;
    public $strDate;
	public $strMessage;
	public $arrayObjCommentComments;

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
    public function getStrOwner()
    {
        return $this->strOwner;
    }

    /**
     * Sets the value of strOwner.
     *
     * @param mixed $strOwner the str owner
     *
     * @return self
     */
    public function setStrOwner($strOwner)
    {
        $this->strOwner = $strOwner;

        return $this;
    }

    /**
     * Gets the value of strPublisher.
     *
     * @return mixed
     */
    public function getStrPublisher()
    {
        return $this->strPublisher;
    }

    /**
     * Sets the value of strPublisher.
     *
     * @param mixed $strPublisher the str publisher
     *
     * @return self
     */
    public function setStrPublisher($strPublisher)
    {
        $this->strPublisher = $strPublisher;

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
     * Gets the value of arrayObjCommentComments.
     *
     * @return mixed
     */
    public function getArrayObjCommentComments()
    {
        return $this->arrayObjCommentComments;
    }

    /**
     * Sets the value of arrayObjCommentComments.
     *
     * @param mixed $arrayObjCommentComments the array obj commentComments
     *
     * @return self
     */
    public function setArrayObjCommentComments($arrayObjCommentComments)
    {
        $this->arrayObjCommentComments = $arrayObjCommentComments;

        return $this;
    }
}

?>
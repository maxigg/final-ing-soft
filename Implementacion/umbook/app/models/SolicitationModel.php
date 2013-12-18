<?php

class SolicitationModel {
	
	public $intId;
    public $intState;
    public $objUserOwner;
	public $objUserReceiver;

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
     * Gets the value of intState.
     *
     * @return mixed
     */
    public function getIntState()
    {
        return $this->intState;
    }

    /**
     * Sets the value of intState.
     *
     * @param mixed $intState the int state
     *
     * @return self
     */
    public function setIntState($intState)
    {
        $this->intState = $intState;

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
     * Gets the value of objUserReceiver.
     *
     * @return mixed
     */
    public function getObjUserReceiver()
    {
        return $this->objUserReceiver;
    }

    /**
     * Sets the value of objUserReceiver.
     *
     * @param mixed $objUserReceiver the obj user receiver
     *
     * @return self
     */
    public function setObjUserReceiver($objUserReceiver)
    {
        $this->objUserReceiver = $objUserReceiver;

        return $this;
    }
}

?>
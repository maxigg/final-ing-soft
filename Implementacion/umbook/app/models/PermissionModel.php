<?php

class PermissionModel {
	
	public $intId;
    public $booleanRead;
    public $booleanWrite;
	public $intIdResource;
    public $intIdGroup;

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
     * Gets the value of booleanRead.
     *
     * @return mixed
     */
    public function getBooleanRead()
    {
        return $this->booleanRead;
    }

    /**
     * Sets the value of booleanRead.
     *
     * @param mixed $booleanRead the boolean read
     *
     * @return self
     */
    public function setBooleanRead($booleanRead)
    {
        $this->booleanRead = $booleanRead;

        return $this;
    }

    /**
     * Gets the value of booleanWrite.
     *
     * @return mixed
     */
    public function getBooleanWrite()
    {
        return $this->booleanWrite;
    }

    /**
     * Sets the value of booleanWrite.
     *
     * @param mixed $booleanWrite the boolean write
     *
     * @return self
     */
    public function setBooleanWrite($booleanWrite)
    {
        $this->booleanWrite = $booleanWrite;

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
     * Gets the value of intIdGroup.
     *
     * @return mixed
     */
    public function getIntIdGroup()
    {
        return $this->intIdGroup;
    }

    /**
     * Sets the value of intIdGroup.
     *
     * @param mixed $intIdGroup the int id group
     *
     * @return self
     */
    public function setIntIdGroup($intIdGroup)
    {
        $this->intIdGroup = $intIdGroup;

        return $this;
    }
}

?>
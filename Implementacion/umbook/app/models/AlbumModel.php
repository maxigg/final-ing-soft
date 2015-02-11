<?php

class AlbumModel {
	
	public $intId;
    public $strName;
    public $objUserOwner;
	public $arrayObjPictures = array();

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
     * Gets the value of arrayObjPictures.
     *
     * @return mixed
     */
    public function getarrayObjPictures()
    {
        return $this->arrayObjPictures;
    }

    /**
     * Sets the value of arrayObjPictures.
     *
     * @param mixed $arrayObjPictures the array obj picturePictures
     *
     * @return self
     */
    public function setarrayObjPictures($arrayObjPictures)
    {
        $this->arrayObjPictures = $arrayObjPictures;

        return $this;
    }
}

?>
<?php

class AlbumModel {
	
	public $intId;
    public $strName;
    public $objUserOwner;
	public $arrayObjPicturePictures;

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
     * Gets the value of arrayObjPicturePictures.
     *
     * @return mixed
     */
    public function getArrayObjPicturePictures()
    {
        return $this->arrayObjPicturePictures;
    }

    /**
     * Sets the value of arrayObjPicturePictures.
     *
     * @param mixed $arrayObjPicturePictures the array obj picturePictures
     *
     * @return self
     */
    public function setArrayObjPicturePictures($arrayObjPicturePictures)
    {
        $this->arrayObjPicturePictures = $arrayObjPicturePictures;

        return $this;
    }
}

?>
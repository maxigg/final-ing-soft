<?php

class PictureModel {
	
	public $intId;
    public $strDescription;
    public $strPath;
    public $intIdAlbum;
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
     * Gets the value of strDescription.
     *
     * @return mixed
     */
    public function getStrDescription()
    {
        return $this->strDescription;
    }

    /**
     * Sets the value of strDescription.
     *
     * @param mixed $strDescription the str description
     *
     * @return self
     */
    public function setStrDescription($strDescription)
    {
        $this->strDescription = $strDescription;

        return $this;
    }

    /**
     * Gets the value of strPath.
     *
     * @return mixed
     */
    public function getStrPath()
    {
        return $this->strPath;
    }

    /**
     * Sets the value of strPath.
     *
     * @param mixed $strPath the str path
     *
     * @return self
     */
    public function setStrPath($strPath)
    {
        $this->strPath = $strPath;

        return $this;
    }

    /**
     * Gets the value of intIdAlbum.
     *
     * @return mixed
     */
    public function getIntIdAlbum()
    {
        return $this->intIdAlbum;
    }

    /**
     * Sets the value of intIdAlbum.
     *
     * @param mixed $intIdAlbum the int id album
     *
     * @return self
     */
    public function setIntIdAlbum($intIdAlbum)
    {
        $this->intIdAlbum = $intIdAlbum;

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
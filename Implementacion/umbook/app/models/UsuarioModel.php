<?php

class UsuarioModel {
	
	public $intId;
	public $strUser;
	public $strPass;
			
	public function setLogin($strUser,$strPass){
		$this->strUser = $strUser;
		$this->strPass = $strPass;
	}

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
     * Gets the value of strUser.
     *
     * @return mixed
     */
    public function getStrUser()
    {
        return $this->strUser;
    }

    /**
     * Sets the value of strUser.
     *
     * @param mixed $strUser the str user
     *
     * @return self
     */
    public function setStrUser($strUser)
    {
        $this->strUser = $strUser;

        return $this;
    }

    /**
     * Gets the value of strPass.
     *
     * @return mixed
     */
    public function getStrPass()
    {
        return $this->strPass;
    }

    /**
     * Sets the value of strPass.
     *
     * @param mixed $strPass the str pass
     *
     * @return self
     */
    public function setStrPass($strPass)
    {
        $this->strPass = $strPass;

        return $this;
    }
}

?>
<?php

/**
 * Class Ampersand_Testing_Model_Observers_Testing
 */
class Ampersand_Testing_Model_Observers_Testing
{
    /**
     * @author Daniel Doyle <dd@amp.co>
     *
     * @return $this
     */
    public function getSelf()
    {
        return $this;
    }

    /**
     * Add 2 numbers together
     *
     * @author Daniel Doyle <dd@amp.co>
     *
     * @param integer $aNumber First number
     * @param integer $bNumber Last number
     * @return integer
     */
    public function add($aNumber, $bNumber)
    {
        return $aNumber + $bNumber;
    }

    /**
     * Subtract 2 numbers together
     *
     * @author Daniel Doyle <dd@amp.co>
     *
     * @param integer $aNumber First number
     * @param integer $bNumber Second number
     * @return integer
     */
    public function subtract($aNumber, $bNumber)
    {
        return $aNumber - $bNumber;
    }
}

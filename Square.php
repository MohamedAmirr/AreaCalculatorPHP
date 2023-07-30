<?php
include_once('CalculateAreaInterface.php');

class Square implements calculateArea
{
    private $sides;

    /**
     * @throws ErrorException
     */
    function __construct($sides1)
    {
        $this->sides = array();
        $this->sides = array_values(array_merge($this->sides, $sides1));
        if (sizeof($sides1) != 4) {
            throw new ErrorException("That's Not Square!");
        }
        for ($i = 1; $i < sizeof($this->sides); $i++) {
            if ($this->sides[$i] != $this->sides[$i - 1]) {
                throw new ErrorException("That's not square!");
            }
        }
    }

    public function calculate()
    {
        return $this->sides[0] * $this->sides[1];
    }
}
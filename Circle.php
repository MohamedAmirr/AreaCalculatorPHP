<?php
include_once('CalculateAreaInterface.php');

class Circle implements calculateArea
{
    private $sides;

    /**
     * @throws ErrorException
     */
    function __construct($sides1)
    {
        $this->sides = array();
        $this->sides = array_values(array_merge($this->sides, $sides1));

        if (count($this->sides) > 1)
            throw new ErrorException("That's not circle!");
    }

    public function calculate()
    {
        return (3.14 * $this->sides[0]);
    }
}
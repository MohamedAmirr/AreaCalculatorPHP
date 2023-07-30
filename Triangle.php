<?php
include_once('CalculateAreaInterface.php');

class Triangle implements calculateArea
{
    private $sides;

    /**
     * @throws ErrorException
     */

    function __construct($sides1)
    {
        if (sizeof($sides1) != 3) {
            throw new ErrorException("That's Not Triangle!");
        }
        $this->sides = array();
        $this->sides = array_values(array_merge($this->sides, $sides1));
    }

    public function calculate()
    {
        $s = 0;
        foreach ($this->sides as $side) {
            $s += $side;
        }

        $s /= 2;
        $ans = $s;

        foreach ($this->sides as $side)
            $ans *= ($s - $side);

        return sqrt($ans);
    }
}
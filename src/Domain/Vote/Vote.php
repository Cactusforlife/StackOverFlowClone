<?php

namespace App\Domain\Vote;


class Vote
{
    private $value;

    private CONST POSITIVE=1;
    private CONST NEGATIVE=0;

    private function __construct( bool $value)
    {
        $this->value=$value;
    }

    public static function positive()
    {
        return new vote ((bool) self::POSITIVE);
    }

    public static function negative()
    {
        return new vote ((bool) self::NEGATIVE);
    }


    public function isPositive()
    {
        return $this->value;
    }

    public function isNegative()
    {
        return $this->value;
    }




}
<?php

namespace App\Domain\Vote;


class Vote implements \JsonSerializable
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


    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'value' => $this->value,
        ];
    }
}
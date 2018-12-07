<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Vote;
/**
 * Vote
 *
 * @package App\Domain
 */
final class Vote
{
    private CONST POSITIVE = 1;

    private CONST NEGATIVE = 0;

    private $value;

    /**
     * Vote constructor.
     * @param bool $value
     */
    private function __construct(bool $value)
    {
        $this->value = $value;
    }

    /**
     * @return Vote
     */
    public static function positive() :Vote
    {
        return new Vote((boolean) self::POSITIVE);
    }

    /**
     * @return Vote
     */
    public static function negative() :Vote
    {
        return new Vote((boolean) self::NEGATIVE);
    }
}


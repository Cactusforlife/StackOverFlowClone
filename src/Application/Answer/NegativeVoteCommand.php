<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 25-12-2018
 * Time: 14:31
 */

namespace App\Application\Answer;


use App\Domain\Answer\AnswerId;

class NegativeVoteCommand
{
    private $answerId;

    /**
     * NegativeVoteCommand constructor.
     * @param $answerId
     */
    public function __construct(AnswerId $answerId)
    {
        $this->answerId = $answerId;
    }

    /**
     * @return AnswerId
     */
    public function getAnswerId(): AnswerId
    {
        return $this->answerId;
    }



}
<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 25-12-2018
 * Time: 14:15
 */

namespace App\Application\Answer;


use App\Domain\Answer\AnswerId;

class PositiveVoteCommand
{
    private $answersId;

    /**
     * PositiveVoteCommand constructor.
     * @param $answersId
     */
    public function __construct(AnswerId $answersId)
    {
        $this->answersId = $answersId;
    }

    /**
     * @return AnswerId
     */
    public function getAnswersId(): AnswerId
    {
        return $this->answersId;
    }

}
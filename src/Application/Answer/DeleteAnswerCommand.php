<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 23:03
 */

namespace App\Application\Answer;


use App\Domain\Answer\AnswerId;


class DeleteAnswerCommand
{
   private $answerId;

    /**
     * DeleteAnswerCommand constructor.
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
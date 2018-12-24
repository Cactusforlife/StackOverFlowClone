<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 23:56
 */

namespace App\Application\Question;


use App\Domain\Question\QuestionId;

class DeleteQuestionCommand
{
    private $questionId;

    /**
     * DeleteQuestionCommand constructor.
     * @param $questionId
     */
    public function __construct(QuestionId $questionId)
    {
        $this->questionId = $questionId;
    }

    /**
     * @return QuestionId
     */
    public function getQuestionId(): QuestionId
    {
        return $this->questionId;
    }
}
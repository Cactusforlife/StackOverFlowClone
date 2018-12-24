<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 23:59
 */

namespace App\Application\Question;


use App\Repository\QuestionRepository;

class DeleteQuestionHandler
{
    private $questionRepository;

    /**
     * DeleteQuestionHandler constructor.
     * @param $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function handler(DeleteQuestionCommand $command)
    {
        $question = $this->questionRepository->withQuestionId($command->getQuestionId());
        return $this->questionRepository->remove($question);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 24-12-2018
 * Time: 17:48
 */

namespace App\Application\Question;


use App\Repository\QuestionRepository;

class UpdateQuestionHandler
{
    private $questionRepository;

    /**
     * UpdateQuestionHandler constructor.
     * @param $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function handler(UpdateQuestionCommand $command)
    {
        $question = $this->questionRepository->withQuestionId($command->getQuestionId());
        $question->update_title_and_body($command->getTitle(),$command->getBody());

        $this->questionRepository->update($question);
    }

}
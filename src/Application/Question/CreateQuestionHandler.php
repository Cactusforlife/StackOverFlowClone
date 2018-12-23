<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 17:13
 */

namespace App\Application\Question;


use App\Domain\Question\Question;
use App\Repository\QuestionRepository;

class CreateQuestionHandler
{
    private $questionRepository;

    /**
     * CreateQuestionHandler constructor.
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * @param CreateQuestionCommand $command
     * @return mixed
     * @throws \Exception
     */
    public function Handler(CreateQuestionCommand $command)
    {
        $question = new Question($command->getTitle(),$command->getBody(), $command->getTags(), $command->getUser());
        return $this->questionRepository->add($question);
    }


}
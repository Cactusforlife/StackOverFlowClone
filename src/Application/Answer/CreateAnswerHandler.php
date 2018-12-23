<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 16:29
 */

namespace App\Application\Answer;


use App\Domain\Answer\Answer;
use App\Repository\AnswerRepository;

class CreateAnswerHandler
{
    private $answerRepository;

    /**
     * CreateAnswerHandler constructor.
     * @param $answerRepository
     */
    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    /**
     * @param CreateAnswerCommand $command
     * @return mixed
     * @throws \Exception
     */
    public function handler(CreateAnswerCommand $command)
    {
        $answer = new Answer($command->getBody(),$command->getQuestion(),$command->getUser());
        return $this->answerRepository->add($answer);
    }

}
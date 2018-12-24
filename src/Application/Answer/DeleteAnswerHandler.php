<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 23:06
 */

namespace App\Application\Answer;


use App\Repository\AnswerRepository;

class DeleteAnswerHandler
{
    private $answerRepository;

    /**
     * DeleteAnswerHandler constructor.
     * @param $answerRepository
     */
    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function handler(DeleteAnswerCommand $command)
    {
        $answer = $this->answerRepository->withAnswerId($command->getAnswerId());

        return $this->answerRepository->remove($answer);
    }

}
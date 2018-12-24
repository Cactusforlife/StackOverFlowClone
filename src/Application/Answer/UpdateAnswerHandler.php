<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 24-12-2018
 * Time: 16:39
 */

namespace App\Application\Answer;


use App\Repository\AnswerRepository;

class UpdateAnswerHandler
{
    private $answerRepository;

    /**
     * UpdateAnswerHandler constructor.
     * @param $answerRepository
     */
    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function handler(UpdateAnswerCommand $command)
    {
        $answer= $this->answerRepository->withAnswerId($command->getAnswerId());

        $answer->update_body($command->getBody());

        $this->answerRepository->update($answer);
    }


}

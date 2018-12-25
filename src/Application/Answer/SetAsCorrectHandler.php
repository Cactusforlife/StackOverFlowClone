<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 25-12-2018
 * Time: 14:07
 */

namespace App\Application\Answer;


use App\Repository\AnswerRepository;

class SetAsCorrectHandler
{
    private $answersRepository;

    /**
     * SetAsCorrectHandler constructor.
     * @param $answersRepository
     */
    public function __construct(AnswerRepository $answersRepository)
    {
        $this->answersRepository = $answersRepository;
    }

    public function handler(SetAsCorrectCommand $command)
    {
        $answer = $this->answersRepository->withAnswerId($command->getAnswerId());
        $answer->setAsCorrect();

        $this->answersRepository->setAsCorrect($answer);
    }

}
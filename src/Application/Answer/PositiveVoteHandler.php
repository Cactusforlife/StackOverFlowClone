<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 25-12-2018
 * Time: 14:26
 */

namespace App\Application\Answer;


use App\Repository\AnswerRepository;

class PositiveVoteHandler
{
    private $answersRepository;

    /**
     * PositiveVoteHandler constructor.
     * @param $answersRepository
     */
    public function __construct(AnswerRepository $answersRepository)
    {
        $this->answersRepository = $answersRepository;
    }

    public function handler(PositiveVoteCommand $command)
    {
        $answer = $this->answersRepository->withAnswerId($command->getAnswersId());
        $vote = true;
        $answer->addVote($vote);

        $this->answersRepository->voteUp($answer);
    }

}
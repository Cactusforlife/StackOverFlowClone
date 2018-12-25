<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 25-12-2018
 * Time: 14:35
 */

namespace App\Application\Answer;


use App\Repository\AnswerRepository;

class NegativeVoteHandler
{
    private $answersRepository;

    /**
     * NegativeVoteHandler constructor.
     * @param $answersRepository
     */
    public function __construct(AnswerRepository $answersRepository)
    {
        $this->answersRepository = $answersRepository;
    }

    public function handler(NegativeVoteCommand $command)
    {
        $answer = $this->answersRepository->withAnswerId($command->getAnswerId());
        $vote = false;
        $answer->addVote($vote);

        $this->answersRepository->voteDown($answer);
    }

}
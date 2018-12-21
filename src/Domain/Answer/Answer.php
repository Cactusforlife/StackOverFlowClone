<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Answer;

use App\Domain\Vote\Vote;
use DateTimeImmutable;
use App\Domain\Question\Question;
use App\Domain\UserManagement\User;

/**
 * Answer
 *
 * @package App\Domain\Answer
 */
class Answer
{
    private $answerId;
    private $body;
    private $question;
    private $correctAnswer;
    private $date;
    private $user;
    private $votes;
    private $positiveVote;
    private $negativeVote;

    /**
     * Answer constructor.
     * @param String $body
     * @param Question $question
     * @param User $user
     * @throws \Exception
     */

    public function __construct(String $body, Question $question, User $user)
    {
        $this->answerId = new AnswerId();
        $this->body = $body;
        $this->question = $question;
        $this->correctAnswer = false;
        $this->user = $user;
        $this->votes = $votes = array();
        $this->date = new DateTimeImmutable('2000-01-01');
        $this->positiveVote = true;
        $this->negativeVote = false;
    }

    /**
     * @return AnswerId
     */
    public function getAnswerId(): AnswerId
    {
        return $this->answerId;
    }

    /**
     * @return String
     */
    public function getBody(): String
    {
        return $this->body;
    }

    /**
     * @return Question
     */
    public function getQuestion(): Question
    {
        return $this->question;
    }

    /**
     * @return bool
     */
    public function isCorrectAnswer(): bool
    {
        return $this->correctAnswer;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getVotes(): array
    {
        return $this->votes;
    }

    /**
     * @return bool
     */
    public function isPositiveVote(): bool
    {
        return $this->positiveVote;
    }
    /**
     * @return bool
     */
    public function isNegativeVote(): bool
    {
        return $this->negativeVote;
    }

    public function update_body($body)
    {
        return $this->body = $body;
    }

    public function setAsCorrect(): bool
    {
        return $this->correctAnswer= true;
    }

    public function addVote($vote)
    {
        if($vote == true)
        {
           return $this->votes = $vote;
        }

        if($vote == false)
        {
            return $this->votes = $vote;
        }
    }






}

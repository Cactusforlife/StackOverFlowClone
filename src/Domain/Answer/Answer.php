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
class Answer implements \JsonSerializable
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
        $this->positiveVote = 0;
        $this->negativeVote = 0;
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
     * @return int
     */
    public function getPositiveVotes(): int
    {
        return $this->positiveVote;
    }

    /**
     * @return int
     */
    public function getNegativeVotes(): int
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


    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
       return [
            'answerId' => $this->getAnswerId(),
            'question' => $this->question,
            'user' => $this->user,
            'body' => $this->body,
            'datePublished' => $this->getDate(),
            'correctAnswer' => $this->correctAnswer,
            'positiveVotes' => $this->positiveVote,
            'negativeVotes' => $this->negativeVote,
        ];
    }
}

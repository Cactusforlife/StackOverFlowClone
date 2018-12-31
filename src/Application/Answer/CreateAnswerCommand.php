<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 16:21
 */

namespace App\Application\Answer;


use App\Domain\Question\Question;
use App\Domain\UserManagement\User;

class CreateAnswerCommand
{
    private $question;
    private $body;
    private $user;

    /**
     * CreateAnswerCommand constructor.
     * @param $question
     * @param $body
     * @param $user
     */
     public function __construct(String $body, Question $question, User $user)
    {
        $this->question = $question;
        $this->body = $body;
        $this->user = $user;
    }

    /**
     * @return Question
     */
    public function getQuestion(): Question
    {
        return $this->question;
    }

    /**
     * @return String
     */
    public function getBody(): String
    {
        return $this->body;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }





}
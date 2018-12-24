<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 24-12-2018
 * Time: 16:36
 */

namespace App\Application\Answer;


use App\Domain\Answer\AnswerId;

class UpdateAnswerCommand
{
    private $body;

    /**
     * UpdateAnswerCommand constructor.
     * @param $answerId
     * @param $body
     */
    public function __construct(AnswerId $answerId, String $body)
    {
        $this->answerId = $answerId;
        $this->body = $body;
    }

    /**
     * @return AnswerId
     */
    public function getAnswerId(): AnswerId
    {
        return $this->answerId;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }


}
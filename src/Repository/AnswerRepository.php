<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 16:39
 */

namespace App\Repository;


use App\Domain\Answer\Answer;
use App\Domain\Answer\AnswerId;

interface AnswerRepository
{
    public function add(Answer $answer);

    public function remove(Answer $answer);

    public function update(Answer $answer);

    public function withAnswerId(AnswerId $answerId): Answer;

    public function setAsCorrect(Answer $answer);

    public function voteUp(Answer $answer);

    public function voteDown(Answer $answer);
}
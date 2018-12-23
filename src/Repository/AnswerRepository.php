<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 16:39
 */

namespace App\Repository;


use App\Domain\Answer\Answer;

interface AnswerRepository
{
    public function add(Answer $answer);
}
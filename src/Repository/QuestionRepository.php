<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 17:11
 */

namespace App\Repository;


use App\Domain\Question\Question;

interface QuestionRepository
{
    public function add(Question $question);
}
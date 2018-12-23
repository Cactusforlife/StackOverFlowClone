<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23-12-2018
 * Time: 16:21
 */

namespace App\Application\Question;


use App\Domain\UserManagement\User;

class CreateQuestionCommand
{
    private $title;
    private $body;
    private $tags;
    private $user;

    /**
     * CreateQuestionCommand constructor.
     * @param $title
     * @param $body
     * @param $tags
     * @param $user
     */
    public function __construct(String $title, String $body, array $tags, User $user)
    {
        $this->title = $title;
        $this->body = $body;
        $this->tags = $tags;
        $this->user = $user;
    }


    /**
     * @return String
     */
    public function getTitle(): String
    {
        return $this->title;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }



}
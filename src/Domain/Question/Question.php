<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Question;

use App\Domain\Answer\Answer;
use App\Domain\Tag\Tag;
use App\Domain\UserManagement\User;
use DateTimeImmutable;


/**
 * Question
 *
 * @package App\Domain\Question
 */
 class Question implements \JsonSerializable
 {
     /**
      * @var QuestionId
      *
      * @ORM\Id
      * @ORM\GeneratedValue(strategy="NONE")
      * @ORM\Column(type="QuestionId", name="id")
      */
     private $questionId;
     /**
      * @var string
      * @ORM\Column(type="string")
      */
     private $title;
     /**
      * @var array
      * @ORM\Column(type="Array")
      */
     private $answers;
     /**
      * @var string
      * @ORM\Column(type="string")
      */
     private $body;
     /**
      * @var array
      * @ORM\Column(type="Array")
      */
     private $tags;
     /**
      * @ORM\ManyToOne(targetEntity="App\Domain\UserManagement\User")
      */
     private $user;
     /**
      * @var DateTimeImmutable
      * @ORM\Column(type="datetime_imutable")
      */
     private $date;


     /**
      * Question constructor.
      * @param String $title
      * @param String $body
      * @param array $tags
      * @param User $user
      * @throws \Exception
      */
     public function __construct(String $title, String $body, array $tags, User $user)
     {
         $this->questionId = new QuestionId();
         $this->title = $title;
         $this->body = $body;
         $this->answers = $answers = array();
         $this->tags = $tags;
         $this->user = $user;
         $this->date = new DateTimeImmutable('2000-01-01');
     }

     /**
      * @return QuestionId
      */
     public function getQuestionId(): QuestionId
     {
         return $this->questionId;
     }

     /**
      * @return array
      */
     public function getAnswers(): array
     {
         return $this->answers;
     }

     /**
      * @return String
      */
     public function getTitle(): String
     {
         return $this->title;
     }

     /**
      * @return String
      */
     public function getBody(): String
     {
         return $this->body;
     }

     /**
      * @return array
      */
     public function getTags(): array
     {
         return $this->tags;
     }

     /**
      * @return User
      */
     public function getUser(): User
     {
         return $this->user;
     }

     /**
      * @return DateTimeImmutable
      */
     public function getDate(): DateTimeImmutable
     {
         return $this->date;
     }

     public function addTag(Tag $tag)
     {
         array_push($this->tags, $tag);
         return $this->tags;
     }

     public function addTags(array $tags)
     {
         foreach ($tags as $tag) $this->addTag($tag);
         return $tags;

     }

     public function update_title(String $title)
     {
         return $this->title = $title;
     }

     public function update_body(String $body)
     {
         return $this->body = $body;
     }

     public function update_title_and_body($title, $body)
     {
         $this->title = $title;
         $this->body = $body;
     }

     public function addAnswer(Answer $answer)
     {
         array_push($this->answers, $answer);
         return $this->answers;
     }

     public function removeAnswer($answer)
     {
         $key = array_search($answer, $this->answers);

         unset($this->answers[$key]);

         return $this->answers;

     }
     public function correctAnswer()
     {
         foreach ($this->answers as $value)
         {
             if ($value->isCorrectAnswer()==true)
                 return $value;
         }
         return false;
     }

     public function jsonSerialize()
     {
         return [

             'questionId' => $this->questionId,
             'user' => $this->user,
             'title' => $this->title,
             'body' => $this->body,
             'tags' => $this->tags,
             'datePublished' => $this->getDate(),
             'answersGiven' => $this->answers,
         ];
     }







}

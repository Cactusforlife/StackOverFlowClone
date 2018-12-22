<?php

namespace spec\App\Domain\Question;

use App\Domain\Answer\Answer;
use App\Domain\Question\Question;
use App\Domain\Tag\Tag;
use App\Domain\UserManagement\User;
use DateTimeImmutable;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuestionSpec extends ObjectBehavior
{
    private $title;
    private $body;
    private $date;

    /**
     * @param User $user
     * @param Tag $tag
     * @param Answer $answer
     * @throws \Exception
     */
    function let(User $user, Tag $tag, Answer $answer)
    {
        $this->title = 'This is a title';
        $this->body = 'this is another body';
        $answers=[$answer->getWrappedObject()];
        $tags=[$tag->getWrappedObject()];
        $this->date = new DateTimeImmutable('2000-01-01');
        $this->beConstructedWith($this->title,$this->body,$tags,$user->getWrappedObject());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Question::class);
    }

    function it_can_add_a_tag(Tag $tag)
    {
        $this->addTag($tag)->shouldBeArray();
    }

    function it_has_a_date()
    {
        $this->getDate()->shouldBeAnInstanceOf(DateTimeImmutable::class);
    }

    function it_can_add_tags(Tag $tag)
    {
        $tags = [$tag];
        $this->addTags($tags)->shouldBeArray();
    }

    function it_can_update_title()
    {
        $title = $this->title;
        $this->update_title($title)->shouldBe($this->title);
        $this->getTitle()->shouldBe($this->title);
    }

    function it_can_update_body()
    {
        $body = $this->body;
        $this->update_body($body)->shouldBe($this->body);
        $this->getBody()->shouldBe($this->body);
    }

    function it_can_add_an_answer(Answer $answer)
    {
        $this->addAnswer($answer)->shouldBeArray();
    }
    function it_can_remove_an_answer(Answer $answer)
    {
        $this->removeAnswer($answer)->shouldNotBe($answer);
    }

    function it_has_a_correct_answer(Answer $answer1, Answer $answer2)
    {
        $answer1->isCorrectAnswer()->willReturn(true);
        $answer2->isCorrectAnswer()->willReturn(false);

        $this->addAnswer($answer1);
        $this->addAnswer($answer2);

        $this->correctAnswer()->shouldBe($answer1);
    }

    function it_doesnt_have_a_correct_answer()
    {
      $this->correctAnswer()->shouldBe(false);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([

            'questionId' => $this->getQuestionId(),
            'user' => $this->getUser(),
            'title' => $this->title,
            'body' => $this->body,
            'tags' => $this->getTags(),
            'datePublished' => $this->getDate(),
            'answersGiven' => $this->getAnswers(),
        ]);
    }


}

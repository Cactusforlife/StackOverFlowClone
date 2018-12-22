<?php

namespace spec\App\Domain\Vote;


use App\Domain\Vote\Vote;
use PhpSpec\ObjectBehavior;


class VoteSpec extends ObjectBehavior
{
    private $value;

    /**
     * @throws \Exception
     */
    function let()
    {
        $this->beConstructedThrough('positive');
    }


    function it_is_initializable()
    {
        $this->shouldHaveType(Vote::class);
    }


    function it_can_create_a_negative_vote()
    {
        $this->beConstructedThrough('negative');
        $this->shouldHaveType(Vote::class);
    }

    function it_returns_a_positive_vote()
    {
        $this->isPositive()->shouldBe(true);
    }

    function it_returns_a_negative_vote()
    {
        $this->beConstructedThrough('negative');
        $this->shouldHaveType(Vote::class);
        $this->isNegative()->shouldBe(false);
    }

    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'value' => true,
        ]);
    }


}
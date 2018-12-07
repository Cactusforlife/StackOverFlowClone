<?php

namespace spec\App\Domain\Vote;

use App\Domain\Vote\Vote;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VoteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Vote::class);
    }
}

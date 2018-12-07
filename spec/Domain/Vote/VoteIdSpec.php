<?php

namespace spec\App\Domain\Vote;

use App\Domain\Vote\VoteId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VoteIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(VoteId::class);
    }
}

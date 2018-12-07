<?php

namespace spec\App\Domain\Tag;

use App\Domain\Tag\Tag;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Tag::class);
    }
}

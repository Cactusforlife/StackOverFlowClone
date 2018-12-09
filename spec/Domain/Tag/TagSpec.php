<?php

namespace spec\App\Domain\Tag;

use App\Domain\Tag\Tag;
use App\Domain\Tag\TagId;
use PhpSpec\ObjectBehavior;


class TagSpec extends ObjectBehavior
{
    private $description;

    function let()
    {
        $this->description = 'This is a description';
        $this->beConstructedWith($this->description);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Tag::class);
    }

    function it_has_a_TagId_()
    {
        $this->TagId()->shouldBeAnInstanceOf(TagId::class);
    }

    function it_has_a_Description()
    {
        $this->Description()->shouldBe($this->description);

    }
}

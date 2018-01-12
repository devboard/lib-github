<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitHtmlUrl;
use PhpSpec\ObjectBehavior;

class CommitHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(
            $htmlUrl = 'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitHtmlUrl::class);
    }

    public function it_exposes_html_url()
    {
        $this->getHtmlUrl()->shouldReturn(
            'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn(
            'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn(
            'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(
            'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://github.com/symfony/symfony-docs/commit/88065b04761ff810009f3379b46513640aa7dc47';

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitHtmlUrl::class);
    }
}

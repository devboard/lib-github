<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitApiUrl;
use PhpSpec\ObjectBehavior;

class CommitApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(
            $apiUrl = 'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitApiUrl::class);
    }

    public function it_exposes_api_url()
    {
        $this->getApiUrl()->shouldReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(
            'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47'
        );
    }

    public function it_can_be_deserialized()
    {
        $input = 'https://api.github.com/repos/symfony/symfony-docs/git/commits/88065b04761ff810009f3379b46513640aa7dc47';

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitApiUrl::class);
    }
}

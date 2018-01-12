<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use PhpSpec\ObjectBehavior;

class VerificationSignatureSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($signature = '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VerificationSignature::class);
    }

    public function it_exposes_signature()
    {
        $this->getSignature()->shouldReturn('-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----');
    }

    public function it_can_be_deserialized()
    {
        $input = '-----BEGIN PGP MESSAGE-----\n...\n-----END PGP MESSAGE-----';

        $this->deserialize($input)->shouldReturnAnInstanceOf(VerificationSignature::class);
    }
}

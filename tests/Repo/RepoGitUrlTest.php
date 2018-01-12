<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoGitUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoGitUrl
 * @group  unit
 */
class RepoGitUrlTest extends TestCase
{
    /** @dataProvider provideRepositoryGitUrls */
    public function testItExposesValue(string $gitUrl)
    {
        $sut = new RepoGitUrl($gitUrl);
        $this->assertEquals($gitUrl, $sut->getValue());
    }

    /** @dataProvider provideRepositoryGitUrls */
    public function testItCanBeAutoConvertedToString(string $gitUrl)
    {
        $sut = new RepoGitUrl($gitUrl);
        $this->assertEquals($gitUrl, (string) $sut);
    }

    public function provideRepositoryGitUrls()
    {
        return [
            ['git://github.com/devboard-test/super-library.git'],
        ];
    }
}

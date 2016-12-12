<?php

namespace Dawehner\Bluehornet\tests\MethodRequests;

use Dawehner\Bluehornet\MethodRequests\LegacyManageSubscriber;
use Dawehner\Bluehornet\Normalizer;

/**
 * @coversDefaultClass \Dawehner\Bluehornet\MethodRequests\LegacySendCampaign
 */
class LegacyManageSubscriberTest extends \PHPUnit_Framework_TestCase
{
    public function testNormalizer()
    {
        $normalizer = new Normalizer();
        $manage_subscriber = new LegacyManageSubscriber('test@example.com');

        $serializer = new \Symfony\Component\Serializer\Serializer([$normalizer]);
        $result = $serializer->normalize($manage_subscriber, NULL, ['groups' => ['main']]);

        $this->assertEquals('test@example.com', $result['email']);
        $this->assertEquals('legacy.manage_subscriber', $result['methodName']);
    }

}

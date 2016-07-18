<?php

namespace Dawehner\Bluehornet\Tests\MethodRequests;

use Dawehner\Bluehornet\MethodRequests\Message;
use Dawehner\Bluehornet\Normalizer;

/**
 * @coversDefaultClass \Dawehner\Bluehornet\MethodRequests\Message
 */
class MessageTest extends \PHPUnit_Framework_TestCase
{

    public function testNormalizer()
    {
        $normalizer = new Normalizer();
        $message = new Message('8ff953dd97c4405234a04291dee39e', 'legacy.send_campaign');

        $result = $normalizer->normalize($message);

        $this->assertEquals('8ff953dd97c4405234a04291dee39e', $result['message_key']);
        $this->assertEquals('legacy.send_campaign', $result['methodName']);
    }

}

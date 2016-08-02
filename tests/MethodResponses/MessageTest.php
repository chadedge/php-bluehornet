<?php

namespace Drupal\Bluehornet\tests\MethodResponses;

use Dawehner\Bluehornet\MethodResponses\Message;
use Dawehner\Bluehornet\Response;
use Dawehner\Bluehornet\Serializer;

/**
 * @coversDefaultClass \Dawehner\Bluehornet\MethodResponses\Message
 */
class MessageTest extends \PHPUnit_Framework_TestCase
{
    public function testResponse()
    {
        $serializer = new Serializer();
        $xml = <<<XML
<methodResponse>
  <item>
    <message>1</message>
    <message_id>1029304</message_id>
    <message_key>8ff953dd97c4405234a04291dee39e</message_key>
  </item>
</methodResponse>

XML;

        $http_response = new \GuzzleHttp\Psr7\Response(200, [], $xml);

        /** @var \Dawehner\Bluehornet\Response $response */
        $response = $serializer->deserialize($xml, Response::class, 'xml', ['http_response' => $http_response]);

        $this->assertInstanceOf(Response::class, $response);
        /** @var \Dawehner\Bluehornet\MethodResponses\Message $method_response */
        $method_response = $response->getMethodResponse();
        $this->assertInstanceOf(Message::class, $method_response);
        $this->assertEquals(1, $method_response->getMessage());
        $this->assertEquals(1029304, $method_response->getId());
        $this->assertEquals('8ff953dd97c4405234a04291dee39e', $method_response->getKey());
    }
}

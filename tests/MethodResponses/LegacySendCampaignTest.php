<?php

namespace Drupal\Bluehornet\Tests\MethodResponses;

use Dawehner\Bluehornet\MethodResponses\LegacySendCampaign;
use Dawehner\Bluehornet\Response;
use Dawehner\Bluehornet\Serializer;

/**
 * @coversDefaultClass \Dawehner\Bluehornet\MethodResponses\LegacySendCampaign
 */
class LegacySendCampaignTest extends \PHPUnit_Framework_TestCase
{
    public function testSecondPost()
    {
        $serializer = new Serializer();
        $xml = <<<XML
<methodResponse>
    <item>
        <methodName>legacy.send_campaign</methodName>
        <responseData>
            <message>1</message>
            <sent>1</sent>
        </responseData>
        <responseNum>1</responseNum>
    </item>
</methodResponse>
XML;
        $http_response = new \GuzzleHttp\Psr7\Response(200, [], $xml);

        /** @var \Dawehner\Bluehornet\Response $response */
        $response = $serializer->deserialize($xml, Response::class, 'xml', ['http_response' => $http_response]);

        $this->assertInstanceOf(Response::class, $response);
        /** @var \Dawehner\Bluehornet\MethodResponses\LegacySendCampaign $method_response */
        $method_response = $response->getMethodResponse();
        $this->assertInstanceOf(LegacySendCampaign::class, $method_response);
        $this->assertEquals(1, $method_response->getMessage());
        $this->assertEquals(1, $method_response->getSent());
        $this->assertEquals('', $method_response->getReason());
    }

    public function testSeondPostWithError()
    {
        $serializer = new Serializer();
        $xml = <<<XML
<methodResponse>
    <item>
        <methodName>legacy.send_campaign</methodName>
        <responseData>
            <message>2</message>
            <reason>timed-release day/time is in the past</reason>
        </responseData>
        <responseNum>1</responseNum>
    </item>
</methodResponse>
XML;
        $http_response = new \GuzzleHttp\Psr7\Response(200, [], $xml);

        /** @var \Dawehner\Bluehornet\Response $response */
        $response = $serializer->deserialize($xml, Response::class, 'xml', ['http_response' => $http_response]);

        $this->assertInstanceOf(Response::class, $response);
        /** @var \Dawehner\Bluehornet\MethodResponses\LegacySendCampaign $method_response */
        $method_response = $response->getMethodResponse();
        $this->assertInstanceOf(LegacySendCampaign::class, $method_response);
        $this->assertEquals(2, $method_response->getMessage());
        $this->assertNull($method_response->getSent());
        $this->assertEquals('timed-release day/time is in the past', $method_response->getReason());
    }

}

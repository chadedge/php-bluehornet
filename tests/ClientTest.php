<?php

namespace Dawehner\Bluehornet\Tests;

use Dawehner\Bluehornet\Client;
use GuzzleHttp\Psr7\Response;
use Prophecy\Argument;

class ClientTest extends \PHPUnit_Framework_TestCase
{

    protected function setupHttpClient($xml)
    {
        $client = $this->prophesize(\GuzzleHttp\Client::class);
        $client->post(Argument::cetera())->willReturn(new Response(200, [], $xml));
        return $client;
    }
    public function testDeleteSubscriberResponse()
    {
        $xml = '<methodResponse>
    <item>
        <methodName>legacy.delete_subscribers</methodName>
        <responseData>
            <message>1</message>
            <job_id>862254</job_id>
        </responseData>
        <responseNum>1</responseNum>
    </item>
</methodResponse>';

        $bluehornetClient = new Client('foo', 'bar', $this->setupHttpClient($xml)->reveal());
        $request = $bluehornetClient->createRequest();

        $response = $bluehornetClient->sendRequest($request);
        /** @var \Dawehner\Bluehornet\MethodResponses\LegacyDeleteSubscribers $methodResponse */
        $methodResponse = $response->getMethodResponse();

        $this->assertEquals(862254, $methodResponse->getJobId());
        $this->assertEquals(1, $methodResponse->getMessage());
    }

}

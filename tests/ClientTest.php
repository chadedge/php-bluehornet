<?php

namespace Dawehner\Bluehornet\Tests;

use Dawehner\Bluehornet\Client;
use Dawehner\Bluehornet\MethodResponses;
use Dawehner\Bluehornet\Methods;
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

    public function testDeleteSubscriberRequest()
    {
        $deleteSubscriberMethod = new Methods\LegacyDeleteSubscribers();

        $xml = <<<XML
<methodCall>
    <methodName>legacy.delete_subscribers</methodName>
    <reply_email>adam@bluehornet.com</reply_email>
    <optout>N</optout>
    <data_url>https://www.mysite.com/list.txt</data_url>
</methodCall>              
XML;
        $bluehornetClient = new Client('foo', 'bar', $this->setupHttpClient($xml)->reveal());
        $request = $bluehornetClient->createRequest();
        $request->addMethodCall($deleteSubscriberMethod);
            

        $request = $bluehornetClient->createRequest();

    }

    public function testDeleteSubscriberResponse()
    {
        $xml = <<<XML
<methodResponse>
    <item>
        <methodName>legacy.delete_subscribers</methodName>
        <responseData>
            <message>1</message>
            <job_id>862254</job_id>
        </responseData>
        <responseNum>1</responseNum>
    </item>
</methodResponse>
XML;

        $bluehornetClient = new Client('foo', 'bar', $this->setupHttpClient($xml)->reveal());
        $request = $bluehornetClient->createRequest();

        $response = $bluehornetClient->sendRequest($request);
        /** @var \Dawehner\Bluehornet\MethodResponses\LegacyDeleteSubscribers $methodResponse */
        $methodResponse = $response->getMethodResponse();

        $this->assertEquals(862254, $methodResponse->getJobId());
        $this->assertEquals(1, $methodResponse->getMessage());
    }

}

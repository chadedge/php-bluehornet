<?php

namespace Drupal\Bluehornet\tests\MethodResponses;

use Dawehner\Bluehornet\MethodResponses\CouldNotAuthenticateError;
use Dawehner\Bluehornet\Response;
use Dawehner\Bluehornet\Serializer;

class ErrorMessageTest extends \PHPUnit_Framework_TestCase {

  public function testErrorMessage()
  {
      $serializer = new Serializer();
      $xml = <<<XML
<?xml version="1.0"?>
<methodResponse>
    <item>
        <error>
            <![CDATA[1]]>
        </error>
        <responseText>
            <![CDATA[Could not authenticate]]>
        </responseText>
        <responseData>
            <responseCode>
                <![CDATA[445]]>
            </responseCode>
        </responseData>
        <responseNum>
            <![CDATA[1]]>
        </responseNum>
        <totalRequests>
            <![CDATA[1]]>
        </totalRequests>
        <totalCompleted>
            <![CDATA[0]]>
        </totalCompleted>
    </item>
</methodResponse>
XML;

    $http_response = new \GuzzleHttp\Psr7\Response(200, [], $xml);

    /** @var \Dawehner\Bluehornet\Response $response */
    $response = $serializer->deserialize($xml, Response::class, 'xml', ['http_response' => $http_response]);

    /** @var \Dawehner\Bluehornet\MethodResponses\CouldNotAuthenticateError $response */
    $this->assertInstanceOf(CouldNotAuthenticateError::class, $response);
    $this->assertEquals(445, $response->getResponseCode());
    $this->assertEquals('Could not authenticate', $response->getResponseText());
  }

}

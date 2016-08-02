<?php

namespace Drupal\Bluehornet\tests\MethodResponses;

use Dawehner\Bluehornet\MethodResponses\TransactionalListTemplate;
use Dawehner\Bluehornet\MethodResponses\TransactionalListTemplates;
use Dawehner\Bluehornet\Response;
use Dawehner\Bluehornet\Serializer;

/**
 * @coversDefaultClass \Dawehner\Bluehornet\MethodResponses\TransactionalListTemplate
 */
class TransactionalListTemplatesTest extends \PHPUnit_Framework_TestCase
{
    public function testList()
    {
        $serializer = new Serializer();
        $xml = <<<XML
<methodResponse>
  <item>
    <methodName>transactional.listtemplates</methodName>
    <item>
      <template_id>1055589</template_id>
      <from_description>Buffalo Barn</from_description>
      <from_email>from@buffalobarn.com</from_email>
      <reply_email>replies@buffalobarn.com</reply_email>
      <subject>Order Confirmation</subject>
      <message_notes><![CDATA[important message note]]></message_notes>
      <bill_codes><![CDATA[shoe deparment]]></bill_codes>
      <template_data>
        <html>
          <![CDATA[ 
                   <html>
                     <head> ... </head>
                     <body>
                        ... HTML content of the email template ...
                     </body>
                   </html>
          ]]>
        </html>
        <plain>
          <![CDATA[
                    ... Plain text content of the email template ...
          ]]>
        </plain>
      </template_data>
    </item>
    <item>
      <template_id>1030098</template_id>
      <from_description>Buffalo Barn</from_description>
      <from_email>from@buffalobarn.com</from_email>
      <reply_email>replies@buffalobarn.com</reply_email>
      <subject>Order Confirmation</subject>
      <message_notes><![CDATA[another important message note]]></message_notes>
      <bill_codes><![CDATA[shirt deparment]]></bill_codes>
      <template_data>
        <html>
          <![CDATA[ 
                   <html>
                     <head> ... </head>
                     <body>
                        ... HTML content of the email template ...
                     </body>
                   </html>
          ]]>
        </html>
        <plain>
          <![CDATA[
                    ... Plain text content of the email template ...
          ]]>
        </plain>
      </template_data>
    </item>
  </item>
</methodResponse>
XML;
        $http_response = new \GuzzleHttp\Psr7\Response(200, [], $xml);

        /** @var \Dawehner\Bluehornet\Response $response */
        $response = $serializer->deserialize($xml, Response::class, 'xml', ['http_response' => $http_response]);

        $this->assertInstanceOf(Response::class, $response);
        /** @var \Dawehner\Bluehornet\MethodResponses\TransactionalListTemplates $method_response */
        $method_response = $response->getMethodResponse();
        $this->assertInstanceOf(TransactionalListTemplates::class, $method_response);
        $this->assertCount(2, $method_response->getItems());

        $list_template_0 = $method_response->getItems()[0];
        $list_template_1 = $method_response->getItems()[1];

        $this->assertEquals(1055589, $list_template_0->getTemplateId());
        $this->assertEquals('Buffalo Barn', $list_template_0->getFromDescription());
        $this->assertEquals('from@buffalobarn.com', $list_template_0->getFromEmail());
        $this->assertEquals('replies@buffalobarn.com', $list_template_0->getReplyEmail());
        $this->assertEquals('Order Confirmation', $list_template_0->getSubject());
        $this->assertEquals(['@cdata' => 'important message note'], $list_template_0->getMessageNotes());
        $this->assertEquals(['@cdata' => 'shoe deparment'], $list_template_0->getBillCodes());

        $template_data = <<<TD
<html>
                     <head> ... </head>
                     <body>
                        ... HTML content of the email template ...
                     </body>
                   </html>
TD;
        $plain_data = <<<PD
... Plain text content of the email template ...
PD;
        $this->assertEquals(['@cdata' => $template_data], $list_template_0->getTemplateData()['html']);
        $this->assertEquals(['@cdata' => $plain_data], $list_template_0->getTemplateData()['plain']);
    }

}

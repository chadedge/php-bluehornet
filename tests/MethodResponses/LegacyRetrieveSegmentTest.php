<?php

namespace Drupal\Bluehornet\tests\MethodResponses;

use Dawehner\Bluehornet\MethodResponses\LegacyRetrieveSegment;
use Dawehner\Bluehornet\Response;
use Dawehner\Bluehornet\Serializer;

/**
 * @coversDefaultClass \Dawehner\Bluehornet\MethodResponses\LegacyRetrieveSegment
 */
class LegacyRetrieveSegmentTest extends \PHPUnit_Framework_TestCase
{
    public function testList()
    {
        $serializer = new Serializer();
        $xml = <<<XML
<methodResponse>
<item>
    <methodName>legacy.retrieve_segment</methodName>
    <responseData>
        <manifest>
            <group_data>
                <group_information>
                    <group_name>T-shirts</group_name>
                    <group_id>55168</group_id>
                    <group_order>1</group_order>
                    <group_hidden>1</group_hidden>
                    <category_id>44</category_id>
                </group_information>
                <group_information>
                    <group_name>Shoes</group_name>
                    <group_id>58067</group_id>
                    <group_order>2</group_order>
                    <group_hidden>1</group_hidden>
                    <category_id>44</category_id>
                </group_information>
                <group_information>
                    <group_name>zip-92127, 36 miles</group_name>
                    <group_id>58068</group_id>
                    <group_order>3</group_order>
                    <group_hidden>1</group_hidden>
                    <category_id>2284</category_id>
                </group_information>
                <group_information>
                    <group_name>zip-99999, 50 miles</group_name>
                    <group_id>58470</group_id>
                    <group_order>4</group_order>
                    <group_hidden>1</group_hidden>
                    <category_id>2284</category_id>
                </group_information>
            </group_data>
            <category_data>
                <category_information>
                    <category_name>Purchase Categories</category_name>
                    <category_id>44</category_id>
                    <category_type>checkbox</category_type>
                    <category_order>1</category_order>
                </category_information>
                <category_information>
                    <category_name>Regions</category_name>
                    <category_id>2284</category_id>
                    <category_type>checkbox</category_type>
                    <category_order>3</category_order>
                </category_information>
            </category_data>
        </manifest>
    </responseData>
    <responseNum>1</responseNum>
    </item>
</methodResponse>    
XML;
        $http_response = new \GuzzleHttp\Psr7\Response(200, [], $xml);

        /** @var \Dawehner\Bluehornet\Response $response */
        $response = $serializer->deserialize($xml, Response::class, 'xml', ['http_response' => $http_response]);

        $this->assertInstanceOf(Response::class, $response);
        $method_response = $response->getMethodResponse();
        /** @var \Dawehner\Bluehornet\MethodResponses\LegacyRetrieveSegment $method_response */
        $this->assertInstanceOf(LegacyRetrieveSegment::class, $method_response);

        $this->assertCount(4, $method_response->getGroupInformation());
        $this->assertCount(2, $method_response->getCategoryInformation());

        $this->assertEquals('T-shirts', $method_response->getGroupInformation()[0]->getGroupName());
        $this->assertEquals('55168', $method_response->getGroupInformation()[0]->getGroupId());
        $this->assertEquals('1', $method_response->getGroupInformation()[0]->getGroupOrder());
        $this->assertEquals('1', $method_response->getGroupInformation()[0]->getGroupHidden());
        $this->assertEquals('44', $method_response->getGroupInformation()[0]->getCategoryId());

        $this->assertEquals('Shoes', $method_response->getGroupInformation()[1]->getGroupName());
        $this->assertEquals('58067', $method_response->getGroupInformation()[1]->getGroupId());
        $this->assertEquals('2', $method_response->getGroupInformation()[1]->getGroupOrder());
        $this->assertEquals('1', $method_response->getGroupInformation()[1]->getGroupHidden());
        $this->assertEquals('44', $method_response->getGroupInformation()[1]->getCategoryId());

        $this->assertEquals('Purchase Categories', $method_response->getCategoryInformation()[0]->getCategoryName());
        $this->assertEquals('44', $method_response->getCategoryInformation()[0]->getCategoryId());
        $this->assertEquals('1', $method_response->getCategoryInformation()[0]->getCategoryOrder());
        $this->assertEquals('checkbox', $method_response->getCategoryInformation()[0]->getCategoryType());

        $this->assertEquals('Regions', $method_response->getCategoryInformation()[1]->getCategoryName());
        $this->assertEquals('2284', $method_response->getCategoryInformation()[1]->getCategoryId());
        $this->assertEquals('3', $method_response->getCategoryInformation()[1]->getCategoryOrder());
        $this->assertEquals('checkbox', $method_response->getCategoryInformation()[1]->getCategoryType());
    }

}

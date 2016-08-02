<?php

namespace Dawehner\Bluehornet\tests\MethodRequests;

use Dawehner\Bluehornet\MethodRequests\LegacySendCampaign;
use Dawehner\Bluehornet\Normalizer;

/**
 * @coversDefaultClass \Dawehner\Bluehornet\MethodRequests\LegacySendCampaign
 */
class LegacySendCampaignTest extends \PHPUnit_Framework_TestCase
{
    public function testNormalizer()
    {
        $normalizer = new Normalizer();
        $campaign = new LegacySendCampaign();
        $campaign
            ->setGrp(10)
            ->setRichMbody('HTML content goes here')
            ->setTextMbody('Plain Text content goes here')
            ->setReplyEmail('service@example.com')
            ->setFromEmail('promotions@example.com')
            ->setFromdesc('Your Favorite E-Tailer')
            ->setMsubject('Spring Offer 25% Off!')
            ->setTrackLinks(1);

        $result = $normalizer->normalize($campaign);

        $this->assertEquals('legacy.send_campaign', $result['methodName']);
        $this->assertEquals(10, $result['grp']);
        $this->assertEquals('HTML content goes here', $result['rich_mbody']);
        $this->assertEquals('Plain Text content goes here', $result['text_mbody']);
        $this->assertEquals('service@example.com', $result['reply_email']);
        $this->assertEquals('promotions@example.com', $result['from_email']);
        $this->assertEquals('Your Favorite E-Tailer', $result['fromdesc']);
        $this->assertEquals('Spring Offer 25% Off!', $result['msubject']);
        $this->assertEquals(1, $result['track_links']);
    }

    public function testDenormalizeFailure()
    {
        $data = [
            'grp' => 10,
            'methodName' => 'legacy.send_campaign',
            'rich_mbody' => 'HTML content goes here',
            'text_mbody' => 'Plain Text content goes here',
        ];

        $normalizer = new Normalizer();
        /** @var \Dawehner\Bluehornet\MethodRequests\LegacySendCampaign $result */
        $result = $normalizer->denormalize($data, LegacySendCampaign::class);

        $this->assertEquals(10, $result->getGrp());
        $this->assertEquals('legacy.send_campaign', $result->getMethodName());
        $this->assertEquals('HTML content goes here', $result->getRichMbody());
        $this->assertEquals('Plain Text content goes here', $result->getTextMbody());
    }
}

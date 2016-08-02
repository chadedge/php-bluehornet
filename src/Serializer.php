<?php

namespace Dawehner\Bluehornet;

use Dawehner\Bluehornet\MethodResponses\LegacyRetrieveSegment;
use Dawehner\Bluehornet\MethodResponses\LegacySendCampaign;
use Dawehner\Bluehornet\MethodResponses\LegacyDeleteSubscribers;
use Dawehner\Bluehornet\MethodResponses\LegacyManageSubscriber;
use Dawehner\Bluehornet\MethodResponses\Message;
use Dawehner\Bluehornet\MethodResponses\SegmentCategoryInformation;
use Dawehner\Bluehornet\MethodResponses\SegmentGroupInformation;
use Dawehner\Bluehornet\MethodResponses\TransactionalListTemplate;
use Dawehner\Bluehornet\MethodResponses\TransactionalListTemplates;
use LSS\Array2XML;
use LSS\XML2Array;
use Symfony\Component\Serializer\SerializerInterface;

class Serializer implements SerializerInterface
{
    /**
     * @var \Symfony\Component\Serializer\Serializer
     */
    protected $serializer;

    /**
     * Creates a new Serializer instance.
     */
    public function __construct()
    {
        $normalizer = new Normalizer();
        $this->serializer = new \Symfony\Component\Serializer\Serializer([$normalizer]);
        $normalizer->setSerializer($this->serializer);
    }

    public function serialize($data, $format, array $context = array())
    {
        $data = $this->serializer->normalize($data, $format, $context);

        return Array2XML::createXML('api', $data)->saveXML();
    }

    public function deserialize($data, $type, $format, array $context = array())
    {
        $array = XML2Array::createArray($data);

        $methodName = $array['methodResponse']['item']['methodName'];
        if ($methodName === 'transactional.listtemplates') {
            return $this->deserializeListTemplates($array, $context);
        }

        if ($methodName === 'legacy.retrieve_segment') {
            return $this->deserializeLegacyRetrieveSegment($array, $context);
        }

        if (empty($array['methodResponse']['item']['responseData'])) {
            $methodResponse = $this->serializer->denormalize($array['methodResponse']['item'], Message::class);
            $response = new Response($context['http_response'], $methodResponse);

            return $response;
        }

        $responseData = $array['methodResponse']['item']['responseData'];

        switch ($methodName) {
            case 'legacy.manage_subscriber':
                $class = LegacyManageSubscriber::class;
                break;
            case 'legacy.delete_subscribers':
                $class = LegacyDeleteSubscribers::class;
                break;
            case 'legacy.send_campaign':
                $class = LegacySendCampaign::class;
                break;
            default:
                throw new \InvalidArgumentException("Not supported method: $methodName");
        }

        $methodResponse = $this->serializer->denormalize($responseData, $class);
        $response = new Response($context['http_response'], $methodResponse);

        return $response;
    }

    protected function deserializeListTemplates(array $array, array $context)
    {
        $items = [];
        foreach ($array['methodResponse']['item']['item'] as $item) {
            $items[] = $this->serializer->denormalize($item, TransactionalListTemplate::class);
        }

        $methodResponse = new TransactionalListTemplates($items);

        $response = new Response($context['http_response'], $methodResponse);

        return $response;
    }

    protected function deserializeLegacyRetrieveSegment($array, $context)
    {
        $groupInformatinon = [];
        if (!empty($array['methodResponse']['item']['responseData']['manifest']['group_data']['group_information'])) {
            foreach ($array['methodResponse']['item']['responseData']['manifest']['group_data']['group_information'] as $item) {
                $groupInformatinon[] = $this->serializer->denormalize($item, SegmentGroupInformation::class);
            }
        }

        $categoryInformation = [];
        if (!empty($array['methodResponse']['item']['responseData']['manifest']['category_data']['category_information'])) {
            foreach ($array['methodResponse']['item']['responseData']['manifest']['category_data']['category_information'] as $item) {
                $categoryInformation[] = $this->serializer->denormalize($item, SegmentCategoryInformation::class);
            }
        }

        $methodResponse = new LegacyRetrieveSegment($groupInformatinon, $categoryInformation);
        $response = new Response($context['http_response'], $methodResponse);

        return $response;
    }
}

<?php

namespace Dawehner\Bluehornet;

use Dawehner\Bluehornet\MethodResponses\LegacySendCampaign;
use Dawehner\Bluehornet\MethodResponses\LegacyDeleteSubscribers;
use Dawehner\Bluehornet\MethodResponses\LegacyManageSubscriber;
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

        $responseData = $array['methodResponse']['item']['responseData'];
        $methodName = $array['methodResponse']['item']['methodName'];

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

}

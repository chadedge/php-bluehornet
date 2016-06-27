<?php

namespace Dawehner\Bluehornet;

use Dawehner\Bluehornet\Methods\LegacyManageSubscriber;
use LSS\Array2XML;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Client
{
    private $apiKey;
    private $sharedSecret;


    /**
     * Creates a new Client instance.
     * @param string $api_key
     *   The API key.
     * @param string $shared_secret
     *   The shared secret.
     */
    public function __construct($api_key, $shared_secret)
    {
        $this->apiKey = $api_key;
        $this->sharedSecret = $shared_secret;
    }

    public function createRequest()
    {
        $request = new Request();
        $request->setAuthentication(new Authentication($this->apiKey, $this->sharedSecret, 'xml'));
        return $request;
    }

    public function sendRequest(Request $request)
    {
        $normalizer = new ObjectNormalizer(new ClassMetadataFactory(new YamlFileLoader(__DIR__ . '/normalizer.yml')));
        $serializer = new Serializer([$normalizer]);

        $data = $serializer->normalize($request, null, ['groups' => ['main']]);

        $xml = Array2XML::createXML('api', $data);
        return $xml->saveXML();
    }

}

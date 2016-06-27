<?php

namespace Dawehner\Bluehornet;

use Dawehner\Bluehornet\MethodResponses\LegacyDeleteSubscribers;
use LSS\Array2XML;
use LSS\XML2Array;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Client
{
    protected $client;

    protected $apiKey;
    protected $sharedSecret;

    protected $url = 'https://echo.bluehornet.com/api/xmlrpc/index.php';


    /**
     * Creates a new Client instance.
     * @param string $api_key
     *   The API key.
     * @param string $shared_secret
     *   The shared secret.
     */
    public function __construct($api_key, $shared_secret, \GuzzleHttp\Client $client = null)
    {
        $this->apiKey = $api_key;
        $this->sharedSecret = $shared_secret;
        $this->client = $client;
    }

    public function createRequest()
    {
        $request = new Request();
        $request->setAuthentication(new Authentication($this->apiKey, $this->sharedSecret, 'xml'));
        return $request;
    }

    /**
     * @return \Dawehner\Bluehornet\Response
     */
    public function sendRequest(Request $request)
    {
        $normalizer = new ObjectNormalizer(new ClassMetadataFactory(new YamlFileLoader(__DIR__ . '/normalizer.yml')));
        $serializer = new Serializer([$normalizer]);

        $data = $serializer->normalize($request, null, ['groups' => ['main']]);

        $httpResponse = $this->client->post($this->url, [
            'body' => Array2XML::createXML('api', $data)->saveXML(),
        ]);
        $array = XML2Array::createArray((string) $httpResponse->getBody());

        $responseData = $array['methodResponse']['item']['responseData'];
        $methodResponse = $serializer->denormalize($responseData, LegacyDeleteSubscribers::class);

        $response = new Response($httpResponse, $methodResponse);
        return $response;
    }

}

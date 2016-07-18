<?php

namespace Dawehner\Bluehornet;

use Dawehner\Bluehornet\MethodResponses\LegacyDeleteSubscribers;
use Dawehner\Bluehornet\MethodResponses\LegacyManageSubscriber;
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
        $serializer = new \Dawehner\Bluehornet\Serializer();

        $httpResponse = $this->client->post($this->url, [
            'body' => $serializer->serialize($request, null, ['groups' => ['main']]),
        ]);
        $response = $serializer->deserialize((string) $httpResponse->getBody(), Response::class, 'xml',
            ['http_response' => $httpResponse]);

        return $response;
    }
}

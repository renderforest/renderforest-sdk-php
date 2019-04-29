<?php

namespace Renderforest;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Renderforest\Project\Collection\ProjectCollection;
use Renderforest\Project\Project;
use Renderforest\ProjectData\ProjectData;
use Renderforest\Sound\Collection\SoundCollection;
use Renderforest\Sound\Sound;
use Renderforest\Sound\UserSound;
use Renderforest\Support\SupportTicket;
use Renderforest\Support\SupportTicketResponse;
use Renderforest\Template\Category\Category;
use Renderforest\Template\Category\Collection\CategoryCollection;
use Renderforest\Template\Collection\TemplateCollection;
use Renderforest\Template\CustomColor\Collection\CustomColorCollection;
use Renderforest\Template\CustomColor\CustomColor;
use Renderforest\Template\Template;
use Renderforest\User\User;

/**
 * Class ApiClient
 * @package Renderforest
 */
class ApiClient
{
    const SDK_VERSION = '0.3.13';
    const USER_AGENT = 'renderforest/sdk-php/' . self::SDK_VERSION;

    const API_ENDPOINT = 'https://api.renderforest.com';

    const PROJECTS_API_PATH_PREFIX = '/api/v1';
    const PROJECTS_API_PATH = self::PROJECTS_API_PATH_PREFIX . '/projects';

    const PROJECT_DATA_API_PATH_PREFIX = '/api/v5';
    const PROJECT_DATA_API_PATH = self::PROJECT_DATA_API_PATH_PREFIX . '/project-data';

    const SUPPORT_API_PATH_PREFIX = '/api/v1';
    const SUPPORT_API_PATH = self::SUPPORT_API_PATH_PREFIX . '/supports/ticket';

    const SOUNDS_API_PATH_PREFIX = '/api/v1';
    const SOUNDS_API_PATH = self::SOUNDS_API_PATH_PREFIX . '/sounds';

    const SOUNDS_RECOMMENDED_API_PATH_PREFIX = '/api/v1';
    const SOUNDS_RECOMMENDED_API_PATH = self::SOUNDS_RECOMMENDED_API_PATH_PREFIX . '/sounds/recommended';

    const CURRENT_USER_API_PATH_PREFIX = '/api/v1';
    const CURRENT_USER_API_PATH = self::CURRENT_USER_API_PATH_PREFIX . '/users/current';

    const TEMPLATE_RECOMMENDED_CUSTOM_COLORS_API_PATH_PREFIX = '/api/v1';
    const TEMPLATE_RECOMMENDED_CUSTOM_COLORS_API_PATH = self::TEMPLATE_RECOMMENDED_CUSTOM_COLORS_API_PATH_PREFIX . '/templates/%s/recommended-custom-colors';

    const TEMPLATES_API_PATH_PREFIX = '/api/v1';
    const TEMPLATES_API_PATH = self::TEMPLATES_API_PATH_PREFIX . '/templates';

    const TEMPLATE_CATEGORIES_API_PATH_PREFIX = '/api/v1';
    const TEMPLATE_CATEGORIES_API_PATH = self::TEMPLATE_CATEGORIES_API_PATH_PREFIX . '/templates/categories';


    /** @var string */
    protected $apiKey;

    /** @var string */
    protected $clientId;

    /** @var Client */
    protected $httpClient;

    /**
     * ApiClient constructor.
     * @param string $apiKey
     * @param string $clientId
     */
    public function __construct(string $apiKey, string $clientId)
    {
        $this->apiKey = $apiKey;
        $this->clientId = $clientId;

        $this->httpClient = new Client();
    }

    /**
     * @param int $templateId
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addProject(int $templateId): int
    {
        $endpoint = self::PROJECTS_API_PATH;
        $uri = self::API_ENDPOINT . self::PROJECTS_API_PATH;

        $options = [
            'method' => 'POST',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
            'json' => [
                'templateId' => $templateId,
            ],
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $jsonResponse = $response->getBody()->getContents();
        $arrayResponse = \GuzzleHttp\json_decode($jsonResponse, true);

        $data = $arrayResponse['data'];
        $projectId = intval($data['projectId']);

        return $projectId;
    }

    /**
     * @param int $projectId
     * @param string|null $customTitle
     * @param string|null $privacy
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateProject(
        int $projectId,
        string $customTitle = null,
        string $privacy = null
    ): int {
        $endpoint = self::PROJECTS_API_PATH;
        $uri = self::API_ENDPOINT . self::PROJECTS_API_PATH . '/' . $projectId;

        $updateParams = [];

        if (false === is_null($customTitle)) {
            $updateParams['customTitle'] = $customTitle;
        }

        if (false === is_null($privacy)) {
            if (false === in_array($privacy, Project::PRIVACY_OPTIONS)) {
                throw new \Exception(
                    sprintf(
                        'Invalid privacy `%s`, should be one of [%s]',
                        $privacy,
                        implode(', ', Project::PRIVACY_OPTIONS)
                    )
                );
            }

            $updateParams['privacy'] = $privacy;
        }

        $options = [
            'method' => 'PATCH',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
            'json' => $updateParams,
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $jsonResponse = $response->getBody()->getContents();
        $arrayResponse = \GuzzleHttp\json_decode($jsonResponse, true);

        $data = $arrayResponse['data'];
        $projectId = intval($data['projectId']);

        return $projectId;
    }

    /**
     * @param int $projectId
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteProject(int $projectId): int
    {
        $endpoint = self::PROJECTS_API_PATH;
        $uri = self::API_ENDPOINT . self::PROJECTS_API_PATH . '/' . $projectId;

        $options = [
            'method' => 'DELETE',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $jsonResponse = $response->getBody()->getContents();
        $arrayResponse = \GuzzleHttp\json_decode($jsonResponse, true);

        $data = $arrayResponse['data'];
        $affectedRows = intval($data['affectedRows']);

        return $affectedRows;
    }

    /**
     * @todo validate language code, supported codes - ar, de, en, es, fr, pt, ru, tr
     *
     * @param string|null $languageIsoCode
     * @return Category[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplateCategories(string $languageIsoCode = null): array
    {
        $endpoint = self::TEMPLATE_CATEGORIES_API_PATH;
        $uri = self::API_ENDPOINT . self::TEMPLATE_CATEGORIES_API_PATH;

        if (false === is_null($languageIsoCode)) {
            $queryParams = [
                'language' => $languageIsoCode,
            ];

            $queryString = http_build_query($queryParams);
            $uri .= '?' . $queryString;
        }

        $options = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $categoryCollection = new CategoryCollection();
        $categoryCollection->exchangeJson($json);

        return $categoryCollection->getItems();
    }

    /**
     * @param int $templateId
     * @return CustomColor[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateRecommendedCustomColors(int $templateId): array
    {
        $endpoint = self::TEMPLATE_RECOMMENDED_CUSTOM_COLORS_API_PATH;

        $templateRecommendedCustomColorsApiPath = sprintf(
            self::TEMPLATE_RECOMMENDED_CUSTOM_COLORS_API_PATH,
            $templateId
        );
        $uri = self::API_ENDPOINT . $templateRecommendedCustomColorsApiPath;

        $options = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $httpClient = new Client();

        $response = $httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $customColorCollection = new CustomColorCollection();
        $customColorCollection->exchangeJson($json);

        $customColors = $customColorCollection->getItems();

        return $customColors;
    }

    /**
     * @return Template[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getAllTemplates(): array
    {
        // @todo query params
        // ?categoryId=3&equalizer=false&limit=4&offset=10

        $endpoint = self::TEMPLATES_API_PATH_PREFIX;
        $uri = self::API_ENDPOINT . self::TEMPLATES_API_PATH;

        $options = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $httpClient = new Client();

        $response = $httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $templateCollection = new TemplateCollection();
        $templateCollection->exchangeJson($json);

        $templates = $templateCollection->getItems();

        return $templates;
    }

    /**
     * @return User
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCurrentUser(): User
    {
        $endpoint = self::CURRENT_USER_API_PATH;
        $uri = self::API_ENDPOINT . self::CURRENT_USER_API_PATH;

        $options = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $user = new User();
        $user->exchangeJson($json);

        return $user;
    }

    /**
     * @param int $duration
     * @return Sound[]|UserSound[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllSounds(int $duration): array
    {
        $soundCollection = $this->getSounds($duration, null);

        $sounds = $soundCollection->getItems();

        return $sounds;
    }

    /**
     * @param int $duration
     * @return Sound[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getAllSoundsLimited(int $duration): array
    {
        $soundCollection = self::getSoundsLimited($duration, null);

        $sounds = $soundCollection->getItems();

        return $sounds;
    }

    /**
     * @param int $duration
     * @param int $templateId
     * @return Sound[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendedSounds(int $duration, int $templateId): array
    {
        $soundCollection = $this->getSounds($duration, $templateId);

        $sounds = $soundCollection->getItems();

        return $sounds;
    }

    /**
     * @param int $duration
     * @param int $templateId
     * @return Sound[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getRecommendedSoundsLimited(int $duration, int $templateId): array
    {
        $soundCollection = self::getSoundsLimited($duration, $templateId);

        $sounds = $soundCollection->getItems();

        return $sounds;
    }

    /**
     * @param int $duration
     * @param int|null $templateId
     * @return SoundCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getSounds(int $duration, int $templateId = null): SoundCollection
    {
        $endpoint = self::SOUNDS_API_PATH;
        $uri = self::API_ENDPOINT . self::SOUNDS_API_PATH;

        $queryParams = [
            'duration' => $duration,
        ];

        if (false === is_null($templateId)) {
            $endpoint = self::SOUNDS_RECOMMENDED_API_PATH;
            $uri = self::API_ENDPOINT . self::SOUNDS_RECOMMENDED_API_PATH;

            $queryParams = [
                'duration' => $duration,
                'templateId' => $templateId,
            ];
        }


        $queryString = http_build_query($queryParams);
        $uri .= '?' . $queryString;

        $options = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $soundCollection = new SoundCollection();
        $soundCollection->exchangeJson($json);

        return $soundCollection;
    }

    /**
     * @param int $duration
     * @param int|null $templateId
     * @param bool $authorized
     * @return SoundCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private static function getSoundsLimited(int $duration, int $templateId = null): SoundCollection
    {
        $endpoint = self::SOUNDS_API_PATH;
        $uri = self::API_ENDPOINT . self::SOUNDS_API_PATH;

        $queryParams = [
            'duration' => $duration,
        ];

        if (false === is_null($templateId)) {
            $endpoint = self::SOUNDS_RECOMMENDED_API_PATH;
            $uri = self::API_ENDPOINT . self::SOUNDS_RECOMMENDED_API_PATH;

            $queryParams = [
                'duration' => $duration,
                'templateId' => $templateId,
            ];
        }


        $queryString = http_build_query($queryParams);
        $uri .= '?' . $queryString;

        $options = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $httpClient = new Client();

        $response = $httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $soundCollection = new SoundCollection();
        $soundCollection->exchangeJson($json);

        return $soundCollection;
    }


    /**
     * @param SupportTicket $supportTicket
     * @return SupportTicketResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createSupportTicket(SupportTicket $supportTicket): SupportTicketResponse
    {
        $endpoint = self::SUPPORT_API_PATH;
        $uri = self::API_ENDPOINT . self::SUPPORT_API_PATH;

        $options = [
            'method' => 'POST',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
            'json' => $supportTicket->getArrayCopy(),
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $supportTicketResponse = new SupportTicketResponse();
        $supportTicketResponse->exchangeJson($json);

        return $supportTicketResponse;
    }

    /**
     * @param int $projectId
     * @return ProjectData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProjectData(int $projectId): ProjectData
    {
        $endpoint = self::PROJECT_DATA_API_PATH . '/' . $projectId;
        $uri = self::API_ENDPOINT . self::PROJECT_DATA_API_PATH . '/' . $projectId;

        $options = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $projectData = new ProjectData();
        $projectData->exchangeJson($json);

        return $projectData;
    }

    /**
     * @return Project[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllProjects(): array
    {
        $endpoint = self::PROJECTS_API_PATH;
        $uri = self::API_ENDPOINT . self::PROJECTS_API_PATH;

        $options = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $projectCollection = new ProjectCollection();
        $projectCollection->exchangeJson($json);

        return $projectCollection->getItems();
    }

    /**
     * @param int $projectId
     * @return Project
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProject(int $projectId): Project
    {
        $endpoint = self::PROJECTS_API_PATH . '/' . $projectId;
        $uri = self::API_ENDPOINT . self::PROJECTS_API_PATH . '/' . $projectId;

        $options = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => self::USER_AGENT,
            ],
            'endpoint' => $endpoint,
            'uri' => $uri,
        ];

        $options = $this->setAuthorization($options);

        $response = $this->httpClient->request(
            $options['method'],
            $options['uri'],
            $options
        );

        $json = $response->getBody()->getContents();

        $project = new Project();
        $project->exchangeJson($json);

        return $project;
    }

    /**
     * @param $options
     * @return array
     */
    private function setAuthorization($options): array
    {
        $signKey = $this->apiKey;
        $clientId = $this->clientId;

        $opts = $options ? $options : [];
        $headers = isset($opts['headers']) ? $opts['headers'] : [];
        $headers['nonce'] = $this->generateNonce();
        $headers['clientid'] = $clientId;
        $headers['timestamp'] = $this->dateNow();
        $parsedUrl = parse_url(isset($opts['uri']) ? $opts['uri'] : '');
        $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
        $path = $query ? $parsedUrl['path'] . '?' . $query : $parsedUrl['path'];

        $headers['authorization'] = $this->generateHash([
            'clientId' => $clientId,
            'path' => $path ? $path : '',
            'qs' => $query ? $query : '',
            'body' => isset($opts['json']) ? json_encode($opts['json'], JSON_UNESCAPED_SLASHES) : '{}',
            'nonce' => $headers['nonce'],
            'timestamp' => $headers['timestamp']
        ], $signKey);
        $opts['headers'] = $headers;

        return $opts;
    }

    /**
     * Generate timestamp with milliseconds.
     *
     * @return float
     */
    private function dateNow(): float
    {
        return round(microtime(true) * 1000);
    }

    /**
     * Creates keyed-hash message authentication code (HMAC) based on given `$text` and `$key`.
     * @param string $text
     * @param string $key
     * @return string
     */
    private function createHMAC($text, $key)
    {
        return hash_hmac("SHA512", $text, $key);
    }

    /**
     * Generates `HMAC` based on given `$options` and `$key`.
     * Source is defined as combination of clientId, path, qs, body, nonce and timestamp respectively.
     * @param array $options
     * @param string $key
     * @return string
     */
    private function generateHash($options, $key)
    {
        $clientId = $options['clientId'];
        $qs = $options['qs'];
        $path = $options['path'];
        $body = $options['body'];
        $nonce = $options['nonce'];
        $timestamp = $options['timestamp'];
        $hashSource = $clientId . $path . $qs . $body . $nonce . $timestamp;

        return $this->createHMAC($hashSource, $key);
    }

    /**
     * Generates nonce.
     *  Creates timestamp
     *  Gets the last 6 chars of the timestamp
     *  Generates random number between 10-99
     *  Combined the last two ones.
     * @returns string
     */
    private function generateNonce()
    {
        $timestamp = $this->dateNow();
        $str = substr($timestamp, strlen($timestamp) - 6);
        $suffix = rand(10, 99);

        return $str . $suffix;
    }
}

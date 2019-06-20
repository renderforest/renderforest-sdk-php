<?php

namespace Renderforest\User;

use Renderforest\Base\EntityBase;

/**
 * Class User
 *
 * @package Renderforest\User
 */
class User extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "id": 2608853,
     *      "email": "tigran.maestro@gmail.com",
     *      "roles": "member",
     *      "active": true,
     *      "status": 1,
     *      "blocked": false,
     *      "privacy": "UNLISTED",
     *      "firstName": "Tigran Petrosyan",
     *      "lastLogin": "2019-04-14T19:26:30.000Z",
     *      "publicShare": true,
     *      "notifications": [],
     *      "uploadHost": "uploads-hd.renderforest.com",
     *      "minuteLimit": 3,
     *      "language": "en",
     *      "postMaxSize": 50,
     *      "logoLimit": 0,
     *      "rendLimit": 0,
     *      "siteLimit": 0,
     *      "uploadMaxFileSize": 50,
     *      "visualizerMinuteLimit": 1
     *  }
     */

    const KEY_ID = 'id';
    const KEY_ACTIVE = 'active';
    const KEY_BLOCKED = 'blocked';
    const KEY_EMAIL = 'email';
    const KEY_FIRST_NAME = 'firstName';
    const KEY_LANGUAGE = 'language';
    const KEY_LAST_LOGIN = 'lastLogin';
    const KEY_MINUTE_LIMIT = 'minuteLimit';
    const KEY_POST_MAX_SIZE = 'postMaxSize';
    const KEY_PRIVACY = 'privacy';
    const KEY_PUBLIC_SHARE = 'publicShare';
    const KEY_REND_LIMIT = 'rendLimit';
    const KEY_ROLES = 'roles';
    const KEY_STATUS = 'status';
    const KEY_UPLOAD_HOST = 'uploadHost';
    const KEY_UPLOAD_MAX_FILE_SIZE = 'uploadMaxFileSize';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_ACTIVE,
        self::KEY_BLOCKED,
        self::KEY_EMAIL,
        self::KEY_FIRST_NAME,
        self::KEY_LANGUAGE,
        self::KEY_LAST_LOGIN,
        self::KEY_MINUTE_LIMIT,
        self::KEY_POST_MAX_SIZE,
        self::KEY_PRIVACY,
        self::KEY_PUBLIC_SHARE,
        self::KEY_REND_LIMIT,
        self::KEY_ROLES,
        self::KEY_STATUS,
        self::KEY_UPLOAD_HOST,
        self::KEY_UPLOAD_MAX_FILE_SIZE,
    ];

    /** @var int */
    protected $id;

    /** @var bool */
    protected $active;

    /** @var bool */
    protected $blocked;

    /** @var string */
    protected $email;

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $language;

    /** @var string */
    protected $lastLogin;

    /** @var int */
    protected $minuteLimit;

    /** @var int */
    protected $postMaxSize;

    /** @var string */
    protected $privacy;

    /** @var bool */
    protected $publicShare;

    /** @var int */
    protected $rendLimit;

    /** @var string */
    protected $roles;

    /** @var int */
    protected $status;

    /** @var string */
    protected $uploadHost;

    /** @var int */
    protected $uploadMaxFileSize;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    private function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * @return bool
     */
    public function isBlocked(): bool
    {
        return $this->blocked;
    }

    /**
     * @param bool $blocked
     */
    private function setBlocked(bool $blocked)
    {
        $this->blocked = $blocked;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    private function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    private function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    private function setLanguage(string $language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLastLogin(): string
    {
        return $this->lastLogin;
    }

    /**
     * @param string $lastLogin
     */
    private function setLastLogin(string $lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return int
     */
    public function getMinuteLimit(): int
    {
        return $this->minuteLimit;
    }

    /**
     * @param int $minuteLimit
     */
    private function setMinuteLimit(int $minuteLimit)
    {
        $this->minuteLimit = $minuteLimit;
    }

    /**
     * @return int
     */
    public function getPostMaxSize(): int
    {
        return $this->postMaxSize;
    }

    /**
     * @param int $postMaxSize
     */
    private function setPostMaxSize(int $postMaxSize)
    {
        $this->postMaxSize = $postMaxSize;
    }

    /**
     * @return string
     */
    public function getPrivacy(): string
    {
        return $this->privacy;
    }

    /**
     * @param string $privacy
     */
    private function setPrivacy(string $privacy)
    {
        $this->privacy = $privacy;
    }

    /**
     * @return bool
     */
    public function isPublicShare(): bool
    {
        return $this->publicShare;
    }

    /**
     * @param bool $publicShare
     */
    private function setPublicShare(bool $publicShare)
    {
        $this->publicShare = $publicShare;
    }

    /**
     * @return int
     */
    public function getRendLimit(): int
    {
        return $this->rendLimit;
    }

    /**
     * @param int $rendLimit
     */
    private function setRendLimit(int $rendLimit)
    {
        $this->rendLimit = $rendLimit;
    }

    /**
     * @return string
     */
    public function getRoles(): string
    {
        return $this->roles;
    }

    /**
     * @param string $roles
     */
    private function setRoles(string $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    private function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getUploadHost(): string
    {
        return $this->uploadHost;
    }

    /**
     * @param string $uploadHost
     */
    private function setUploadHost(string $uploadHost)
    {
        $this->uploadHost = $uploadHost;
    }

    /**
     * @return int
     */
    public function getUploadMaxFileSize(): int
    {
        return $this->uploadMaxFileSize;
    }

    /**
     * @param int $uploadMaxFileSize
     */
    private function setUploadMaxFileSize(int $uploadMaxFileSize)
    {
        $this->uploadMaxFileSize = $uploadMaxFileSize;
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_ACTIVE => $this->isActive(),
            self::KEY_BLOCKED => $this->isBlocked(),
            self::KEY_EMAIL => $this->getEmail(),
            self::KEY_FIRST_NAME => $this->getFirstName(),
            self::KEY_LANGUAGE => $this->getLanguage(),
            self::KEY_LAST_LOGIN => $this->getLastLogin(),
            self::KEY_MINUTE_LIMIT => $this->getMinuteLimit(),
            self::KEY_POST_MAX_SIZE => $this->getPostMaxSize(),
            self::KEY_PRIVACY => $this->getPrivacy(),
            self::KEY_PUBLIC_SHARE => $this->isPublicShare(),
            self::KEY_REND_LIMIT => $this->getRendLimit(),
            self::KEY_ROLES => $this->getRoles(),
            self::KEY_STATUS => $this->getStatus(),
            self::KEY_UPLOAD_HOST => $this->getUploadHost(),
            self::KEY_UPLOAD_MAX_FILE_SIZE => $this->getUploadMaxFileSize(),
        ];
    }

    /**
     * @param string $userJson
     */
    public function exchangeJson(string $userJson)
    {
        $userDataArray = json_decode($userJson, true);

        $userDataArray = $userDataArray['data'];

        $this->exchangeArray($userDataArray);
    }

    /**
     * @param array $userDataArray
     */
    public function exchangeArray(array $userDataArray)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $userDataArray)) {
                // Throw exception if property does not exist
            }
        }

        $userId = $userDataArray[self::KEY_ID];
        $userActive = $userDataArray[self::KEY_ACTIVE];
        $userBlocked = $userDataArray[self::KEY_BLOCKED];
        $userEmail = $userDataArray[self::KEY_EMAIL];
        $userFirstName = $userDataArray[self::KEY_FIRST_NAME];
        $userLanguage = $userDataArray[self::KEY_LANGUAGE];
        $userLastLogin = $userDataArray[self::KEY_LAST_LOGIN];
        $userMinuteLimit = $userDataArray[self::KEY_MINUTE_LIMIT];
        $postMaxSize = $userDataArray[self::KEY_POST_MAX_SIZE];
        $userPrivacy = $userDataArray[self::KEY_PRIVACY];
        $userPublicShare = $userDataArray[self::KEY_PUBLIC_SHARE];
        $userRendLimit = $userDataArray[self::KEY_REND_LIMIT];
        $userRole = $userDataArray[self::KEY_ROLES];
        $userStatus = $userDataArray[self::KEY_STATUS];
        $uploadHost = $userDataArray[self::KEY_UPLOAD_HOST];
        $uploadMaxFileSize = $userDataArray[self::KEY_UPLOAD_MAX_FILE_SIZE];

        $this->setId($userId);
        $this->setActive($userActive);
        $this->setBlocked($userBlocked);
        $this->setEmail($userEmail);
        $this->setFirstName($userFirstName);
        $this->setLanguage($userLanguage);
        $this->setLastLogin($userLastLogin);
        $this->setMinuteLimit($userMinuteLimit);
        $this->setPostMaxSize($postMaxSize);
        $this->setPrivacy($userPrivacy);
        $this->setPublicShare($userPublicShare);
        $this->setRendLimit($userRendLimit);
        $this->setRoles($userRole);
        $this->setStatus($userStatus);
        $this->setUploadHost($uploadHost);
        $this->setUploadMaxFileSize($uploadMaxFileSize);
    }
}

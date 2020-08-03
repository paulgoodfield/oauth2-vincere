<?php

namespace PaulGoodfield\OAuth2\Client\Provider;

use InvalidArgumentException;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class Vincere extends AbstractProvider
{
	use BearerAuthorizationTrait;

	/**
	 * @var string
	 */
	private $baseAuthUrl = 'https://id.vincere.io/oauth2';

	/**
	 * @var string
	 */
	private $urlAuthorize;

	/**
	 * @var string
	 */
	private $urlAccessToken;

	/**
	 * @var string
	 */
	private $urlResourceOwnerDetails;

	/**
	 * @var string
	 */
	private $accessTokenMethod;

	/**
	 * @var string
	 */
	private $accessTokenResourceOwnerId;

	/**
	 * @var array|null
	 */
	private $scopes = null;

	/**
	 * @var string
	 */
	private $scopeSeparator;

	/**
	 * @var string
	 */
	private $responseError = 'error';

	/**
	 * @var string
	 */
	private $responseCode;

	/**
	 * @var string
	 */
	private $responseResourceOwnerId = 'id';
	

	public function __construct(array $options = [], array $collaborators = [])
	{
		$this->urlAuthorize   = $this->baseAuthUrl . '/authorize';
		$this->urlAccessToken = $this->baseAuthUrl . '/token';

		parent::__construct($options, $collaborators);
	}

	public function getBaseAuthorizationUrl()
	{
		return $this->urlAuthorize;
	}

	public function getBaseAccessTokenUrl(array $params)
    {
        return $this->urlAccessToken;
	}
	
	public function getResourceOwnerDetailsUrl(AccessToken $token)
	{
		return '';
	}

	protected function getDefaultScopes()
	{
		return [];
	}

	protected function checkResponse(ResponseInterface $response, $data)
	{

	}

	protected function createResourceOwner(array $response, AccessToken $token)
	{

	}
}
<?php

namespace App\Security;

use App\Entity\Account;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class OtsAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;

    const LOGIN_ROUTE = 'security_login';

    private $entityManager;
    private $router;
    private $csrfTokenManager;
    private $otsSecurityService;

    public function __construct(
        EntityManagerInterface $entityManager,
        RouterInterface $router,
        CsrfTokenManagerInterface $csrfTokenManager,
        OtsSecurityService $otsSecurityService
    ) {
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->otsSecurityService = $otsSecurityService;
    }

    public function supports(Request $request)
    {
        return self::LOGIN_ROUTE === $request->attributes->get('_route') && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
        $loginFormData = $request->request->get('website_login');

        $credentials = [
            'name' => $loginFormData['name'],
            'password' => $loginFormData['password'],
            'secure_token' => isset($loginFormData['secure_token']) ? $loginFormData['secure_token'] : '',
            'csrf_token' => $loginFormData['_token'],
            'ip' => $request->getClientIp(),
        ];

        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['name']
        );

        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        if (empty($credentials['ip'])) {
            throw new CustomUserMessageAuthenticationException('LOGIN_BLOCKED_NO_IP_DETECTED');
        }

        // code to block IP of user
        /*
        if ($user) {
            throw new CustomUserMessageAuthenticationException('LOGIN_BLOCKED_IP_BLOCKED');
        }
        */

        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }

        $user = $userProvider->loadUserByUsername($credentials['name']);
        //$user = $this->entityManager->getRepository(Account::class)->findOneBy(['name' => $credentials['name']]);

        if (!$user) {
            // invalid username IP log
            throw new BadCredentialsException();
        }

        return $user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // Check the user's password or other credentials and return true or false
        // If there are no credentials to check, you can just return true
        $isTokenValid = $this->otsSecurityService->isValidToken($user, $credentials['secure_token']);

        if (!$isTokenValid) {
            // invalid token IP log
            // invalid token account log
            return $isTokenValid;
        }

        $isPasswordValid = $this->otsSecurityService->isValidPassword($user, $credentials['password']);

        if (!$isPasswordValid) {
            // invalid password IP log
            // invalid password account log
        }

        return $isPasswordValid;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->router->generate('account_index'));
    }

    public function getLoginUrl()
    {
        return $this->router->generate(self::LOGIN_ROUTE);
    }
}

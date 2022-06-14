<?php
declare(strict_types=1);

namespace App\Service\KanbanBoard;

use \App\Library\Utilities;

/**
 * Please do not use this class any more
 * It is not possible login to Github and get information about user token by credential data
 *
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.0
 * @deprecated
 */
class Authentication
{

    /** @var string */
    private const GITHUB_STATE = 'LKHYgbn776tgubkjhk';

    /** @var string */
    private const GITHUB_LOGIN_URL =
        'Location: https://github.com/login/oauth/authorize'
        . '?client_id=%s'
        . '&scope=repo'
        . '&state=%s';

    /** @var string */
    private const GITHUB_TOKEN_URL = 'https://github.com/login/oauth/access_token';

    /**
     * @param string $clientId
     * @param string $clientSecret
     */
    public function __construct(
        private string $clientId,
        private string $clientSecret
    )
    {
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        unset($_SESSION['gh-token']);
    }

    /**
     * @return string|null
     * @throws \Exception
     */
    public function login(): ?string
    {
        \session_start();
        $token = null;

        if (Utilities::hasValue($_SESSION, 'gh-token')) {
            $token = $_SESSION['gh-token'];
        } else if (Utilities::hasValue($_GET, 'code')
            && Utilities::hasValue($_GET, 'state')
            && Utilities::hasValue($_SESSION, 'redirected')
            && $_SESSION['redirected'] === true
        ) {
            $_SESSION['redirected'] = false;
            $token = $this->_returnsFromGithub($_GET['code']);
        } else {
            $_SESSION['redirected'] = true;
            $this->_redirectToGithub();
        }

        $this->logout();
        $_SESSION['gh-token'] = $token;

        return $token;
    }

    /**
     * @return void
     */
    private function _redirectToGithub(): void
    {
        var_dump(\sprintf(self::GITHUB_LOGIN_URL, $this->clientId, self::GITHUB_STATE));
        die();
        \header(\sprintf(self::GITHUB_LOGIN_URL, $this->clientId, self::GITHUB_STATE));
        exit;
    }

    /**
     * @param string $code
     * @return string|null
     */
    private function _returnsFromGithub(string $code): ?string
    {
        $data = [
            'code' => $code,
            'state' => self::GITHUB_STATE,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'content' => \http_build_query($data),
            ],
        ];

        $context = \stream_context_create($options);
        $result = \file_get_contents(self::GITHUB_TOKEN_URL, false, $context);

        if ($result !== false) {
            $result = \explode('=', \explode('&', $result)[0]);
            \array_shift($result);

            return \array_shift($result);
        }

        return null;
    }

}

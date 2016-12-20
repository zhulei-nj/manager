<?php

namespace zhulei\Manager\Contracts\OAuth2;

use Laravel\Socialite\Two\ProviderInterface as SocialiteOauth2ProviderInterface;
use zhulei\Manager\Contracts\ConfigInterface as Config;

interface ProviderInterface extends SocialiteOauth2ProviderInterface
{
    /**
     * @param Config $config
     *
     * @return $this
     */
    public function setConfig(Config $config);
}

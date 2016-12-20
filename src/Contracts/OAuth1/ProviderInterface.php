<?php

namespace zhulei\Manager\Contracts\OAuth1;

use zhulei\Manager\Contracts\ConfigInterface as Config;

interface ProviderInterface
{
    /**
     * @param Config $config
     *
     * @return $this
     */
    public function setConfig(Config $config);
}

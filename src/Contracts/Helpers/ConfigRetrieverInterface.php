<?php

namespace zhulei\Manager\Contracts\Helpers;

use zhulei\Manager\Contracts\ConfigInterface;
use zhulei\Manager\Exception\MissingConfigException;

interface ConfigRetrieverInterface
{
    /**
     * @param string $providerIdentifier
     * @param array  $additionalConfigKeys
     *
     * @throws MissingConfigException
     *
     * @return ConfigInterface
     */
    public function fromEnv($providerIdentifier, array $additionalConfigKeys = []);

    /**
     * @param string $providerName
     * @param array  $additionalConfigKeys
     *
     * @throws MissingConfigException
     *
     * @return ConfigInterface
     */
    public function fromServices($providerName, array $additionalConfigKeys = []);
}

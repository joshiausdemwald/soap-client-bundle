<?php
namespace Phpforce\Bundle\SoapClientBundle\Cache;

use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;
use Phpforce\SoapClient\ClientInterface;
use Phpforce\SoapClient\Metadata\CacheWarmer;

class MetadataCacheWarmer implements CacheWarmerInterface
{
    /**
     * @var \Phpforce\SoapClient\ClientInterface
     */
    private $client;

    /**
     * @var bool
     */
    private $force;

    /**
     * @param ClientInterface $warmer
     * @param bool $force
     */
    public function __construct(ClientInterface $client, $force = false)
    {
        $this->client = $client;

        $this->force = $force;
    }

    /**
     * @param $cacheDir
     */
    public function warmUp($cacheDir)
    {
        $cacheWarmer = new CacheWarmer($this->client, $this->force);

        $cacheWarmer->warmup();
    }

    public function isOptional()
    {
        return true;
    }
} 
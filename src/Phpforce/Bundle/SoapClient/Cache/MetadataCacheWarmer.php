<?php
/**
 * Created by PhpStorm.
 * User: joshi
 * Date: 31.10.13
 * Time: 13:27
 */

namespace Phpforce\Bundle\SoapClient\Cache;

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
     * @param ClientInterface $warmer
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $cacheDir
     */
    public function warmUp($cacheDir)
    {
        $cacheWarmer = new CacheWarmer($client, $true);
    }

    public function isOptional()
    {
        return true;
    }
} 
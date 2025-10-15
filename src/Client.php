<?php

namespace Boci\HetznerLaravel;

use Boci\HetznerLaravel\Resources\Actions;
use Boci\HetznerLaravel\Resources\Billing;
use Boci\HetznerLaravel\Resources\Certificates;
use Boci\HetznerLaravel\Resources\DnsZones;
use Boci\HetznerLaravel\Resources\Firewalls;
use Boci\HetznerLaravel\Resources\FloatingIPs;
use Boci\HetznerLaravel\Resources\Images;
use Boci\HetznerLaravel\Resources\ISOs;
use Boci\HetznerLaravel\Resources\LoadBalancers;
use Boci\HetznerLaravel\Resources\LoadBalancerTypes;
use Boci\HetznerLaravel\Resources\Locations;
use Boci\HetznerLaravel\Resources\Networks;
use Boci\HetznerLaravel\Resources\PlacementGroups;
use Boci\HetznerLaravel\Resources\PrimaryIPs;
use Boci\HetznerLaravel\Resources\Servers;
use Boci\HetznerLaravel\Resources\ServerTypes;
use Boci\HetznerLaravel\Resources\SshKeys;
use Boci\HetznerLaravel\Resources\Volumes;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;

/**
 * Hetzner Cloud API Client
 *
 * This class provides a fluent interface for interacting with the Hetzner Cloud API.
 * It manages HTTP client configuration and provides access to all available resources.
 */
class Client
{
    /** @var ClientInterface The HTTP client used for API requests */
    private ClientInterface $httpClient;

    /**
     * Create a new Hetzner Cloud API client instance.
     *
     * @param  string  $apiKey  The Hetzner Cloud API key
     * @param  string  $baseUri  The base URI for the Hetzner Cloud API
     * @param  ClientInterface|null  $httpClient  Optional custom HTTP client
     */
    public function __construct(
        private readonly string $apiKey,
        private readonly string $baseUri = 'https://api.hetzner.cloud',
        ?ClientInterface $httpClient = null,
    ) {
        $this->httpClient = $httpClient ?? new GuzzleClient([
            'base_uri' => $this->baseUri,
            'timeout' => 30,
            'headers' => [
                'Authorization' => 'Bearer '.$this->apiKey,
                'Content-Type' => 'application/json',
                'User-Agent' => 'boci/hetzner-laravel',
            ],
        ]);
    }

    /**
     * Create a new client factory instance.
     */
    public static function factory(): ClientFactory
    {
        return new ClientFactory;
    }

    /**
     * Get the servers resource.
     */
    public function servers(): Servers
    {
        return new Servers($this->httpClient);
    }

    /**
     * Get the images resource.
     */
    public function images(): Images
    {
        return new Images($this->httpClient);
    }

    /**
     * Get the locations resource.
     */
    public function locations(): Locations
    {
        return new Locations($this->httpClient);
    }

    /**
     * Get the server types resource.
     */
    public function serverTypes(): ServerTypes
    {
        return new ServerTypes($this->httpClient);
    }

    /**
     * Get the SSH keys resource.
     */
    public function sshKeys(): SshKeys
    {
        return new SshKeys($this->httpClient);
    }

    /**
     * Get the certificates resource.
     */
    public function certificates(): Certificates
    {
        return new Certificates($this->httpClient);
    }

    /**
     * Get the ISOs resource.
     */
    public function isos(): ISOs
    {
        return new ISOs($this->httpClient);
    }

    /**
     * Get the placement groups resource.
     */
    public function placementGroups(): PlacementGroups
    {
        return new PlacementGroups($this->httpClient);
    }

    /**
     * Get the primary IPs resource.
     */
    public function primaryIPs(): PrimaryIPs
    {
        return new PrimaryIPs($this->httpClient);
    }

    /**
     * Get the load balancers resource.
     */
    public function loadBalancers(): LoadBalancers
    {
        return new LoadBalancers($this->httpClient);
    }

    /**
     * Get the load balancer types resource.
     */
    public function loadBalancerTypes(): LoadBalancerTypes
    {
        return new LoadBalancerTypes($this->httpClient);
    }

    /**
     * Get the billing resource.
     */
    public function billing(): Billing
    {
        return new Billing($this->httpClient);
    }

    /**
     * Get the volumes resource.
     */
    public function volumes(): Volumes
    {
        return new Volumes($this->httpClient);
    }

    /**
     * Get the firewalls resource.
     */
    public function firewalls(): Firewalls
    {
        return new Firewalls($this->httpClient);
    }

    /**
     * Get the floating IPs resource.
     */
    public function floatingIPs(): FloatingIPs
    {
        return new FloatingIPs($this->httpClient);
    }

    /**
     * Get the actions resource.
     */
    public function actions(): Actions
    {
        return new Actions($this->httpClient);
    }

    /**
     * Get the networks resource.
     */
    public function networks(): Networks
    {
        return new Networks($this->httpClient);
    }

    /**
     * Get access to the DNS zones resource
     */
    public function dnsZones(): DnsZones
    {
        return new DnsZones($this->httpClient);
    }
}

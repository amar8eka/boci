<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\LoadBalancerTypes\ListRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerTypes\RetrieveRequest;
use Boci\HetznerLaravel\Responses\LoadBalancerTypes\ListResponse;
use Boci\HetznerLaravel\Responses\LoadBalancerTypes\RetrieveResponse;
use GuzzleHttp\ClientInterface;

/**
 * Load Balancer Types Resource
 *
 * This resource class provides methods for managing load balancer types
 * in the Hetzner Cloud API.
 */
final class LoadBalancerTypes
{
    /**
     * Create a new load balancer types resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all Load Balancer Types
     *
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(array $parameters = []): ListResponse
    {
        $request = new ListRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListResponse::from($response, $request);
    }

    /**
     * Get a specific Load Balancer Type
     *
     * @param  string  $loadBalancerTypeId  The ID of the load balancer type to retrieve
     */
    public function retrieve(string $loadBalancerTypeId): RetrieveResponse
    {
        $request = new RetrieveRequest($loadBalancerTypeId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }
}

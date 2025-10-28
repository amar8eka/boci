<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\LoadBalancers\CreateRequest;
use Boci\HetznerLaravel\Requests\LoadBalancers\DeleteRequest;
use Boci\HetznerLaravel\Requests\LoadBalancers\ListRequest;
use Boci\HetznerLaravel\Requests\LoadBalancers\MetricsRequest;
use Boci\HetznerLaravel\Requests\LoadBalancers\RetrieveRequest;
use Boci\HetznerLaravel\Requests\LoadBalancers\UpdateRequest;
use Boci\HetznerLaravel\Responses\LoadBalancers\CreateResponse;
use Boci\HetznerLaravel\Responses\LoadBalancers\DeleteResponse;
use Boci\HetznerLaravel\Responses\LoadBalancers\ListResponse;
use Boci\HetznerLaravel\Responses\LoadBalancers\MetricsResponse;
use Boci\HetznerLaravel\Responses\LoadBalancers\RetrieveResponse;
use Boci\HetznerLaravel\Responses\LoadBalancers\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * Load Balancers Resource
 *
 * This resource class provides methods for managing load balancers
 * in the Hetzner Cloud API.
 */
final class LoadBalancers
{
    /**
     * Create a new load balancers resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all Load Balancers
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
     * Create a new Load Balancer
     *
     * @param  array<string, mixed>  $parameters  The load balancer creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * Get a specific Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer to retrieve
     */
    public function retrieve(string $loadBalancerId): RetrieveResponse
    {
        $request = new RetrieveRequest($loadBalancerId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $loadBalancerId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer to delete
     */
    public function delete(string $loadBalancerId): DeleteResponse
    {
        $request = new DeleteRequest($loadBalancerId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }

    /**
     * Get metrics for a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function metrics(string $loadBalancerId, array $parameters = []): MetricsResponse
    {
        $request = new MetricsRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return MetricsResponse::from($response, $request);
    }

    /**
     * Get access to Load Balancer actions
     */
    public function actions(): LoadBalancerActions
    {
        return new LoadBalancerActions($this->httpClient);
    }
}

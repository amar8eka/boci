<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\FloatingIPs\CreateRequest;
use Boci\HetznerLaravel\Requests\FloatingIPs\DeleteRequest;
use Boci\HetznerLaravel\Requests\FloatingIPs\ListRequest;
use Boci\HetznerLaravel\Requests\FloatingIPs\RetrieveRequest;
use Boci\HetznerLaravel\Requests\FloatingIPs\UpdateRequest;
use Boci\HetznerLaravel\Responses\FloatingIPs\CreateResponse;
use Boci\HetznerLaravel\Responses\FloatingIPs\DeleteResponse;
use Boci\HetznerLaravel\Responses\FloatingIPs\ListResponse;
use Boci\HetznerLaravel\Responses\FloatingIPs\RetrieveResponse;
use Boci\HetznerLaravel\Responses\FloatingIPs\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * Floating IPs Resource
 *
 * This resource class provides methods for managing floating IPs
 * in the Hetzner Cloud API.
 */
final class FloatingIPs
{
    /**
     * Create a new floating IPs resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all Floating IPs
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
     * Create a new Floating IP
     *
     * @param  array<string, mixed>  $parameters  The floating IP creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * Get a specific Floating IP
     *
     * @param  string  $floatingIpId  The ID of the floating IP to retrieve
     */
    public function retrieve(string $floatingIpId): RetrieveResponse
    {
        $request = new RetrieveRequest($floatingIpId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update a Floating IP
     *
     * @param  string  $floatingIpId  The ID of the floating IP to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $floatingIpId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($floatingIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete a Floating IP
     *
     * @param  string  $floatingIpId  The ID of the floating IP to delete
     */
    public function delete(string $floatingIpId): DeleteResponse
    {
        $request = new DeleteRequest($floatingIpId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }

    /**
     * Get access to Floating IP actions
     */
    public function actions(): FloatingIPActions
    {
        return new FloatingIPActions($this->httpClient);
    }
}

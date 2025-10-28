<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\PrimaryIPs\CreateRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPs\DeleteRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPs\ListRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPs\RetrieveRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPs\UpdateRequest;
use Boci\HetznerLaravel\Responses\PrimaryIPs\CreateResponse;
use Boci\HetznerLaravel\Responses\PrimaryIPs\DeleteResponse;
use Boci\HetznerLaravel\Responses\PrimaryIPs\ListResponse;
use Boci\HetznerLaravel\Responses\PrimaryIPs\RetrieveResponse;
use Boci\HetznerLaravel\Responses\PrimaryIPs\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * Primary IPs Resource
 *
 * This resource class provides methods for managing primary IPs
 * in the Hetzner Cloud API.
 */
final class PrimaryIPs
{
    /**
     * Create a new primary IPs resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all Primary IPs
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
     * Create a new Primary IP
     *
     * @param  array<string, mixed>  $parameters  The primary IP creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * Get a specific Primary IP
     *
     * @param  string  $primaryIpId  The ID of the primary IP to retrieve
     */
    public function retrieve(string $primaryIpId): RetrieveResponse
    {
        $request = new RetrieveRequest($primaryIpId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update a Primary IP
     *
     * @param  string  $primaryIpId  The ID of the primary IP to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $primaryIpId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($primaryIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete a Primary IP
     *
     * @param  string  $primaryIpId  The ID of the primary IP to delete
     */
    public function delete(string $primaryIpId): DeleteResponse
    {
        $request = new DeleteRequest($primaryIpId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }

    /**
     * Get access to Primary IP actions
     */
    public function actions(): PrimaryIPActions
    {
        return new PrimaryIPActions($this->httpClient);
    }
}

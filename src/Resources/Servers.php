<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\Servers\CreateRequest;
use Boci\HetznerLaravel\Requests\Servers\DeleteRequest;
use Boci\HetznerLaravel\Requests\Servers\ListRequest;
use Boci\HetznerLaravel\Requests\Servers\MetricsRequest;
use Boci\HetznerLaravel\Requests\Servers\RetrieveRequest;
use Boci\HetznerLaravel\Requests\Servers\UpdateRequest;
use Boci\HetznerLaravel\Responses\Servers\CreateResponse;
use Boci\HetznerLaravel\Responses\Servers\DeleteResponse;
use Boci\HetznerLaravel\Responses\Servers\ListResponse;
use Boci\HetznerLaravel\Responses\Servers\MetricsResponse;
use Boci\HetznerLaravel\Responses\Servers\RetrieveResponse;
use Boci\HetznerLaravel\Responses\Servers\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * Servers Resource
 *
 * This resource class provides methods for managing servers
 * in the Hetzner Cloud API, including CRUD operations and metrics.
 */
final class Servers implements ResourceContract
{
    /**
     * Create a new servers resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client for API requests
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * Create a new server.
     *
     * @param  array<string, mixed>  $parameters  The server creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * List all servers with optional filtering.
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
     * Retrieve a specific server by ID.
     *
     * @param  string  $serverId  The ID of the server to retrieve
     */
    public function retrieve(string $serverId): RetrieveResponse
    {
        $request = new RetrieveRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update a server.
     *
     * @param  string  $serverId  The ID of the server to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $serverId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete a server.
     *
     * @param  string  $serverId  The ID of the server to delete
     */
    public function delete(string $serverId): DeleteResponse
    {
        $request = new DeleteRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }

    /**
     * Get server metrics.
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  Optional query parameters
     */
    public function metrics(string $serverId, array $parameters = []): MetricsResponse
    {
        $request = new MetricsRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return MetricsResponse::from($response, $request);
    }

    /**
     * Get the server actions resource.
     */
    public function actions(): ServerActions
    {
        return new ServerActions($this->httpClient);
    }
}

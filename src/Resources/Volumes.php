<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\Volumes\CreateRequest;
use Boci\HetznerLaravel\Requests\Volumes\DeleteRequest;
use Boci\HetznerLaravel\Requests\Volumes\ListRequest;
use Boci\HetznerLaravel\Requests\Volumes\RetrieveRequest;
use Boci\HetznerLaravel\Requests\Volumes\UpdateRequest;
use Boci\HetznerLaravel\Responses\Volumes\CreateResponse;
use Boci\HetznerLaravel\Responses\Volumes\DeleteResponse;
use Boci\HetznerLaravel\Responses\Volumes\ListResponse;
use Boci\HetznerLaravel\Responses\Volumes\RetrieveResponse;
use Boci\HetznerLaravel\Responses\Volumes\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * Volumes Resource
 *
 * This resource class provides methods for managing volumes
 * in the Hetzner Cloud API.
 */
final class Volumes
{
    /**
     * Create a new volumes resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all Volumes
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
     * Create a new Volume
     *
     * @param  array<string, mixed>  $parameters  The volume creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * Get a specific Volume
     *
     * @param  string  $volumeId  The ID of the volume to retrieve
     */
    public function get(string $volumeId): RetrieveResponse
    {
        $request = new RetrieveRequest($volumeId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update a Volume
     *
     * @param  string  $volumeId  The ID of the volume to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $volumeId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($volumeId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete a Volume
     *
     * @param  string  $volumeId  The ID of the volume to delete
     */
    public function delete(string $volumeId): DeleteResponse
    {
        $request = new DeleteRequest($volumeId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }

    /**
     * Get access to Volume actions
     */
    public function actions(): VolumeActions
    {
        return new VolumeActions($this->httpClient);
    }
}

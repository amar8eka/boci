<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\PlacementGroups\CreateRequest;
use Boci\HetznerLaravel\Requests\PlacementGroups\DeleteRequest;
use Boci\HetznerLaravel\Requests\PlacementGroups\ListRequest;
use Boci\HetznerLaravel\Requests\PlacementGroups\RetrieveRequest;
use Boci\HetznerLaravel\Requests\PlacementGroups\UpdateRequest;
use Boci\HetznerLaravel\Responses\PlacementGroups\CreateResponse;
use Boci\HetznerLaravel\Responses\PlacementGroups\DeleteResponse;
use Boci\HetznerLaravel\Responses\PlacementGroups\ListResponse;
use Boci\HetznerLaravel\Responses\PlacementGroups\RetrieveResponse;
use Boci\HetznerLaravel\Responses\PlacementGroups\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * Placement Groups Resource
 *
 * This resource class provides methods for managing placement groups
 * in the Hetzner Cloud API.
 */
final class PlacementGroups implements ResourceContract
{
    /**
     * Create a new placement groups resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * List all placement groups
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
     * Create a new placement group
     *
     * @param  array<string, mixed>  $parameters  The placement group creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * Retrieve a specific placement group by ID
     *
     * @param  string  $placementGroupId  The ID of the placement group to retrieve
     */
    public function retrieve(string $placementGroupId): RetrieveResponse
    {
        $request = new RetrieveRequest($placementGroupId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update a placement group
     *
     * @param  string  $placementGroupId  The ID of the placement group to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $placementGroupId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($placementGroupId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete a placement group
     *
     * @param  string  $placementGroupId  The ID of the placement group to delete
     */
    public function delete(string $placementGroupId): DeleteResponse
    {
        $request = new DeleteRequest($placementGroupId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }
}

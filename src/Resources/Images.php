<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\Images\DeleteRequest;
use Boci\HetznerLaravel\Requests\Images\ListRequest;
use Boci\HetznerLaravel\Requests\Images\RetrieveRequest;
use Boci\HetznerLaravel\Requests\Images\UpdateRequest;
use Boci\HetznerLaravel\Responses\Images\DeleteResponse;
use Boci\HetznerLaravel\Responses\Images\ListResponse;
use Boci\HetznerLaravel\Responses\Images\RetrieveResponse;
use Boci\HetznerLaravel\Responses\Images\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * Images Resource
 *
 * This resource class provides methods for managing images
 * in the Hetzner Cloud API, including CRUD operations.
 */
final class Images implements ResourceContract
{
    /**
     * Create a new images resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client for API requests
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * List all images with optional filtering.
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
     * Retrieve a specific image by ID.
     *
     * @param  string  $imageId  The ID of the image to retrieve
     */
    public function retrieve(string $imageId): RetrieveResponse
    {
        $request = new RetrieveRequest($imageId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update an image.
     *
     * @param  string  $imageId  The ID of the image to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $imageId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($imageId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete an image.
     *
     * @param  string  $imageId  The ID of the image to delete
     */
    public function delete(string $imageId): DeleteResponse
    {
        $request = new DeleteRequest($imageId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }

    /**
     * Get the image actions resource.
     */
    public function actions(): ImageActions
    {
        return new ImageActions($this->httpClient);
    }
}

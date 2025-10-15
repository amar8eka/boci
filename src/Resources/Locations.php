<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\Locations\ListRequest;
use Boci\HetznerLaravel\Requests\Locations\RetrieveRequest;
use Boci\HetznerLaravel\Responses\Locations\ListResponse;
use Boci\HetznerLaravel\Responses\Locations\RetrieveResponse;
use GuzzleHttp\ClientInterface;

/**
 * Locations Resource
 *
 * This resource class provides methods for managing locations
 * in the Hetzner Cloud API.
 */
final class Locations implements ResourceContract
{
    /**
     * Create a new locations resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client for API requests
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * List all locations with optional filtering.
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
     * Retrieve a specific location by ID.
     *
     * @param  string  $locationId  The ID of the location to retrieve
     */
    public function retrieve(string $locationId): RetrieveResponse
    {
        $request = new RetrieveRequest($locationId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }
}

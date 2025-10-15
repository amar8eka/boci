<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\ISOs\ListRequest;
use Boci\HetznerLaravel\Requests\ISOs\RetrieveRequest;
use Boci\HetznerLaravel\Responses\ISOs\ListResponse;
use Boci\HetznerLaravel\Responses\ISOs\RetrieveResponse;
use GuzzleHttp\ClientInterface;

/**
 * ISOs Resource
 *
 * This resource class provides methods for managing ISOs
 * in the Hetzner Cloud API.
 */
final class ISOs implements ResourceContract
{
    /**
     * Create a new ISOs resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * List all ISOs
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
     * Retrieve a specific ISO by ID
     *
     * @param  string  $isoId  The ID of the ISO to retrieve
     */
    public function retrieve(string $isoId): RetrieveResponse
    {
        $request = new RetrieveRequest($isoId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }
}

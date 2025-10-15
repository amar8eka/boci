<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\Certificates\CreateRequest;
use Boci\HetznerLaravel\Requests\Certificates\DeleteRequest;
use Boci\HetznerLaravel\Requests\Certificates\ListRequest;
use Boci\HetznerLaravel\Requests\Certificates\RetrieveRequest;
use Boci\HetznerLaravel\Requests\Certificates\UpdateRequest;
use Boci\HetznerLaravel\Responses\Certificates\CreateResponse;
use Boci\HetznerLaravel\Responses\Certificates\DeleteResponse;
use Boci\HetznerLaravel\Responses\Certificates\ListResponse;
use Boci\HetznerLaravel\Responses\Certificates\RetrieveResponse;
use Boci\HetznerLaravel\Responses\Certificates\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * Certificates Resource
 *
 * This resource class provides methods for managing SSL/TLS certificates
 * in the Hetzner Cloud API.
 */
final class Certificates implements ResourceContract
{
    /**
     * Create a new certificates resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * Create a new certificate
     *
     * @param  array<string, mixed>  $parameters  The certificate creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * List all certificates
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
     * Retrieve a specific certificate by ID
     *
     * @param  string  $certificateId  The ID of the certificate to retrieve
     */
    public function retrieve(string $certificateId): RetrieveResponse
    {
        $request = new RetrieveRequest($certificateId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update a certificate
     *
     * @param  string  $certificateId  The ID of the certificate to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $certificateId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($certificateId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete a certificate
     *
     * @param  string  $certificateId  The ID of the certificate to delete
     */
    public function delete(string $certificateId): DeleteResponse
    {
        $request = new DeleteRequest($certificateId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }
}

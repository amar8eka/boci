<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\SshKeys\CreateRequest;
use Boci\HetznerLaravel\Requests\SshKeys\DeleteRequest;
use Boci\HetznerLaravel\Requests\SshKeys\ListRequest;
use Boci\HetznerLaravel\Requests\SshKeys\RetrieveRequest;
use Boci\HetznerLaravel\Requests\SshKeys\UpdateRequest;
use Boci\HetznerLaravel\Responses\SshKeys\CreateResponse;
use Boci\HetznerLaravel\Responses\SshKeys\DeleteResponse;
use Boci\HetznerLaravel\Responses\SshKeys\ListResponse;
use Boci\HetznerLaravel\Responses\SshKeys\RetrieveResponse;
use Boci\HetznerLaravel\Responses\SshKeys\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * SSH Keys Resource
 *
 * This resource class provides methods for managing SSH keys
 * in the Hetzner Cloud API.
 */
final class SshKeys implements ResourceContract
{
    /**
     * Create a new SSH keys resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * Create a new SSH key
     *
     * @param  array<string, mixed>  $parameters  The SSH key creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * List all SSH keys
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
     * Retrieve a specific SSH key by ID
     *
     * @param  string  $sshKeyId  The ID of the SSH key to retrieve
     */
    public function retrieve(string $sshKeyId): RetrieveResponse
    {
        $request = new RetrieveRequest($sshKeyId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update an SSH key
     *
     * @param  string  $sshKeyId  The ID of the SSH key to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $sshKeyId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($sshKeyId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete an SSH key
     *
     * @param  string  $sshKeyId  The ID of the SSH key to delete
     */
    public function delete(string $sshKeyId): DeleteResponse
    {
        $request = new DeleteRequest($sshKeyId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }
}

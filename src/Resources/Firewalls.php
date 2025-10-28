<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\Firewalls\CreateRequest;
use Boci\HetznerLaravel\Requests\Firewalls\DeleteRequest;
use Boci\HetznerLaravel\Requests\Firewalls\ListRequest;
use Boci\HetznerLaravel\Requests\Firewalls\RetrieveRequest;
use Boci\HetznerLaravel\Requests\Firewalls\UpdateRequest;
use Boci\HetznerLaravel\Responses\Firewalls\CreateResponse;
use Boci\HetznerLaravel\Responses\Firewalls\DeleteResponse;
use Boci\HetznerLaravel\Responses\Firewalls\ListResponse;
use Boci\HetznerLaravel\Responses\Firewalls\RetrieveResponse;
use Boci\HetznerLaravel\Responses\Firewalls\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * Firewalls Resource
 *
 * This resource class provides methods for managing firewalls
 * in the Hetzner Cloud API.
 */
final class Firewalls
{
    /**
     * Create a new firewalls resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all Firewalls
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
     * Create a new Firewall
     *
     * @param  array<string, mixed>  $parameters  The firewall creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * Get a specific Firewall
     *
     * @param  string  $firewallId  The ID of the firewall to retrieve
     */
    public function retrieve(string $firewallId): RetrieveResponse
    {
        $request = new RetrieveRequest($firewallId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update a Firewall
     *
     * @param  string  $firewallId  The ID of the firewall to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $firewallId, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($firewallId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete a Firewall
     *
     * @param  string  $firewallId  The ID of the firewall to delete
     */
    public function delete(string $firewallId): DeleteResponse
    {
        $request = new DeleteRequest($firewallId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }

    /**
     * Get access to Firewall actions
     */
    public function actions(): FirewallActions
    {
        return new FirewallActions($this->httpClient);
    }
}

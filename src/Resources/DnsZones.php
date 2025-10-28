<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\DnsZones\CreateRequest;
use Boci\HetznerLaravel\Requests\DnsZones\DeleteRequest;
use Boci\HetznerLaravel\Requests\DnsZones\ExportRequest;
use Boci\HetznerLaravel\Requests\DnsZones\ImportRequest;
use Boci\HetznerLaravel\Requests\DnsZones\ListRequest;
use Boci\HetznerLaravel\Requests\DnsZones\RetrieveRequest;
use Boci\HetznerLaravel\Requests\DnsZones\UpdateRequest;
use Boci\HetznerLaravel\Responses\DnsZones\CreateResponse;
use Boci\HetznerLaravel\Responses\DnsZones\DeleteResponse;
use Boci\HetznerLaravel\Responses\DnsZones\ExportResponse;
use Boci\HetznerLaravel\Responses\DnsZones\ImportResponse;
use Boci\HetznerLaravel\Responses\DnsZones\ListResponse;
use Boci\HetznerLaravel\Responses\DnsZones\RetrieveResponse;
use Boci\HetznerLaravel\Responses\DnsZones\UpdateResponse;
use GuzzleHttp\ClientInterface;

/**
 * DNS Zones Resource
 *
 * This resource class provides methods for managing DNS zones
 * in the Hetzner Cloud API.
 */
final class DnsZones
{
    /**
     * Create a new DNS zones resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all DNS zones
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
     * Create a new DNS zone
     *
     * @param  array<string, mixed>  $parameters  The DNS zone creation parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $request = new CreateRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return CreateResponse::from($response, $request);
    }

    /**
     * Get a specific DNS zone
     *
     * @param  string  $zoneIdOrName  The ID or name of the DNS zone to retrieve
     */
    public function retrieve(string $zoneIdOrName): RetrieveResponse
    {
        $request = new RetrieveRequest($zoneIdOrName);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return RetrieveResponse::from($response, $request);
    }

    /**
     * Update a DNS zone
     *
     * @param  string  $zoneIdOrName  The ID or name of the DNS zone to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function update(string $zoneIdOrName, array $parameters): UpdateResponse
    {
        $request = new UpdateRequest($zoneIdOrName, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return UpdateResponse::from($response, $request);
    }

    /**
     * Delete a DNS zone
     *
     * @param  string  $zoneIdOrName  The ID or name of the DNS zone to delete
     */
    public function delete(string $zoneIdOrName): DeleteResponse
    {
        $request = new DeleteRequest($zoneIdOrName);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return DeleteResponse::from($response, $request);
    }

    /**
     * Export a DNS zone file
     *
     * @param  string  $zoneIdOrName  The ID or name of the DNS zone to export
     */
    public function export(string $zoneIdOrName): ExportResponse
    {
        $request = new ExportRequest($zoneIdOrName);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ExportResponse::from($response, $request);
    }

    /**
     * Import a DNS zone file
     *
     * @param  array<string, mixed>  $parameters  The import parameters
     */
    public function import(array $parameters): ImportResponse
    {
        $request = new ImportRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ImportResponse::from($response, $request);
    }

    /**
     * Get access to DNS zone actions
     */
    public function actions(): DnsZoneActions
    {
        return new DnsZoneActions($this->httpClient);
    }

    /**
     * Get access to DNS RRSets
     */
    public function rrsets(): DnsRrsets
    {
        return new DnsRrsets($this->httpClient);
    }
}

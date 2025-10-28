<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\DnsZoneActions\ChangeDefaultTtlRequest;
use Boci\HetznerLaravel\Requests\DnsZoneActions\ChangeNameserversRequest;
use Boci\HetznerLaravel\Requests\DnsZoneActions\ChangeProtectionRequest;
use Boci\HetznerLaravel\Requests\DnsZoneActions\GetActionRequest;
use Boci\HetznerLaravel\Requests\DnsZoneActions\ListActionsRequest;
use Boci\HetznerLaravel\Responses\DnsZoneActions\ActionResponse;
use Boci\HetznerLaravel\Responses\DnsZoneActions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * DNS Zone Actions Resource
 *
 * This resource class provides methods for managing DNS zone actions
 * in the Hetzner Cloud API.
 */
final class DnsZoneActions
{
    /**
     * Create a new DNS zone actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all actions for a DNS zone
     *
     * @param  string  $zoneIdOrName  The ID or name of the DNS zone
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(string $zoneIdOrName, array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($zoneIdOrName, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Get a specific action for a DNS zone
     *
     * @param  string  $zoneIdOrName  The ID or name of the DNS zone
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function retrieve(string $zoneIdOrName, string $actionId): ActionResponse
    {
        $request = new GetActionRequest($zoneIdOrName, $actionId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change a zone's primary nameservers
     *
     * @param  string  $zoneIdOrName  The ID or name of the DNS zone
     * @param  array<string, mixed>  $parameters  The nameserver parameters
     */
    public function changeNameservers(string $zoneIdOrName, array $parameters): ActionResponse
    {
        $request = new ChangeNameserversRequest($zoneIdOrName, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change a zone's protection
     *
     * @param  string  $zoneIdOrName  The ID or name of the DNS zone
     * @param  array<string, mixed>  $parameters  The protection parameters
     */
    public function changeProtection(string $zoneIdOrName, array $parameters): ActionResponse
    {
        $request = new ChangeProtectionRequest($zoneIdOrName, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change a zone's default TTL
     *
     * @param  string  $zoneIdOrName  The ID or name of the DNS zone
     * @param  array<string, mixed>  $parameters  The TTL parameters
     */
    public function changeDefaultTtl(string $zoneIdOrName, array $parameters): ActionResponse
    {
        $request = new ChangeDefaultTtlRequest($zoneIdOrName, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }
}

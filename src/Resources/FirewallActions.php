<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\FirewallActions\ApplyToResourcesRequest;
use Boci\HetznerLaravel\Requests\FirewallActions\GetActionRequest;
use Boci\HetznerLaravel\Requests\FirewallActions\ListActionsRequest;
use Boci\HetznerLaravel\Requests\FirewallActions\RemoveFromResourcesRequest;
use Boci\HetznerLaravel\Requests\FirewallActions\SetRulesRequest;
use Boci\HetznerLaravel\Responses\FirewallActions\ActionResponse;
use Boci\HetznerLaravel\Responses\FirewallActions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * Firewall Actions Resource
 *
 * This resource class provides methods for managing firewall actions
 * in the Hetzner Cloud API.
 */
final class FirewallActions
{
    /**
     * Create a new firewall actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all Actions for a Firewall
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(string $firewallId, array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($firewallId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Get a specific Action for a Firewall
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function retrieve(string $firewallId, string $actionId): ActionResponse
    {
        $request = new GetActionRequest($firewallId, $actionId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Apply a Firewall to resources
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  array<string, mixed>  $parameters  The resources to apply the firewall to
     */
    public function applyToResources(string $firewallId, array $parameters): ActionResponse
    {
        $request = new ApplyToResourcesRequest($firewallId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Remove a Firewall from resources
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  array<string, mixed>  $parameters  The resources to remove the firewall from
     */
    public function removeFromResources(string $firewallId, array $parameters): ActionResponse
    {
        $request = new RemoveFromResourcesRequest($firewallId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Set rules for a Firewall
     *
     * @param  string  $firewallId  The ID of the firewall
     * @param  array<string, mixed>  $parameters  The firewall rules to set
     */
    public function setRules(string $firewallId, array $parameters): ActionResponse
    {
        $request = new SetRulesRequest($firewallId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }
}

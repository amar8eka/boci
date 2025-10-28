<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\NetworkActions\AddRouteRequest;
use Boci\HetznerLaravel\Requests\NetworkActions\AddSubnetRequest;
use Boci\HetznerLaravel\Requests\NetworkActions\ChangeIpRangeRequest;
use Boci\HetznerLaravel\Requests\NetworkActions\ChangeProtectionRequest;
use Boci\HetznerLaravel\Requests\NetworkActions\DeleteRouteRequest;
use Boci\HetznerLaravel\Requests\NetworkActions\DeleteSubnetRequest;
use Boci\HetznerLaravel\Requests\NetworkActions\GetActionRequest;
use Boci\HetznerLaravel\Requests\NetworkActions\ListActionsRequest;
use Boci\HetznerLaravel\Responses\NetworkActions\ActionResponse;
use Boci\HetznerLaravel\Responses\NetworkActions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * Network Actions Resource
 *
 * This resource class provides methods for managing network actions
 * in the Hetzner Cloud API.
 */
final class NetworkActions implements ResourceContract
{
    /**
     * Create a new network actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * List all actions for a network
     *
     * @param  string  $networkId  The ID of the network
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(string $networkId, array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($networkId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Get a specific action for a network
     *
     * @param  string  $networkId  The ID of the network
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function retrieve(string $networkId, string $actionId): ActionResponse
    {
        $request = new GetActionRequest($networkId, $actionId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Add a route to a network
     *
     * @param  string  $networkId  The ID of the network
     * @param  array<string, mixed>  $parameters  The route parameters
     */
    public function addRoute(string $networkId, array $parameters): ActionResponse
    {
        $request = new AddRouteRequest($networkId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Add a subnet to a network
     *
     * @param  string  $networkId  The ID of the network
     * @param  array<string, mixed>  $parameters  The subnet parameters
     */
    public function addSubnet(string $networkId, array $parameters): ActionResponse
    {
        $request = new AddSubnetRequest($networkId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change the IP range of a network
     *
     * @param  string  $networkId  The ID of the network
     * @param  array<string, mixed>  $parameters  The IP range parameters
     */
    public function changeIpRange(string $networkId, array $parameters): ActionResponse
    {
        $request = new ChangeIpRangeRequest($networkId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change protection settings for a network
     *
     * @param  string  $networkId  The ID of the network
     * @param  array<string, mixed>  $parameters  The protection parameters
     */
    public function changeProtection(string $networkId, array $parameters): ActionResponse
    {
        $request = new ChangeProtectionRequest($networkId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Delete a route from a network
     *
     * @param  string  $networkId  The ID of the network
     * @param  string  $routeId  The ID of the route to delete
     */
    public function deleteRoute(string $networkId, string $routeId): ActionResponse
    {
        $request = new DeleteRouteRequest($networkId, $routeId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Delete a subnet from a network
     *
     * @param  string  $networkId  The ID of the network
     * @param  string  $subnetId  The ID of the subnet to delete
     */
    public function deleteSubnet(string $networkId, string $subnetId): ActionResponse
    {
        $request = new DeleteSubnetRequest($networkId, $subnetId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }
}

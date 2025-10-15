<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\PrimaryIPActions\AssignRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPActions\ChangeProtectionRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPActions\ChangeReverseDnsRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPActions\GetActionByIdRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPActions\GetActionRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPActions\ListActionsRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPActions\ListAllActionsRequest;
use Boci\HetznerLaravel\Requests\PrimaryIPActions\UnassignRequest;
use Boci\HetznerLaravel\Responses\PrimaryIPActions\ActionResponse;
use Boci\HetznerLaravel\Responses\PrimaryIPActions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * Primary IP Actions Resource
 *
 * This resource class provides methods for managing primary IP actions
 * in the Hetzner Cloud API.
 */
final class PrimaryIPActions
{
    /**
     * Create a new primary IP actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all actions (general)
     *
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function listAll(array $parameters = []): ListActionsResponse
    {
        $request = new ListAllActionsRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * List all actions for a Primary IP
     *
     * @param  string  $primaryIpId  The ID of the primary IP
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(string $primaryIpId, array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($primaryIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Get a specific action by ID (general)
     *
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function getById(string $actionId): ActionResponse
    {
        $request = new GetActionByIdRequest($actionId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Get a specific action for a Primary IP
     *
     * @param  string  $primaryIpId  The ID of the primary IP
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function get(string $primaryIpId, string $actionId): ActionResponse
    {
        $request = new GetActionRequest($primaryIpId, $actionId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Assign a Primary IP to a resource
     *
     * @param  string  $primaryIpId  The ID of the primary IP
     * @param  array<string, mixed>  $parameters  The assignment parameters
     */
    public function assign(string $primaryIpId, array $parameters): ActionResponse
    {
        $request = new AssignRequest($primaryIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change reverse DNS records for a Primary IP
     *
     * @param  string  $primaryIpId  The ID of the primary IP
     * @param  array<string, mixed>  $parameters  The reverse DNS parameters
     */
    public function changeReverseDns(string $primaryIpId, array $parameters): ActionResponse
    {
        $request = new ChangeReverseDnsRequest($primaryIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change Primary IP protection
     *
     * @param  string  $primaryIpId  The ID of the primary IP
     * @param  array<string, mixed>  $parameters  The protection parameters
     */
    public function changeProtection(string $primaryIpId, array $parameters): ActionResponse
    {
        $request = new ChangeProtectionRequest($primaryIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Unassign a Primary IP from a resource
     *
     * @param  string  $primaryIpId  The ID of the primary IP
     */
    public function unassign(string $primaryIpId): ActionResponse
    {
        $request = new UnassignRequest($primaryIpId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }
}

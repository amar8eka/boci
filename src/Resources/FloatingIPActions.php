<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\FloatingIPActions\AssignRequest;
use Boci\HetznerLaravel\Requests\FloatingIPActions\ChangeProtectionRequest;
use Boci\HetznerLaravel\Requests\FloatingIPActions\ChangeReverseDnsRequest;
use Boci\HetznerLaravel\Requests\FloatingIPActions\GetActionRequest;
use Boci\HetznerLaravel\Requests\FloatingIPActions\ListActionsRequest;
use Boci\HetznerLaravel\Requests\FloatingIPActions\UnassignRequest;
use Boci\HetznerLaravel\Responses\FloatingIPActions\ActionResponse;
use Boci\HetznerLaravel\Responses\FloatingIPActions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * Floating IP Actions Resource
 *
 * This resource class provides methods for managing floating IP actions
 * in the Hetzner Cloud API.
 */
final class FloatingIPActions
{
    /**
     * Create a new floating IP actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all Actions for a Floating IP
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(string $floatingIpId, array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($floatingIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Get a specific Action for a Floating IP
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function get(string $floatingIpId, string $actionId): ActionResponse
    {
        $request = new GetActionRequest($floatingIpId, $actionId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Assign a Floating IP to a Server
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  array<string, mixed>  $parameters  The assignment parameters
     */
    public function assign(string $floatingIpId, array $parameters): ActionResponse
    {
        $request = new AssignRequest($floatingIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Unassign a Floating IP from a Server
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     */
    public function unassign(string $floatingIpId): ActionResponse
    {
        $request = new UnassignRequest($floatingIpId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change reverse DNS records for a Floating IP
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  array<string, mixed>  $parameters  The reverse DNS parameters
     */
    public function changeReverseDns(string $floatingIpId, array $parameters): ActionResponse
    {
        $request = new ChangeReverseDnsRequest($floatingIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change Floating IP protection
     *
     * @param  string  $floatingIpId  The ID of the floating IP
     * @param  array<string, mixed>  $parameters  The protection parameters
     */
    public function changeProtection(string $floatingIpId, array $parameters): ActionResponse
    {
        $request = new ChangeProtectionRequest($floatingIpId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }
}

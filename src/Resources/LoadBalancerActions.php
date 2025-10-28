<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\LoadBalancerActions\AddServiceRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\AddTargetRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\AttachToNetworkRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\ChangeAlgorithmRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\ChangeProtectionRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\ChangeReverseDnsRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\ChangeTypeRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\DeleteServiceRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\DetachFromNetworkRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\DisablePublicInterfaceRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\EnablePublicInterfaceRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\GetActionRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\ListActionsRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\RemoveTargetRequest;
use Boci\HetznerLaravel\Requests\LoadBalancerActions\UpdateServiceRequest;
use Boci\HetznerLaravel\Responses\LoadBalancerActions\ActionResponse;
use Boci\HetznerLaravel\Responses\LoadBalancerActions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * Load Balancer Actions Resource
 *
 * This resource class provides methods for managing load balancer actions
 * in the Hetzner Cloud API.
 */
final class LoadBalancerActions
{
    /**
     * Create a new load balancer actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all actions for a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(string $loadBalancerId, array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Get a specific action for a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function retrieve(string $loadBalancerId, string $actionId): ActionResponse
    {
        $request = new GetActionRequest($loadBalancerId, $actionId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Add a service to a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The service parameters
     */
    public function addService(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new AddServiceRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Update a service on a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The service update parameters
     */
    public function updateService(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new UpdateServiceRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Delete a service from a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The service deletion parameters
     */
    public function deleteService(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new DeleteServiceRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Add a target to a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The target parameters
     */
    public function addTarretrieve(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new AddTargetRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Remove a target from a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The target removal parameters
     */
    public function removeTarretrieve(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new RemoveTargetRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change the algorithm of a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The algorithm parameters
     */
    public function changeAlgorithm(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new ChangeAlgorithmRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change reverse DNS entry for a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The reverse DNS parameters
     */
    public function changeReverseDns(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new ChangeReverseDnsRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change Load Balancer protection
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The protection parameters
     */
    public function changeProtection(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new ChangeProtectionRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change the type of a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The type change parameters
     */
    public function changeType(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new ChangeTypeRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Attach a Load Balancer to a Network
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The network attachment parameters
     */
    public function attachToNetwork(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new AttachToNetworkRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Detach a Load Balancer from a Network
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The network detachment parameters
     */
    public function detachFromNetwork(string $loadBalancerId, array $parameters): ActionResponse
    {
        $request = new DetachFromNetworkRequest($loadBalancerId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Enable the public interface of a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     */
    public function enablePublicInterface(string $loadBalancerId): ActionResponse
    {
        $request = new EnablePublicInterfaceRequest($loadBalancerId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Disable the public interface of a Load Balancer
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     */
    public function disablePublicInterface(string $loadBalancerId): ActionResponse
    {
        $request = new DisablePublicInterfaceRequest($loadBalancerId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }
}

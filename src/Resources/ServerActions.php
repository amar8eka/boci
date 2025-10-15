<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\ServerActions\AddToPlacementGroupRequest;
use Boci\HetznerLaravel\Requests\ServerActions\AttachIsoRequest;
use Boci\HetznerLaravel\Requests\ServerActions\AttachToNetworkRequest;
use Boci\HetznerLaravel\Requests\ServerActions\ChangeAliasIpsRequest;
use Boci\HetznerLaravel\Requests\ServerActions\ChangeProtectionRequest;
use Boci\HetznerLaravel\Requests\ServerActions\ChangeReverseDnsRequest;
use Boci\HetznerLaravel\Requests\ServerActions\ChangeServerTypeRequest;
use Boci\HetznerLaravel\Requests\ServerActions\CreateImageRequest;
use Boci\HetznerLaravel\Requests\ServerActions\DetachFromNetworkRequest;
use Boci\HetznerLaravel\Requests\ServerActions\DetachIsoRequest;
use Boci\HetznerLaravel\Requests\ServerActions\DisableBackupsRequest;
use Boci\HetznerLaravel\Requests\ServerActions\DisableRescueModeRequest;
use Boci\HetznerLaravel\Requests\ServerActions\EnableBackupsRequest;
use Boci\HetznerLaravel\Requests\ServerActions\EnableRescueModeRequest;
use Boci\HetznerLaravel\Requests\ServerActions\ListActionsRequest;
use Boci\HetznerLaravel\Requests\ServerActions\PowerOffRequest;
use Boci\HetznerLaravel\Requests\ServerActions\PowerOnRequest;
use Boci\HetznerLaravel\Requests\ServerActions\RebootRequest;
use Boci\HetznerLaravel\Requests\ServerActions\RebuildRequest;
use Boci\HetznerLaravel\Requests\ServerActions\RemoveFromPlacementGroupRequest;
use Boci\HetznerLaravel\Requests\ServerActions\RequestConsoleRequest;
use Boci\HetznerLaravel\Requests\ServerActions\ResetPasswordRequest;
use Boci\HetznerLaravel\Requests\ServerActions\ResetRequest;
use Boci\HetznerLaravel\Requests\ServerActions\ShutdownRequest;
use Boci\HetznerLaravel\Responses\ServerActions\ActionResponse;
use Boci\HetznerLaravel\Responses\ServerActions\ConsoleResponse;
use Boci\HetznerLaravel\Responses\ServerActions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * Server Actions Resource
 *
 * This resource class provides methods for managing server actions
 * in the Hetzner Cloud API.
 */
final class ServerActions implements ResourceContract
{
    /**
     * Create a new server actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * List all actions for a server
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(string $serverId, array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Power on a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function powerOn(string $serverId): ActionResponse
    {
        $request = new PowerOnRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Power off a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function powerOff(string $serverId): ActionResponse
    {
        $request = new PowerOffRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Reboot a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function reboot(string $serverId): ActionResponse
    {
        $request = new RebootRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Shutdown a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function shutdown(string $serverId): ActionResponse
    {
        $request = new ShutdownRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Reset a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function reset(string $serverId): ActionResponse
    {
        $request = new ResetRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change protection settings for a server
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The protection parameters
     */
    public function changeProtection(string $serverId, array $parameters): ActionResponse
    {
        $request = new ChangeProtectionRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change the type of a server
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The server type parameters
     */
    public function changeServerType(string $serverId, array $parameters): ActionResponse
    {
        $request = new ChangeServerTypeRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Rebuild a server
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The rebuild parameters
     */
    public function rebuild(string $serverId, array $parameters): ActionResponse
    {
        $request = new RebuildRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Create an image from a server
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The image creation parameters
     */
    public function createImage(string $serverId, array $parameters): ActionResponse
    {
        $request = new CreateImageRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Reset password for a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function resetPassword(string $serverId): ActionResponse
    {
        $request = new ResetPasswordRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Request console for a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function requestConsole(string $serverId): ConsoleResponse
    {
        $request = new RequestConsoleRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ConsoleResponse::from($response, $request);
    }

    /**
     * Attach a server to a network
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The network attachment parameters
     */
    public function attachToNetwork(string $serverId, array $parameters): ActionResponse
    {
        $request = new AttachToNetworkRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Detach a server from a network
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The network detachment parameters
     */
    public function detachFromNetwork(string $serverId, array $parameters): ActionResponse
    {
        $request = new DetachFromNetworkRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change alias IPs for a server
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The alias IP parameters
     */
    public function changeAliasIps(string $serverId, array $parameters): ActionResponse
    {
        $request = new ChangeAliasIpsRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Attach an ISO to a server
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The ISO attachment parameters
     */
    public function attachIso(string $serverId, array $parameters): ActionResponse
    {
        $request = new AttachIsoRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Detach an ISO from a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function detachIso(string $serverId): ActionResponse
    {
        $request = new DetachIsoRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Add a server to a placement group
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The placement group parameters
     */
    public function addToPlacementGroup(string $serverId, array $parameters): ActionResponse
    {
        $request = new AddToPlacementGroupRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Remove a server from a placement group
     *
     * @param  string  $serverId  The ID of the server
     */
    public function removeFromPlacementGroup(string $serverId): ActionResponse
    {
        $request = new RemoveFromPlacementGroupRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Enable backups for a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function enableBackups(string $serverId): ActionResponse
    {
        $request = new EnableBackupsRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Disable backups for a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function disableBackups(string $serverId): ActionResponse
    {
        $request = new DisableBackupsRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Enable rescue mode for a server
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The rescue mode parameters
     */
    public function enableRescueMode(string $serverId, array $parameters = []): ActionResponse
    {
        $request = new EnableRescueModeRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Disable rescue mode for a server
     *
     * @param  string  $serverId  The ID of the server
     */
    public function disableRescueMode(string $serverId): ActionResponse
    {
        $request = new DisableRescueModeRequest($serverId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change reverse DNS for a server
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The reverse DNS parameters
     */
    public function changeReverseDns(string $serverId, array $parameters): ActionResponse
    {
        $request = new ChangeReverseDnsRequest($serverId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }
}

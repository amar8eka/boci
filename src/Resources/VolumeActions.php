<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\VolumeActions\AttachRequest;
use Boci\HetznerLaravel\Requests\VolumeActions\ChangeProtectionRequest;
use Boci\HetznerLaravel\Requests\VolumeActions\DetachRequest;
use Boci\HetznerLaravel\Requests\VolumeActions\GetActionRequest;
use Boci\HetznerLaravel\Requests\VolumeActions\ListActionsRequest;
use Boci\HetznerLaravel\Requests\VolumeActions\ResizeRequest;
use Boci\HetznerLaravel\Responses\VolumeActions\ActionResponse;
use Boci\HetznerLaravel\Responses\VolumeActions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * Volume Actions Resource
 *
 * This resource class provides methods for managing volume actions
 * in the Hetzner Cloud API.
 */
final class VolumeActions
{
    /**
     * Create a new volume actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all actions for a Volume
     *
     * @param  string  $volumeId  The ID of the volume
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(string $volumeId, array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($volumeId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Get a specific action for a Volume
     *
     * @param  string  $volumeId  The ID of the volume
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function get(string $volumeId, string $actionId): ActionResponse
    {
        $request = new GetActionRequest($volumeId, $actionId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Attach a Volume to a Server
     *
     * @param  string  $volumeId  The ID of the volume
     * @param  array<string, mixed>  $parameters  The attachment parameters
     */
    public function attach(string $volumeId, array $parameters): ActionResponse
    {
        $request = new AttachRequest($volumeId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Detach a Volume from a Server
     *
     * @param  string  $volumeId  The ID of the volume
     */
    public function detach(string $volumeId): ActionResponse
    {
        $request = new DetachRequest($volumeId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Resize a Volume
     *
     * @param  string  $volumeId  The ID of the volume
     * @param  array<string, mixed>  $parameters  The resize parameters
     */
    public function resize(string $volumeId, array $parameters): ActionResponse
    {
        $request = new ResizeRequest($volumeId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change Volume protection
     *
     * @param  string  $volumeId  The ID of the volume
     * @param  array<string, mixed>  $parameters  The protection parameters
     */
    public function changeProtection(string $volumeId, array $parameters): ActionResponse
    {
        $request = new ChangeProtectionRequest($volumeId, $parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }
}

<?php

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Contracts\ResourceContract;
use Boci\HetznerLaravel\Requests\ImageActions\ChangeProtectionRequest;
use Boci\HetznerLaravel\Requests\ImageActions\GetActionRequest;
use Boci\HetznerLaravel\Requests\ImageActions\ListActionsRequest;
use Boci\HetznerLaravel\Responses\ImageActions\ActionResponse;
use Boci\HetznerLaravel\Responses\ImageActions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * Image Actions Resource
 *
 * This resource class provides methods for managing image actions
 * in the Hetzner Cloud API.
 */
final class ImageActions implements ResourceContract
{
    /**
     * Create a new image actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient,
    ) {}

    /**
     * List all actions for an image
     *
     * @param  string  $imageId  The ID of the image
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(string $imageId, array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($imageId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Get a specific action for an image
     *
     * @param  string  $imageId  The ID of the image
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function get(string $imageId, string $actionId): ActionResponse
    {
        $request = new GetActionRequest($imageId, $actionId);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }

    /**
     * Change protection settings for an image
     *
     * @param  string  $imageId  The ID of the image
     * @param  array<string, mixed>  $parameters  The protection parameters
     */
    public function changeProtection(string $imageId, array $parameters): ActionResponse
    {
        $request = new ChangeProtectionRequest($imageId, $parameters);

        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ActionResponse::from($response, $request);
    }
}

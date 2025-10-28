<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Resources;

use Boci\HetznerLaravel\Requests\Actions\GetActionRequest;
use Boci\HetznerLaravel\Requests\Actions\ListActionsRequest;
use Boci\HetznerLaravel\Responses\Actions\GetActionResponse;
use Boci\HetznerLaravel\Responses\Actions\ListActionsResponse;
use GuzzleHttp\ClientInterface;

/**
 * Actions Resource
 *
 * This resource class provides methods for managing actions
 * in the Hetzner Cloud API.
 */
final class Actions
{
    /**
     * Create a new actions resource instance.
     *
     * @param  ClientInterface  $httpClient  The HTTP client instance
     */
    public function __construct(
        private readonly ClientInterface $httpClient
    ) {}

    /**
     * List all actions
     *
     * @param  array<string, mixed>  $parameters  Optional query parameters for filtering
     */
    public function list(array $parameters = []): ListActionsResponse
    {
        $request = new ListActionsRequest($parameters);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return ListActionsResponse::from($response, $request);
    }

    /**
     * Get a specific action by ID
     *
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function retrieve(string $actionId): GetActionResponse
    {
        $request = new GetActionRequest($actionId);
        $response = $this->httpClient->request($request->method(), $request->uri(), $request->options());

        return GetActionResponse::from($response, $request);
    }
}

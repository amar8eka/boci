<?php

namespace Boci\HetznerLaravel\Requests\ImageActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Get Image Action Request
 *
 * This request class is used to retrieve a specific action for an image
 * from the Hetzner Cloud API.
 */
final class GetActionRequest extends Request
{
    /**
     * Create a new get image action request instance.
     *
     * @param  string  $imageId  The ID of the image
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function __construct(
        private readonly string $imageId,
        private readonly string $actionId,
    ) {
        parent::__construct();
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'GET';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/images/{$this->imageId}/actions/{$this->actionId}";
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [];
    }
}

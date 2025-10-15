<?php

namespace Boci\HetznerLaravel\Requests\Images;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Delete Image Request
 *
 * This request class is used to delete an image
 * from the Hetzner Cloud API.
 */
final class DeleteRequest extends Request
{
    /**
     * Create a new delete image request instance.
     *
     * @param  string  $imageId  The ID of the image to delete
     */
    public function __construct(
        private readonly string $imageId,
    ) {
        parent::__construct();
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'DELETE';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/images/{$this->imageId}";
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

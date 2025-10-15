<?php

namespace Boci\HetznerLaravel\Requests\Images;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Update Image Request
 *
 * This request class is used to update an image's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest extends Request
{
    /**
     * Create a new update image request instance.
     *
     * @param  string  $imageId  The ID of the image to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function __construct(
        private readonly string $imageId,
        array $parameters = [],
    ) {
        parent::__construct($parameters);
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'PUT';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/images/{$this->imageId}";
    }
}

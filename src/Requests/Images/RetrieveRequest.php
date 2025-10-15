<?php

namespace Boci\HetznerLaravel\Requests\Images;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve Image Request
 *
 * This request class is used to retrieve a specific image by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve image request instance.
     *
     * @param  string  $imageId  The ID of the image to retrieve
     * @param  array<string, mixed>  $parameters  Optional additional parameters
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
        return 'GET';
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

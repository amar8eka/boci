<?php

namespace Boci\HetznerLaravel\Requests\ImageActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Change Image Protection Request
 *
 * This request class is used to change the protection settings of an image
 * in the Hetzner Cloud API.
 */
final class ChangeProtectionRequest extends Request
{
    /**
     * Create a new change image protection request instance.
     *
     * @param  string  $imageId  The ID of the image
     * @param  array<string, mixed>  $parameters  The protection settings to change
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
        return 'POST';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/images/{$this->imageId}/actions/change_protection";
    }
}

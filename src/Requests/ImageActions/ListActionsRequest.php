<?php

namespace Boci\HetznerLaravel\Requests\ImageActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List Image Actions Request
 *
 * This request class is used to retrieve a list of actions for a specific image
 * from the Hetzner Cloud API with optional filtering parameters.
 */
final class ListActionsRequest extends Request
{
    /**
     * Create a new list image actions request instance.
     *
     * @param  string  $imageId  The ID of the image
     * @param  array<string, mixed>  $parameters  Optional filtering parameters
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
        return "/v1/images/{$this->imageId}/actions";
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [
            'query' => $this->parameters,
        ];
    }
}

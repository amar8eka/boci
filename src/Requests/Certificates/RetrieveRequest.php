<?php

namespace Boci\HetznerLaravel\Requests\Certificates;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve Certificate Request
 *
 * This request class is used to retrieve a specific certificate by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve certificate request instance.
     *
     * @param  string  $certificateId  The ID of the certificate to retrieve
     * @param  array<string, mixed>  $parameters  Optional additional parameters
     */
    public function __construct(
        private readonly string $certificateId,
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
        return "/v1/certificates/{$this->certificateId}";
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

<?php

namespace Boci\HetznerLaravel\Requests\Certificates;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Update Certificate Request
 *
 * This request class is used to update a certificate's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest extends Request
{
    /**
     * Create a new update certificate request instance.
     *
     * @param  string  $certificateId  The ID of the certificate to update
     * @param  array<string, mixed>  $parameters  The update parameters
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
        return 'PUT';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/certificates/{$this->certificateId}";
    }
}

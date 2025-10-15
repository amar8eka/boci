<?php

namespace Boci\HetznerLaravel\Requests\SshKeys;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve SSH Key Request
 *
 * This request class is used to retrieve a specific SSH key by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve SSH key request instance.
     *
     * @param  string  $sshKeyId  The ID of the SSH key to retrieve
     * @param  array<string, mixed>  $parameters  Optional additional parameters
     */
    public function __construct(
        private readonly string $sshKeyId,
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
        return "/v1/ssh_keys/{$this->sshKeyId}";
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

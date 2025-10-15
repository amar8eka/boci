<?php

namespace Boci\HetznerLaravel;

use GuzzleHttp\ClientInterface;

/**
 * Client Factory for creating Hetzner Cloud API clients
 *
 * This factory provides a fluent interface for configuring and creating
 * Hetzner Cloud API client instances with custom settings.
 */
final class ClientFactory
{
    /** @var string The API key for authentication */
    private string $apiKey = '';

    /** @var string The base URI for the API */
    private string $baseUri = 'https://api.hetzner.cloud/v1';

    /** @var ClientInterface|null Optional custom HTTP client */
    private ?ClientInterface $httpClient = null;

    /**
     * Set the API key for authentication.
     *
     * @param  string  $apiKey  The Hetzner Cloud API key
     */
    public function withApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Set the base URI for the API.
     *
     * @param  string  $baseUri  The base URI for the Hetzner Cloud API
     */
    public function withBaseUri(string $baseUri): self
    {
        $this->baseUri = $baseUri;

        return $this;
    }

    /**
     * Set a custom HTTP client.
     *
     * @param  ClientInterface  $httpClient  The custom HTTP client
     */
    public function withHttpClient(ClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * Create a new client instance with the configured settings.
     */
    public function make(): Client
    {
        return new Client(
            $this->apiKey,
            $this->baseUri,
            $this->httpClient,
        );
    }
}

<?php

namespace Boci\HetznerLaravel\Responses\Certificates;

use Boci\HetznerLaravel\Responses\Response;

final class UpdateResponse extends Response
{
    public function certificate(): Certificate
    {
        return new Certificate($this->data['certificate']);
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    /**
     * @param  array<string, mixed>  $parameters
     */
    public static function fake(array $parameters = []): self
    {
        $data = [
            'certificate' => [
                'id' => (int) ($parameters['certificateId'] ?? 1),
                'name' => $parameters['name'] ?? 'updated-certificate',
                'type' => 'uploaded',
                'certificate' => '-----BEGIN CERTIFICATE-----\n...',
                'private_key' => '-----BEGIN PRIVATE KEY-----\n...',
                'fingerprint' => 'SHA256:abcdef1234567890',
                'not_valid_before' => '2023-01-01T00:00:00+00:00',
                'not_valid_after' => '2024-01-01T00:00:00+00:00',
                'domain_names' => ['example.com', 'www.example.com'],
                'labels' => $parameters['labels'] ?? [],
                'created' => '2023-01-01T00:00:00+00:00',
            ],
        ];

        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}

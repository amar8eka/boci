# Hetzner Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/boci/hetzner-laravel.svg?style=flat-square)](https://packagist.org/packages/boci/hetzner-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/boci/hetzner-laravel.svg?style=flat-square)](https://packagist.org/packages/boci/hetzner-laravel)
[![GitHub Actions](https://github.com/amar8eka/hetzner-laravel/actions/workflows/main.yml/badge.svg?branch=main)](https://github.com/amar8eka/hetzner-laravel/actions/workflows/main.yml)

⚡️ **Hetzner Laravel** is a supercharged community-maintained Laravel SDK that allows you to interact with the Hetzner Cloud API. Inspired by Nuno Maduro's excellent [OpenAI PHP client](https://github.com/openai-php/client).

## Features

- 🚀 **Modern Architecture**: Clean, organized, and maintainable code structure
- 🧪 **Testing Ready**: Includes `ClientFake` for easy testing and mocking
- 📊 **Meta Information**: Access rate limits and request details
- 🛡️ **Type Safe**: Full type safety with PHP 8.2+
- 🎯 **Resource Based**: Clean, organized API resources
- 🔧 **Laravel Integration**: Seamless Laravel service provider and facade
- 🌐 **Complete API Coverage**: All Hetzner Cloud API endpoints implemented

## Installation

You can install the package via composer:

```bash
composer require boci/hetzner-laravel
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="Boci\HetznerLaravel\HetznerLaravelServiceProvider" --tag="config"
```

Add your Hetzner API token to your `.env` file:

```env
HETZNER_TOKEN=your-hetzner-api-token-here
```

## Usage

### Basic Usage

```php
use Boci\HetznerLaravel\Client;

$client = Client::factory()
    ->withApiKey('your-api-token')
    ->make();

// Create a server
$response = $client->servers()->create([
    'name' => 'my-server',
    'server_type' => 'cpx11',
    'image' => 'ubuntu-24.04',
    'location' => 'nbg1',
]);

$server = $response->server();
$action = $response->action();
$rootPassword = $response->rootPassword();

echo "Server ID: " . $server->id();
echo "Server Name: " . $server->name();
echo "Status: " . $server->status();
echo "Root Password: " . $rootPassword;
```

### Using the Facade

```php
use Boci\HetznerLaravel\Facades\HetznerLaravel;

// List all servers
$servers = HetznerLaravel::servers()->list();

foreach ($servers->servers() as $server) {
    echo "Server: " . $server->name() . " - " . $server->status() . "\n";
}

// Get server details
$server = HetznerLaravel::servers()->retrieve('12345');
echo "Server IP: " . $server->server()->publicNet()['ipv4']['ip'];

// Delete a server
$action = HetznerLaravel::servers()->delete('12345');
echo "Delete action status: " . $action->action()->status();
```

### Working with Images

```php
use Boci\HetznerLaravel\Facades\HetznerLaravel;

// List available images
$images = HetznerLaravel::images()->list();

foreach ($images->images() as $image) {
    echo "Image: " . $image->name() . " - " . $image->osFlavor() . "\n";
}

// Get specific image details
$image = HetznerLaravel::images()->retrieve('12345');
echo "Image size: " . $image->image()->imageSize() . " GB";
```

### Working with Locations

```php
use Boci\HetznerLaravel\Facades\HetznerLaravel;

// List available locations
$locations = HetznerLaravel::locations()->list();

foreach ($locations->locations() as $location) {
    echo "Location: " . $location->name() . " - " . $location->city() . ", " . $location->country() . "\n";
}
```

### Working with Server Types

```php
use Boci\HetznerLaravel\Facades\HetznerLaravel;

// List available server types
$serverTypes = HetznerLaravel::serverTypes()->list();

foreach ($serverTypes->serverTypes() as $serverType) {
    echo "Server Type: " . $serverType->name() . " - " . $serverType->cores() . " cores, " . $serverType->memory() . " GB RAM\n";
}
```

### Working with Networks

```php
use Boci\HetznerLaravel\Facades\HetznerLaravel;

// List all networks
$networks = HetznerLaravel::networks()->list();

foreach ($networks->networks() as $network) {
    echo "Network: " . $network->name() . " - " . $network->ipRange() . "\n";
}

// Create a new network
$response = HetznerLaravel::networks()->create([
    'name' => 'my-network',
    'ip_range' => '10.0.0.0/16',
]);

$network = $response->network();
echo "Created network: " . $network->name();
```

### Working with Load Balancers

```php
use Boci\HetznerLaravel\Facades\HetznerLaravel;

// List all load balancers
$loadBalancers = HetznerLaravel::loadBalancers()->list();

foreach ($loadBalancers->loadBalancers() as $lb) {
    echo "Load Balancer: " . $lb->name() . " - " . $lb->loadBalancerType()->name() . "\n";
}

// Create a load balancer
$response = HetznerLaravel::loadBalancers()->create([
    'name' => 'my-lb',
    'load_balancer_type' => 'lb11',
    'location' => 'nbg1',
]);

$loadBalancer = $response->loadBalancer();
echo "Created load balancer: " . $loadBalancer->name();
```

### Working with DNS

```php
use Boci\HetznerLaravel\Facades\HetznerLaravel;

// List DNS zones
$zones = HetznerLaravel::dnsZones()->list();

foreach ($zones->zones() as $zone) {
    echo "Zone: " . $zone->name() . " - " . $zone->status() . "\n";
}

// Create a DNS zone
$response = HetznerLaravel::dnsZones()->create([
    'name' => 'example.com',
    'mode' => 'primary',
    'ttl' => 3600,
]);

$zone = $response->zone();
echo "Created zone: " . $zone->name();

// List DNS records for a zone
$rrsets = HetznerLaravel::dnsZones()->rrsets()->list('example.com');

foreach ($rrsets->rrsets() as $rrset) {
    echo "Record: " . $rrset->name() . " " . $rrset->type() . " " . $rrset->ttl() . "\n";
}

// Create a DNS record
$response = HetznerLaravel::dnsZones()->rrsets()->create('example.com', [
    'name' => 'www',
    'type' => 'A',
    'ttl' => 3600,
    'records' => [
        [
            'value' => '192.168.1.1',
            'comment' => 'Web server',
        ],
    ],
]);

$rrset = $response->rrset();
echo "Created record: " . $rrset->name() . " " . $rrset->type();

// Export zone file
$exportResponse = HetznerLaravel::dnsZones()->export('example.com');
echo "Zone file: " . $exportResponse->zoneFile();

// Change zone nameservers
$actionResponse = HetznerLaravel::dnsZones()->actions()->changeNameservers('example.com', [
    'nameservers' => ['ns1.example.com', 'ns2.example.com'],
]);
echo "Action status: " . $actionResponse->action()->status();
```

### Meta Information

Access rate limits and request details:

```php
$response = $client->servers()->list();
$meta = $response->meta();

echo "Request ID: " . $meta->requestId;
echo "Rate Limit: " . $meta->rateLimitLimit;
echo "Remaining: " . $meta->rateLimitRemaining;
echo "Reset Time: " . $meta->rateLimitReset;
```

## Testing

The package provides a fake implementation for testing:

```php
use Boci\HetznerLaravel\Testing\ClientFake;
use Boci\HetznerLaravel\Responses\Servers\CreateResponse;

$client = new ClientFake([
    CreateResponse::fake([
        'name' => 'test-server',
        'server_type' => 'cpx11',
    ]),
]);

$response = $client->servers()->create([
    'name' => 'test-server',
    'server_type' => 'cpx11',
    'image' => 'ubuntu-24.04',
    'location' => 'nbg1',
]);

expect($response->server()->name())->toBe('test-server');

// Assert that requests were sent
$client->assertSent(\Boci\HetznerLaravel\Resources\Servers::class, function (string $method, array $parameters): bool {
    return $method === 'create' && $parameters['name'] === 'test-server';
});
```

### Testing with Exceptions

```php
use Boci\HetznerLaravel\Testing\ClientFake;
use Boci\HetznerLaravel\Exceptions\ErrorException;

$client = new ClientFake([
    new ErrorException([
        'message' => 'Server not found',
        'code' => 'server_not_found',
    ], 404)
]);

// This will throw the ErrorException
$client->servers()->retrieve('non-existent');
```

## Advanced Usage

### Custom HTTP Client

```php
use Boci\HetznerLaravel\Client;
use GuzzleHttp\Client as GuzzleClient;

$client = Client::factory()
    ->withApiKey('your-api-token')
    ->withHttpClient(new GuzzleClient([
        'timeout' => 60,
        'verify' => false, // Only for development
    ]))
    ->make();
```

### Dependency Injection

```php
use Boci\HetznerLaravel\Client;

class ServerController
{
    public function __construct(
        private Client $hetznerClient
    ) {}

    public function createServer()
    {
        $response = $this->hetznerClient->servers()->create([
            'name' => 'my-server',
            'server_type' => 'cpx11',
            'image' => 'ubuntu-24.04',
            'location' => 'nbg1',
        ]);

        return response()->json($response->toArray());
    }
}
```

## API Resources

The package is organized into resources that correspond to Hetzner Cloud API endpoints:

- **Actions**: Get multiple actions, get an action
- **Billing**: Get all prices
- **Certificates**: List, create, get, update, delete certificates
- **DNS Zones**: List, create, get, update, delete DNS zones + actions + RRSets
- **Firewalls**: List, create, get, update, delete firewalls + actions
- **Floating IPs**: List, create, get, update, delete floating IPs + actions
- **Images**: List, get, update, delete images + actions
- **ISOs**: List, get ISOs
- **Load Balancers**: List, create, get, update, delete load balancers + actions
- **Load Balancer Types**: List, get load balancer types
- **Locations**: List, get locations
- **Networks**: List, create, get, update, delete networks + actions
- **Placement Groups**: List, create, get, update, delete placement groups
- **Primary IPs**: List, create, get, update, delete primary IPs + actions
- **Servers**: List, create, get, update, delete servers + actions
- **Server Types**: List, get server types
- **SSH Keys**: List, create, get, update, delete SSH keys
- **Volumes**: List, create, get, update, delete volumes + actions

## Error Handling

The package provides custom exceptions for better error handling:

```php
use Boci\HetznerLaravel\Exceptions\ErrorException;
use Boci\HetznerLaravel\Exceptions\TransporterException;

try {
    $response = $client->servers()->create($parameters);
} catch (ErrorException $e) {
    // Handle API errors
    echo "API Error: " . $e->getMessage();
    echo "Error Code: " . $e->getCode();
} catch (TransporterException $e) {
    // Handle network/transport errors
    echo "Network Error: " . $e->getMessage();
}
```

## Documentation

For more information about the Hetzner Cloud API, please refer to the official documentation:

- [Hetzner Cloud API Documentation](https://docs.hetzner.cloud/)
- [Hetzner Cloud API Reference](https://docs.hetzner.cloud/reference/cloud)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email amar8eka@gmail.com instead of using the issue tracker.

## Credits

- [Amar Beka](https://github.com/amar8eka)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---

## Quick Reference

### 🚀 Actions
- `list()` - Get multiple actions
- `get(string $actionId)` - Get an action

### 🔐 Security

#### Certificates
- `list()` - List certificates
- `create(array $parameters)` - Create a certificate
- `get(string $certificateId)` - Get a certificate
- `update(string $certificateId, array $parameters)` - Update a certificate
- `delete(string $certificateId)` - Delete a certificate

#### SSH Keys
- `list()` - List SSH keys
- `create(array $parameters)` - Create an SSH key
- `get(string $sshKeyId)` - Get an SSH key
- `update(string $sshKeyId, array $parameters)` - Update an SSH key
- `delete(string $sshKeyId)` - Delete an SSH key

### 🌐 DNS Zones
- `list()` - List DNS zones
- `create(array $parameters)` - Create a DNS zone
- `get(string $zoneIdOrName)` - Get a DNS zone
- `update(string $zoneIdOrName, array $parameters)` - Update a DNS zone
- `delete(string $zoneIdOrName)` - Delete a DNS zone
- `export(string $zoneIdOrName)` - Export zone file
- `import(array $parameters)` - Import zone file
- `actions()` - Access zone actions
- `rrsets()` - Access DNS records

### 📍 Locations
- `list()` - List locations
- `get(string $locationId)` - Get a location

### 🔥 Firewalls
- `list()` - List firewalls
- `create(array $parameters)` - Create a firewall
- `get(string $firewallId)` - Get a firewall
- `update(string $firewallId, array $parameters)` - Update a firewall
- `delete(string $firewallId)` - Delete a firewall
- `actions()` - Access firewall actions

### 🌐 Floating IPs
- `list()` - List floating IPs
- `create(array $parameters)` - Create a floating IP
- `get(string $floatingIpId)` - Get a floating IP
- `update(string $floatingIpId, array $parameters)` - Update a floating IP
- `delete(string $floatingIpId)` - Delete a floating IP
- `actions()` - Access floating IP actions

### 🖥️ Servers
- `list()` - List servers
- `create(array $parameters)` - Create a server
- `get(string $serverId)` - Get a server
- `update(string $serverId, array $parameters)` - Update a server
- `delete(string $serverId)` - Delete a server
- `metrics(string $serverId, array $parameters)` - Get server metrics
- `actions()` - Access server actions

### 🖼️ Images
- `list()` - List images
- `get(string $imageId)` - Get an image
- `update(string $imageId, array $parameters)` - Update an image
- `delete(string $imageId)` - Delete an image
- `actions()` - Access image actions

### 💿 ISOs
- `list()` - List ISOs
- `get(string $isoId)` - Get an ISO

### 📦 Placement Groups
- `list()` - List placement groups
- `create(array $parameters)` - Create a placement group
- `get(string $placementGroupId)` - Get a placement group
- `update(string $placementGroupId, array $parameters)` - Update a placement group
- `delete(string $placementGroupId)` - Delete a placement group

### 🔗 Primary IPs
- `list()` - List primary IPs
- `create(array $parameters)` - Create a primary IP
- `get(string $primaryIpId)` - Get a primary IP
- `update(string $primaryIpId, array $parameters)` - Update a primary IP
- `delete(string $primaryIpId)` - Delete a primary IP
- `actions()` - Access primary IP actions

### ⚙️ Server Types
- `list()` - List server types
- `get(string $serverTypeId)` - Get a server type

### ⚖️ Load Balancers
- `list()` - List load balancers
- `create(array $parameters)` - Create a load balancer
- `get(string $loadBalancerId)` - Get a load balancer
- `update(string $loadBalancerId, array $parameters)` - Update a load balancer
- `delete(string $loadBalancerId)` - Delete a load balancer
- `metrics(string $loadBalancerId, array $parameters)` - Get load balancer metrics
- `actions()` - Access load balancer actions

### ⚖️ Load Balancer Types
- `list()` - List load balancer types
- `get(string $loadBalancerTypeId)` - Get a load balancer type

### 🌐 Networks
- `list()` - List networks
- `create(array $parameters)` - Create a network
- `get(string $networkId)` - Get a network
- `update(string $networkId, array $parameters)` - Update a network
- `delete(string $networkId)` - Delete a network
- `actions()` - Access network actions

### 💰 Billing
- `getPricing()` - Get all prices

### 💾 Volumes
- `list()` - List volumes
- `create(array $parameters)` - Create a volume
- `get(string $volumeId)` - Get a volume
- `update(string $volumeId, array $parameters)` - Update a volume
- `delete(string $volumeId)` - Delete a volume
- `actions()` - Access volume actions

---

*This package provides complete coverage of the Hetzner Cloud API, ensuring you can manage all your cloud resources programmatically with ease.*

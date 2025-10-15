# Hetzner Laravel Testing Framework Guide

## 🎯 Overview

This testing framework provides a complete fake implementation of the Hetzner Cloud API, allowing you to test your code without making real API calls. It's similar to the OpenAI PHP client testing framework.

## 🏗️ How It Works

### 1. **Fake Classes Structure**
```
src/Testing/
├── TestCase.php              # Base test class with helper methods
├── ClientFake.php            # Fake client that returns fake resources
├── ServersFake.php           # Fake servers resource
├── ImagesFake.php            # Fake images resource
├── LocationsFake.php         # Fake locations resource
└── ... (33 total fake classes)
```

### 2. **Core Components**

#### **ClientFake**
- Replaces the real `Client` class
- Returns fake resource instances
- Tracks all requests made
- Manages response queue

#### **Resource Fakes** (e.g., `ServersFake`)
- Implement the same interface as real resources
- Record all method calls and parameters
- Return fake responses or throw exceptions
- Provide assertion methods

#### **TestCase**
- Base class for all tests
- Provides helper methods to create fake clients/resources
- Includes assertion methods for request validation

## 🚀 Basic Usage

### **Simple Test Example**

```php
<?php

namespace Tests;

use Boci\HetznerLaravel\Testing\TestCase;
use GuzzleHttp\Psr7\Response;

class MyTest extends TestCase
{
    public function test_can_create_server()
    {
        // 1. Create fake client with empty responses (uses auto-generated fake data)
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        // 2. Use the fake client like the real one
        $response = $client->servers()->create([
            'name' => 'test-server',
            'server_type' => 'cx11',
            'image' => 'ubuntu-20.04'
        ]);

        // 3. Assert the response is correct
        $this->assertInstanceOf(
            \Boci\HetznerLaravel\Responses\Servers\CreateResponse::class,
            $response
        );

        // 4. Assert the request was made correctly
        $this->assertRequestWasMade($requests, 'servers', 'create', function ($request) {
            return $request['parameters']['name'] === 'test-server';
        });
    }
}
```

### **Using Custom Responses**

```php
public function test_can_handle_custom_response()
{
    // Create a custom mock response
    $customResponse = new Response(201, [], json_encode([
        'server' => [
            'id' => 123,
            'name' => 'my-server',
            'status' => 'running'
        ]
    ]));

    $requests = [];
    $responses = [$customResponse];
    $client = $this->fakeClient($responses, $requests);

    $response = $client->servers()->create(['name' => 'my-server']);

    // The response will contain your custom data
    $this->assertEquals(123, $response->server['id']);
}
```

### **Testing Exceptions**

```php
public function test_can_handle_api_errors()
{
    $exception = new \Exception('API Error: Server limit reached');
    $requests = [];
    $responses = [$exception];
    $client = $this->fakeClient($responses, $requests);

    $this->expectException(\Exception::class);
    $this->expectExceptionMessage('API Error: Server limit reached');

    $client->servers()->create(['name' => 'test']);
}
```

### **Testing Multiple API Calls**

```php
public function test_can_handle_multiple_calls()
{
    $successResponse = new Response(200, [], json_encode(['servers' => []]));
    $errorResponse = new Response(404, [], json_encode(['error' => 'Not found']));
    $exception = new \Exception('Network error');

    $requests = [];
    $responses = [$successResponse, $errorResponse, $exception];
    $client = $this->fakeClient($responses, $requests);

    // First call succeeds
    $response1 = $client->servers()->list();
    $this->assertInstanceOf(\Boci\HetznerLaravel\Responses\Servers\ListResponse::class, $response1);

    // Second call returns error response
    $response2 = $client->servers()->list();
    $this->assertInstanceOf(\Boci\HetznerLaravel\Responses\Servers\ListResponse::class, $response2);

    // Third call throws exception
    $this->expectException(\Exception::class);
    $client->servers()->list();

    // Verify all requests were made
    $this->assertCount(3, $requests);
}
```

## 🛠️ Creating New Tests

### **Step 1: Create Test File**

```bash
# Create a new test file
touch tests/MyFeatureTest.php
```

### **Step 2: Basic Test Structure**

```php
<?php

namespace Tests;

use Boci\HetznerLaravel\Testing\TestCase;
use GuzzleHttp\Psr7\Response;

class MyFeatureTest extends TestCase
{
    public function test_my_feature_works()
    {
        // Your test code here
    }
}
```

### **Step 3: Choose Your Testing Approach**

#### **Option A: Use Fake Client (Recommended)**
```php
public function test_using_fake_client()
{
    $requests = [];
    $responses = [];
    $client = $this->fakeClient($responses, $requests);

    // Test your code that uses the client
    $result = $client->servers()->list();

    // Assertions
    $this->assertRequestWasMade($requests, 'servers', 'list');
}
```

#### **Option B: Use Individual Fake Resources**
```php
public function test_using_individual_fakes()
{
    $requests = [];
    $responses = [];
    $serversFake = $this->fakeServers($responses, $requests);

    // Test your code that uses the servers resource
    $result = $serversFake->list();

    // Assertions
    $serversFake->assertSent(function ($request) {
        return $request['method'] === 'list';
    });
}
```

## 📋 Available Helper Methods

### **Client Helpers**
```php
// Create fake client
$client = $this->fakeClient($responses, $requests);

// Create fake client with specific responses
$responses = [new Response(200, [], '{}')];
$client = $this->fakeClient($responses, $requests);
```

### **Resource Helpers**
```php
// Individual resource fakes
$servers = $this->fakeServers($responses, $requests);
$images = $this->fakeImages($responses, $requests);
$locations = $this->fakeLocations($responses, $requests);
$volumes = $this->fakeVolumes($responses, $requests);
$networks = $this->fakeNetworks($responses, $requests);
$firewalls = $this->fakeFirewalls($responses, $requests);
$loadBalancers = $this->fakeLoadBalancers($responses, $requests);
$certificates = $this->fakeCertificates($responses, $requests);
$sshKeys = $this->fakeSshKeys($responses, $requests);
$serverTypes = $this->fakeServerTypes($responses, $requests);
$placementGroups = $this->fakePlacementGroups($responses, $requests);
$primaryIPs = $this->fakePrimaryIPs($responses, $requests);
$billing = $this->fakeBilling($responses, $requests);
$actions = $this->fakeActions($responses, $requests);
$isos = $this->fakeISOs($responses, $requests);
$loadBalancerTypes = $this->fakeLoadBalancerTypes($responses, $requests);

// Action resource fakes
$serverActions = $this->fakeServerActions($responses, $requests);
$volumeActions = $this->fakeVolumeActions($responses, $requests);
$imageActions = $this->fakeImageActions($responses, $requests);
$networkActions = $this->fakeNetworkActions($responses, $requests);
$loadBalancerActions = $this->fakeLoadBalancerActions($responses, $requests);
$firewallActions = $this->fakeFirewallActions($responses, $requests);
$floatingIPActions = $this->fakeFloatingIPActions($responses, $requests);
$primaryIPActions = $this->fakePrimaryIPActions($responses, $requests);
```

### **Assertion Helpers**
```php
// Assert requests were made
$this->assertRequestWasMade($requests, 'servers', 'create');
$this->assertRequestWasMade($requests, 'servers', 'list', function ($request) {
    return isset($request['parameters']['name']);
});

// Assert no requests were made
$this->assertNoRequestWasMade($requests, 'servers');

// Assert specific number of requests
$this->assertRequestCount($requests, 'servers', 3);
```

## 🎯 Real-World Examples

### **Example 1: Testing Server Creation Workflow**

```php
public function test_server_creation_workflow()
{
    $requests = [];
    $responses = [];
    $client = $this->fakeClient($responses, $requests);

    // Simulate creating a server
    $server = $client->servers()->create([
        'name' => 'web-server',
        'server_type' => 'cx11',
        'image' => 'ubuntu-20.04',
        'location' => 'nbg1'
    ]);

    // Assert server was created
    $this->assertInstanceOf(
        \Boci\HetznerLaravel\Responses\Servers\CreateResponse::class,
        $server
    );

    // Assert the correct request was made
    $this->assertRequestWasMade($requests, 'servers', 'create', function ($request) {
        return $request['parameters']['name'] === 'web-server' &&
               $request['parameters']['server_type'] === 'cx11';
    });
}
```

### **Example 2: Testing Error Handling**

```php
public function test_handles_server_creation_error()
{
    $errorResponse = new Response(400, [], json_encode([
        'error' => [
            'code' => 'invalid_input',
            'message' => 'Server name already exists'
        ]
    ]));

    $requests = [];
    $responses = [$errorResponse];
    $client = $this->fakeClient($responses, $requests);

    // This should return the error response, not throw an exception
    $response = $client->servers()->create(['name' => 'existing-server']);

    $this->assertInstanceOf(
        \Boci\HetznerLaravel\Responses\Servers\CreateResponse::class,
        $response
    );

    // Verify the request was still made
    $this->assertRequestWasMade($requests, 'servers', 'create');
}
```

### **Example 3: Testing Complex Workflow**

```php
public function test_complete_server_setup_workflow()
{
    $requests = [];
    $responses = [];
    $client = $this->fakeClient($responses, $requests);

    // 1. Create server
    $server = $client->servers()->create([
        'name' => 'app-server',
        'server_type' => 'cx21',
        'image' => 'ubuntu-22.04'
    ]);

    // 2. Create volume
    $volume = $client->volumes()->create([
        'name' => 'app-data',
        'size' => 50
    ]);

    // 3. Attach volume to server
    $action = $client->serverActions()->attachVolume(1, ['volume' => 2]);

    // Assert all requests were made
    $this->assertRequestWasMade($requests, 'servers', 'create');
    $this->assertRequestWasMade($requests, 'volumes', 'create');
    $this->assertRequestWasMade($requests, 'serverActions', 'attachVolume');

    // Assert total requests
    $this->assertCount(3, $requests);
}
```

## 🔧 Advanced Usage

### **Custom Response Generation**

```php
public function test_with_custom_fake_data()
{
    $requests = [];
    $responses = [];
    $client = $this->fakeClient($responses, $requests);

    // The fake will generate realistic fake data
    $servers = $client->servers()->list();

    // You can still assert the structure
    $this->assertInstanceOf(
        \Boci\HetznerLaravel\Responses\Servers\ListResponse::class,
        $servers
    );
}
```

### **Testing Resource-Specific Assertions**

```php
public function test_servers_resource_assertions()
{
    $requests = [];
    $responses = [];
    $servers = $this->fakeServers($responses, $requests);

    $servers->list();
    $servers->create(['name' => 'test']);

    // Use resource-specific assertions
    $servers->assertSent(function ($request) {
        return $request['method'] === 'list';
    });

    $servers->assertSent(function ($request) {
        return $request['method'] === 'create' && 
               $request['parameters']['name'] === 'test';
    });
}
```

## 🚨 Important Notes

### **1. Response Queue**
- Responses are consumed in order
- Each call to a fake method consumes one response
- If no responses are provided, fake data is generated automatically

### **2. Request Tracking**
- All requests are recorded with resource, method, and parameters
- Use `$requests` array to verify API calls were made correctly

### **3. Exception Handling**
- Exceptions in the response queue are thrown when encountered
- Requests are still recorded before exceptions are thrown

### **4. Reference Parameters**
- Always pass `$responses` and `$requests` as variables, not array literals
- This ensures proper reference handling between fake classes

## 🎉 Benefits

1. **Fast Tests**: No real API calls
2. **Reliable**: No network dependencies
3. **Isolated**: Each test is independent
4. **Comprehensive**: Covers all Hetzner Cloud API resources
5. **Easy to Use**: Simple, intuitive API
6. **Flexible**: Supports custom responses and exceptions

## 📚 Next Steps

1. **Start Simple**: Begin with basic tests using `fakeClient()`
2. **Add Complexity**: Gradually add custom responses and assertions
3. **Test Edge Cases**: Use exceptions and error responses
4. **Integration Tests**: Test complete workflows
5. **Custom Fakes**: Extend fake classes for specific needs

Happy Testing! 🚀

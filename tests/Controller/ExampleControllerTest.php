<?php declare(strict_types=1);

namespace Sofyco\Bundle\DemoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ExampleControllerTest extends WebTestCase
{
    public function testExample(): void
    {
        $body = \json_encode(['foo' => 'baz']) ?: '';

        $response = $this->sendRequest($body);

        self::assertSame($body, $response->getContent());
        self::assertSame(Response::HTTP_OK, $response->getStatusCode());
    }

    private function sendRequest(string $body): Response
    {
        $client = self::createClient();

        $client->request(Request::METHOD_POST, '/', [], [], ['CONTENT_TYPE' => 'application/json'], $body);

        return $client->getResponse();
    }
}

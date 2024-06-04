<?php

namespace App\Http\Controllers;

use GraphQL\Server\OperationParams as BaseOperationParams;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laragraph\Utils\RequestParser;
use Rebing\GraphQL\GraphQL;
use Rebing\GraphQL\Helpers;
use Rebing\GraphQL\Support\OperationParams;

class GraphQLController extends \Rebing\GraphQL\GraphQLController
{
    public function query(Request $request, RequestParser $parser, Repository $config, GraphQL $graphql): JsonResponse
    {
        $routePrefix = $config->get('graphql.route.prefix', 'graphql');
        $schemaName = $this->findSchemaNameInRequest($request, "/$routePrefix") ?: $config->get('graphql.default_schema', 'default');

        $operations = $parser->parseRequest($request);

        $headers = $config->get('graphql.headers', []);
        $jsonOptions = $config->get('graphql.json_encoding_options', 0);

        $isBatch = \is_array($operations);

        $supportsBatching = $config->get('graphql.batching.enable', true);

        if ($isBatch && !$supportsBatching) {
            $data = $this->createBatchingNotSupportedResponse($request->input());

            return response()->json($data, 200, $headers, $jsonOptions);
        }

        $data = Helpers::applyEach(
            function (BaseOperationParams $baseOperationParams) use ($schemaName, $graphql): array {
                $operationParams = new OperationParams($baseOperationParams);
                return $graphql->execute($schemaName, $operationParams);
            },
            $operations
        );

        $return_code = 200;
        if (key_exists('errors', $data)) {
            $return_code = 400;
        }

        return response()->json($data, $return_code, $headers, $jsonOptions);
    }
}

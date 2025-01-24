<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class ApiController
{

    /**
     * Método protegido que devuelve una respuesta JSON de éxito.
     *
     * @param  string  $message  El mensaje de éxito.
     * @param  array  $data  Los datos adicionales a incluir en la respuesta (opcional).
     * @return JsonResponse La respuesta JSON con el mensaje de éxito y los datos.
     */
    protected function ok(string $message, array $data = []): JsonResponse
    {
        return $this->success($message, $data);
    }

    /**
     * Método protegido que construye una respuesta JSON de éxito.
     *
     * @param  string  $message  El mensaje de éxito.
     * @param  array  $data  Los datos adicionales a incluir en la respuesta.
     * @param  int  $statusCode  El código de estado HTTP (por defecto es 200 OK).
     * @return JsonResponse La respuesta JSON con el mensaje de éxito, los datos y el código de estado.
     */
    protected function success(string $message, array $data, int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success'    => true,
            'data'       => $data,
            'message'    => $message,
            'statusCode' => $statusCode
        ], Response::HTTP_OK);
    }

    /**
     * Método protegido que construye una respuesta JSON de error.
     *
     * @param  string  $message  El mensaje de error.
     * @param  array  $errors  Los detalles del error.
     * @param  int  $statusCode  El código de estado HTTP.
     * @return JsonResponse La respuesta JSON con el mensaje de error, los detalles y el código de estado.
     */
    protected function error(string $message, array $errors, int $statusCode): JsonResponse
    {
        return response()->json([
            'success'    => false,
            'details'    => $errors,
            'message'    => $message,
            'statusCode' => $statusCode
        ], $statusCode);
    }
}

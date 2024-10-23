<?php

namespace App\Http\Controllers\Api\V1\Host;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Host as Requests;
use App\Jobs\V1\Host as Jobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class HostController extends Controller
{
    public function index(): JsonResponse
    {
        $host = Jobs\Index::dispatchSync();
        return response()->json(['host' => $host], Response::HTTP_OK);
    }

    public function store(Requests\CreateHostRequest $request): JsonResponse
    {
        Jobs\Create::dispatchSync(
            project_id: $request->project_id,
            url: $request->url
        );

        return response()->json('Хост успешно добавлен', Response::HTTP_CREATED);
    }

    public function update(Requests\UpdateHostRequest $request, $id): JsonResponse
    {
        Jobs\Update::dispatchSync(
            host_id: $id,
            project_id: $request->project_id,
            url: $request->url
        );

        return response()->json('Хост успешно обновлен', Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        Jobs\Delete::dispatchSync($id);
        return response()->json('Хост успешно удален', Response::HTTP_OK);
    }
}

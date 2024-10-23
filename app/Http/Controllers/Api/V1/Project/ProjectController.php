<?php

namespace App\Http\Controllers\Api\V1\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Project as Requests;
use App\Jobs\V1\Project as Jobs;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        $project = Jobs\Index::dispatchSync();
        return response()->json(['project' => $project], Response::HTTP_OK);
    }

    public function show($id): JsonResponse
    {
        $project = Jobs\Show::dispatchSync($id);
        return response()->json(['project' => $project], Response::HTTP_OK);
    }

    public function store(Requests\CreateProjectRequest $request)
    {
        Jobs\Create::dispatchSync(
            user_id: $request->user_id,
            api_token: Str::random(60),
            timezone: $request->timezone,
            enabled: $request->enabled,
            detect_region: $request->detect_region,
            calltracking: $request->calltracking,
            leads_today: $request->leads_today,
            leads_total: $request->leads_total
        );

        return response()->json('Проект добавлен', Response::HTTP_CREATED);
    }

    public function update(Requests\UpdateProjectRequest $request, $id): JsonResponse
    {
        Jobs\Update::dispatchSync(
            project_id: $id,
            user_id: $request->user_id,
            timezone: $request->timezone,
            enabled: $request->enabled,
            detect_region: $request->detect_region,
            calltracking: $request->calltracking,
            leads_today: $request->leads_today,
            leads_total: $request->leads_total
        );

        return response()->json('Проект обновлен', Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        Jobs\Delete::dispatchSync($id);
        return response()->json('Проект удален', Response::HTTP_OK);
    }
}

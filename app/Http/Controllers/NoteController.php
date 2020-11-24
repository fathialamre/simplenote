<?php

namespace App\Http\Controllers;

use App\Http\Resources\NoteResource;
use App\Models\Note;
use http\Exception;
use Illuminate\Http\Request;
use Validator;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $notes = Note::all();
        return response()->json(NoteResource::collection($notes), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'title' => 'required|string|max:100',
            // 'body' => 'required|string',
            // 'picture' => '',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        try {
            $note = new Note();
            $note->title = 'Nooo';
            $note->body = 'BOOOODY';
            $note->completed = true;
            $note->save();

            if ($request->has("picture")) {
                if ($request->picture) {
                    $note->clearMediaCollection("picture");
                    $note->addMediaFromBase64($request->picture)->toMediaCollection("picture");
                }
            }

            return response()->json(['data' => $note], 201);
        } catch (\Exception $error) {
            return response()->json($error, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Note $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $note = Note::find($id);
        if ($note) {
            return response()->json(new NoteResource($note), 200);
        }
        return response()->json(['data' => 'not found note'], 400);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Note $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'body' => 'required|string',
            'completed' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $note = Note::find($id);
        if ($note) {
            try {
                $note->title = $request->title;
                $note->body = $request->body;
                $note->completed = $request->completed;
                $note->save();
                return response()->json(['data' => $note], 200);
            } catch (Exception $error) {
                return response()->json(['error' => 'Bad Request'], 400);
            }
        }
        return response()->json(['error' => 'Not found note'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Note $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $note = Note::find($id);

        if ($note) {
            $note->delete();
            return response()->json(['data' => 'deleted successfully'], 200);
        }
        return response()->json(['data' => 'not found note'], 400);
    }
}

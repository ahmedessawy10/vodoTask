<?php

namespace App\Http\Controllers\Api;

use App\Models\Note;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes =  Note::where("user_id", Auth::id())->paginate(10);
        return NoteResource::collection($notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => ['required', "string"],
            "content" => ['required', "string"]
        ]);
        $data['user_id'] = Auth::id();
        $note = Note::create($data);
        Gate::authorize("create", $note);

        return response()->json([
            "message" => "Note created successfully",
            "note" => $note
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $note = Note::find($id);
        Gate::authorize('view', $note);
        return new NoteResource($note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            "title" => ["string"],
            "content" => ["string"]
        ]);

        $note = Note::find($id);
        Gate::authorize('update', $note);
        $note->update($data);

        return response()->json([
            "message" => "Note updated successfully",
            "note" => $note
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $note = Note::find($id);

        if ($note) {

            Gate::authorize("delete", $note);
            $note->delete();
        } else {
            return response()->json([
                "message" => "Note not found",
            ], 404);
        }

        return response()->json([
            "message" => "Note deleted successfully",
        ], 201);
    }
}

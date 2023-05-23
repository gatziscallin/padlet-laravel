<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Entrie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * liefert die Kommentare
     * @return JsonResponse
     */
    public function index():JsonResponse{
        $comment = Comment::with(['entrie','user'])->get();
        return response()->json($comment, 200);
    }

    /**
     * zeigt alle Comments zu einem bestimmten Entry an
     */
    public function findByEntryID(string $entry_id):JsonResponse{
        $comment = Comment::where('entrie_id', $entry_id)
            ->with(['user', 'entrie'])->get();
        return $comment != null ? response()->json($comment, 200) : response()->json(null, 200);
    }

    /**
     * legt neuen Kommentar in der Datenbank an
     * @param Request $request
     * @param string $entrieID
     * @return JsonResponse
     */
    public function save(Request $request, string $entrieID): JsonResponse
    {
        $request = $this->parseRequest($request);
        DB::beginTransaction();

        try {
            if(isset($request['user_id']) &&isset($request['comment']))
            {
                $comment = Comment::create(
                    [
                        'user_id'=>$request['user_id'],
                        'comment'=>$request['comment'],
                        'entrie_id'=> $entrieID
                    ]
                );
            }
            DB::commit();
            // return a vaild http response
            return response()->json($comment, 201);
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving comment failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * Gibt das Datum im richtigen Format aus
     * @param Request $request
     * @return Request
     * @throws \Exception
     */
    private function parseRequest(Request $request): Request
    {
        //convert date
        $date = new \DateTime($request->created_at);
        $request['published'] = $date;
        return $request;
    }
}

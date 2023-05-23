<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Padlet;
use App\Models\Entrie;
use App\Models\User;
use App\Models\Userright;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

    /**
     * zeigt alle Ratings zu einem bestimmten Entry an
     */
    public function findByEntryID(string $entry_id):JsonResponse{
        $rating = Rating::where('entrie_id', $entry_id)
            ->with(['user', 'entrie'])->get();
        return $rating != null ? response()->json($rating, 200) : response()->json(null, 200);
    }

    /**
     * legt neues Rating in der Datenbank an
     * @param Request $request
     * @param string $entrieID
     * @return JsonResponse
     */
    public function save (Request $request, string $entrieID): JsonResponse
    {
        $request = $this->parseRequest($request);
        DB::beginTransaction();

        try {
            if(isset($request['user_id']) &&isset($request['rating']))
            {
                $rating = Rating::create(
                    [
                        'user_id'=>$request['user_id'],
                        'rating'=>$request['rating'],
                        'entrie_id'=> $entrieID
                    ]
                );
            }
            DB::commit();
            // return a vaild http response
            return response()->json($rating, 201);
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving rating failed: " . $e->getMessage(), 420);
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
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $date = new \DateTime($request->published);
        $request['published'] = $date;
        return $request;
    }
}

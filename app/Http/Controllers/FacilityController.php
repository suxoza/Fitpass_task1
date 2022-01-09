<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;
use App\Models\UserCards;
use App\Models\EntryLog;
use Throwable;

class FacilityController extends Controller
{
    static int $errorCode = 404;

    public function Index(Facility|null $facility, UserCards|null $userCard) : object {
        $errorCode = 404;
        try{
            if(!$facility)
                throw new \Exception('Uncown Facility');

            if(!$userCard)
                throw new \Exception('UserCard not found');

            $ifExists = EntryLog::where(["facility_id" => $facility->id, 'card_id' => $userCard->id])->whereRaw("date(created_at) = current_date")->first();

            if($ifExists){
                self::$errorCode = 429;
                throw new \Exception("daly limit for this card had been reached");
            }

            $log = new EntryLog([
                'facility_id' => $facility->id,
                'card_id' => $userCard->id
            ]);

            $log->save();

            return response()->json([
                'status' => 'OK',
                'object_name' => $facility->name,
                'first_name' => $userCard->user->first_name,
                'last_name' => $userCard->user->last_name
            ]);

        }catch(Throwable $ex){
            return response()->json([
                'status' => 'error',
                'errorMessage' => $ex->getMessage(),
            ], self::$errorCode);
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Models\Party;
use App\Models\PollingUnit;
use Illuminate\Http\Request;
use App\Models\AnnouncedPuResult;

class PagesController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function question1(){
        $groupedResults = AnnouncedPuResult::with(['pollingUnit.ward', 'pollingUnit.lga.state'])->get()->groupBy('polling_unit_uniqueid');

        return view('question1', compact(['groupedResults']));
    }

    public function question2(){
        $lgas = Lga::all();

        return view('question2', compact(['lgas']));
    }

    public function getQuestion2(Request $request){
        $request->validate([
            'local_government' => 'required|exists:lga,lga_id',
        ]);

        $selected_lga = Lga::where('lga_id', $request->local_government)->first();

        $lgas = Lga::all();

        $lga_result = AnnouncedPuResult::with(['pollingUnit.lga'])->whereHas('pollingUnit', function ($query) use ($request) {
            $query->where('lga_id', $request->local_government);
        })->get();

        return view('question2', compact(['lgas', 'lga_result', 'selected_lga']));
    }

    public function question3(){
        $parties = Party::all();
        $pollingUnits = PollingUnit::all();

        return view('question3', compact(['parties', 'pollingUnits']));
    }

    public function storeQuestion3(Request $request){
        $request->validate([
            'party' => 'required|exists:party,partyid',
            'polling_unit' => 'required|exists:polling_unit,uniqueid',
            'party_score' => 'required|integer|gt:0',
            'entered_by' => 'required|string',
        ]);

        // since the first 4 letters of the party is stored in the announced polling unit result, let's extract using substr
        $exists = AnnouncedPuResult::where('party_abbreviation', substr($request->party, 0, 4))->where('polling_unit_uniqueid', $request->polling_unit)->exists();
        
        if($exists) {
            return redirect()->back()->with('message', 'This party in this polling unit has already been recorded');
        }
        AnnouncedPuResult::insert([
            'polling_unit_uniqueid' => $request->polling_unit,
            'party_abbreviation' => $request->party,
            'party_score' => $request->party_score,
            'entered_by_user' => ucwords(strtolower($request->entered_by)),
            'date_entered' => date('Y-m-d H:i:s'),
            'user_ip_address' => $request->header('X-Forwarded-For') ?? "Cannot be determined"

        ]);

            return redirect()->back()->with('success', 'Record stored successfully');
    }

}

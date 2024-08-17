<?php

namespace App\Http\Controllers\Api;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::all();
        return response([
            'message' => 'Shifts list',
            'data' => $shifts
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'clock_in_time' => 'required',
            'clock_out_time' => 'required',
        ]);

        $user = $request->user();

        $shift = new Shift();
        $shift->company_id = 1;
        $shift->created_by = $user->id;
        $shift->name = $request->name;
        $shift->clock_in_time = $request->clock_in_time;
        $shift->clock_out_time = $request->clock_out_time;
        $shift->late_mark_after = $request->late_mark_after;
        $shift->early_clock_in_time = $request->early_clock_in_time;
        $shift->allow_clock_out_till = $request->allow_clock_out_till;
        $shift->save();

        return response([
            'message' => 'Shift created',
            'data' => $shift
        ], 201);
    }

    public function show($id)
    {
        $shift = Shift::find($id);
        if (!$shift) {
            return response([
                'message' => 'Shift not found'
            ], 404);
        }

        return response([
            'message' => 'Shift details',
            'data' => $shift
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'clock_in_time' => 'required',
            'clock_out_time' => 'required',
        ]);

        $shift = Shift::find($id);
        if (!$shift) {
            return response([
                'message' => 'Shift not found'
            ], 404);
        }

        $shift->name = $request->name;
        $shift->clock_in_time = $request->clock_in_time;
        $shift->clock_out_time = $request->clock_out_time;
        $shift->late_mark_after = $request->late_mark_after;
        $shift->early_clock_in_time = $request->early_clock_in_time;
        $shift->allow_clock_out_till = $request->allow_clock_out_till;
        $shift->save();

        return response([
            'message' => 'Shift updated',
            'data' => $shift
        ], 200);
    }

    public function destroy($id)
    {
        $shift = Shift::find($id);
        if (!$shift) {
            return response([
                'message' => 'Shift not found'
            ], 404);
        }

        $shift->delete();
        return response([
            'message' => 'Shift deleted'
        ], 200);
    }
}

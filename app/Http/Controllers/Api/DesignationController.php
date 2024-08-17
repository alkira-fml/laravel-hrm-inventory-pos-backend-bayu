<?php

namespace App\Http\Controllers\Api;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return response([
            'message' => 'Designations list',
            'data' => $designations
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user = $request->user();

        $designation = new Designation();
        $designation->company_id = 1;
        $designation->created_by = $user->id;
        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->save();

        return response([
            'message' => 'Designation created',
            'data' => $designation
        ], 201);
    }

    public function show($id)
    {
        $designation = Designation::find($id);
        if (!$designation) {
            return response([
                'message' => 'Designation not found'
            ], 404);
        }

        return response([
            'message' => 'Designation details',
            'data' => $designation
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user = $request->user();

        $designation = Designation::find($id);
        if (!$designation) {
            return response([
                'message' => 'Designation not found'
            ], 404);
        }

        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->save();

        return response([
            'message' => 'Designation updated',
            'data' => $designation
        ], 200);
    }

    public function destroy($id)
    {
        $designation = Designation::find($id);
        if (!$designation) {
            return response([
                'message' => 'Designation not found'
            ], 404);
        }

        $designation->delete();

        return response([
            'message' => 'Designation deleted'
        ], 200);
    }
}

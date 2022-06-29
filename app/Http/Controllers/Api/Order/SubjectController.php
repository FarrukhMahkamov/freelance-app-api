<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\SubjectRequest;
use App\Http\Resources\Order\SubjectResource;
use App\Models\Order\Subject;
use Illuminate\Http\Request;

/**
 * @group SUBJECTS
 * 
 * API's for subjects
 */
class SubjectController extends Controller
{   
    /**
     * All subjects 
     */
    public function index()
    {
        $subjects = Subject::latest()->get();

        return SubjectResource::collection($subjects);
    }

    /**
     * Add new subject
     */
    public function store(SubjectRequest $request)
    {
        $subjects = Subject::create([
            'name' => $request->subject_name
        ]);

        return new SubjectResource($subjects);
    }

    /**
     * Update selected subject
     */
    public function update(SubjectRequest $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $subject->update([
            'name' => $request->subject_name
        ]);

        return new SubjectResource($subject);
    }

    /**
     * Delete selected subject
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);

        $subject->delete();

        return response()->json([
            'data' => 'Deleted Successfully'
        ]);
    }
}

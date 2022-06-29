<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\JobCategoryRequest;
use App\Http\Resources\Order\JobCategoryResource;
use App\Models\Order\JobCategory;
use Illuminate\Http\Request;

/**
 * @group JOB CATEGORIES
 * 
 * API's for job categories
 */
class JobCategoryController extends Controller
{   
    /**
     * List of all job categories
     */
    public function index()
    {
        $jobCategories = JobCategory::latest()->get();

        return JobCategoryResource::collection($jobCategories);
    }  
    
    /**
     * Create new job category
     */
    public function store(JobCategoryRequest $request)
    {
        $jobCategory = JobCategory::create([
            'name' => $request->job_category_name
        ]);

        return new JobCategoryResource($jobCategory);
    }

    /**
     * Update job category
     */
    public function update(JobCategoryRequest $request, $id)
    {
        $jobCategory = JobCategory::findOrFail($id);

        $jobCategory->update([
            'name' => $request->job_category_name
        ]);

        return new JobCategoryResource($jobCategory);   
    }

    /**
     * Delete Job Category
     */
    public function destroy($id)
    {
        JobCategory::findOrFail($id)->delete();

        return response()->json([
            'data' => 'Deleted successfully'
        ]); 
    }
}

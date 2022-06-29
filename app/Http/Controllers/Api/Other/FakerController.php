<?php

namespace App\Http\Controllers\Api\Other;

use App\Http\Controllers\Controller;
use App\Models\Order\JobCategory;
use App\Models\Order\Subject;
use Illuminate\Http\Request;

/**
 * @group FAKE DATA MANAGEMENT
 */
class FakerController extends Controller
{   
    /**
     * Add job category.
     */
    public function addJobCategory($count)
    {
        $jobCategory = JobCategory::factory($count)->create();

        return response()->json([
            'data' => 'Created successfully'
        ]);
    }

    /**
     * Delete all job category
     */
    public function deleteJobCategories()
    {
        JobCategory::truncate();

        return response()->json([
            'data' => 'Delete successfully'
        ]);
    }

    /**
     * Add subject
     */
    public function addSubject($count)
    {
        Subject::factory($count)->create();

        return response()->json([
            'data' => 'Created successfully'
        ]);
    }

    /**
     * Delete subjects
     */
    public function delete()
    {
        Subject::truncate();

        return response()->json([
            'data' => 'Delete successfully'
        ]);
    }
}

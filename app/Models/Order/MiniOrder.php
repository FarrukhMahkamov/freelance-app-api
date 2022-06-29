<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiniOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_category_id',
        'subject_id',
        'name',
        'deadline_date'
    ];

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}

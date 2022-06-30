<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Resources\Order\MiniOrderResource;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order\MiniOrder;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // $orders = Order::with(['jobCategory', 'subject'])->latest()->paginate(20);

        // return OrderResource::collection($orders);
        return OrderResource::collection(MiniOrder::all());

    }

    public function forList()
    {
        $miniOrder = MiniOrder::with(['jobCategory', 'subject'])->latest()->paginate(20);

        return MiniOrderResource::collection($miniOrder);
    }

    public function store(OrderRequest $request)
    {
        $order = Order::create([
            'name' => $request->order_name,
            'job_category_id' => $request->order_job_category_id,
            'subject_id' => $request->order_subject_id,
            'deadline_date' => $request->order_deadline_date,
            'order_price' => $request->order_price,
            'required_orginality' => $request->order_required_orginality,
            'about_order' => $request->order_info,
            'files' => $request->order_files
        ]);

        $miniOrder = MiniOrder::create([
            'name' => $request->order_name,
            'job_category_id' => $request->order_job_category_id,
            'subject_id' => $request->order_subject_id,
            'deadline_date' => $request->order_deadline_date
        ]);

        return new OrderResource($order);
    }
    
    public function update(OrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $miniOrder= MiniOrder::findOrFail($id);

        $order->update([
            'name' => $request->order_name,
            'job_category_id' => $request->order_job_category_id,
            'subject_id' => $request->order_subject_id,
            'deadline_date' => $request->order_deadline_date,
            'order_price' => $request->order_price,
            'required_orginality' => $request->order_required_orginality,
            'about_order' => $request->order_info,
            'files' => $request->order_files
        ]);

        $miniOrder->update([
            'name' => $request->order_name,
            'job_category_id' => $request->order_job_category_id,
            'subject_id' => $request->order_subject_id,
            'deadline_date' => $request->order_deadline_date
        ]);

        return new OrderResource($order);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $miniOrder= MiniOrder::findOrFail($id);

        $order->delete();
        $miniOrder->delete();

        return response()->json([
            'data' => 'Deleted message'
        ]);
    }
}

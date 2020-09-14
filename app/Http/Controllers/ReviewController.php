<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function storeCourseReview(Request $request, $id)
    {
        $review = Review::create([
            "content" => $request->content,
            "rate" => $request->rate,
            "type" => Review::TYPE['course'],
            "target_id" => $request->course_id,
            "user_id" => Auth::user()->id,
        ]);
        // return response()->json(["review" => $review, "username" => Auth::user()->name, "course_id" => $id]);
        return redirect()->back();
    }

    public function destroyReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return response()->json(["review" => $review->id]);
    }

    public function updateReview(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->update([
            "content" => $request->content,
            "rate" => $request->rate,
        ]);
        return response()->json([$review]);
    }
}

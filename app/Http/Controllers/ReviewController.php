<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\StoreReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews= Review::findAll();

        return view ('review.index')->with('reviews', $reviews);
    }

    public function create()
    {
        return view ('review.create');
    }

    public function store(StoreReviewRequest $request)
    {
        $vdata = $request->validated();
        $review = new Review([$vdata]);
        $review->save();
        return view ('review.index')->with('success', 'Review succesfully added!');
    }
    
    
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view ('review.edit')->with('review', $review);
    }
    
    public function update(UpdateReviewRequest $request, $id)
    {
        $vdata = $request->validated();
        $review = Review::findOrFail($id);
        $review->fill($vdata);
        $review->save();

        return view ('review.index')->with('success', 'Review successfully updated!');
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);
        return view ('review.show')->with('review', $review);
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return view ('customer.index')->with('success', 'Review successfully deleted!');
    }
}

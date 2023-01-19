<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Nette\Utils\Validators;

class HomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|String'
        ];

        if($request->name == NULL){
            return back()->with('success', 'Failed to add category. Category name is required!');
        }

        $validatedData = $request->validate($rules);

        $validatedData['category_id'] = $request->name;
        $validatedData['category_id'] = strtolower($validatedData['category_id']);
        $validatedData['category_id'] = preg_replace('/[^A-Za-z0-9. -]/', '-', $validatedData['category_id']);
        $validatedData['category_id'] = "P-" . $validatedData['category_id'];

        Category::create($validatedData);

        $getUrl = session()->previousUrl();
        return redirect($getUrl)->with('success', 'New category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        $getUrl = session()->previousUrl();
        return redirect($getUrl)->with('success', 'Category has been deleted!');
    }
}

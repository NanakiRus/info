<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(8);

        return view('admin/category/index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getAllCategories('-');

        return view('/admin/category/create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'max:100',
            'name' => 'required|max:100',
            'slug' => 'required|alpha_dash|max:255|unique:categories',
            'text' => '',
            'parent_id' => ''
        ]);

        $input['parent_id'] = $this->fillParentId($input);

        Category::create($input);

        return back()->with('success', 'Создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin/category/show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::getAllCategories('-');

        return view('/admin/category/edit', [
            'category' => $category,
            'categories' => $categories
        ]);
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
        $input = $request->validate([
            'title' => 'max:100',
            'name' => 'required|max:100',
            'slug' => [
                'required',
                'alpha_dash',
                'max:255',
                Rule::unique('categories')->ignore($category->slug, 'slug'),
            ],
            'text' => '',
            'parent_id' => ''
        ]);

        $input['parent_id'] = $this->fillParentId($input);

        $category->update($input);

        return back()->with('success', 'Обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }

    private function fillParentId($input)
    {
        if (!empty($input['parent_id'])) {
            $input['parent_id'] = Category::where('name', str_replace('-', '', $input['parent_id']))
                ->firstOrFail()
                ->id;
        }

        return $input['parent_id'];
    }
}

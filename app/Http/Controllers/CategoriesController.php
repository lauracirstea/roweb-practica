<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CategoriesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $levels = Category::where(['parent_id'=>0])->get();

        $categories = Category::paginate(5);

        return view('category.index', compact('categories','levels'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $levels = Category::where(['parent_id'=>0])->get();

        return view('category.create', compact('levels'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        $levels = Category::where(['parent_id'=>0])->get();

        return view('category.edit', compact('category','levels'));

    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Category $category)
    {
        $category->update(request(['name', 'parent_id']));

        return redirect('/categories');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        request() -> validate([
            'name' => 'required|min: 5',
            'parent_id',
        ]);

        Category::create(request(['name', 'parent_id']));

        return redirect('/categories');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new user controller instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Show Crude table of Category
     */
    public function index(){
        $categories = Category::orderBy('name')->get();
        return view('category.index')->with('categories',$categories);
    }

    /**
     * Show add category from
     */
    public function addCategory(){
        return view('category.addCategory');
    }

    /**
     * Add new Category by Admin
     *
     * @param Request $request
     */
    public function saveCategory(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);
        $data = $request->all();
        $category = $this->category->addCategory($data);
        if($category){
            return redirect(route('category'));
        }else{
            return Redirect::back()->withErrors(['msg', 'Category is not added!']);
        }

    }

    /**
     * Show edit categoy from
     *
     * @param Request $request
     */
    public function editCategory(Request $request){
        $category = Category::whereId($request->id)->firstOrFail();
        return view('category.editCategory')->with('category',$category);
    }

    /**
     * Update Category
     *
     * @param Request $request
     */
    public function updateCategory(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,'.$request->id],
        ]);
        $data = $request->all();
        $category = $this->category->updateCategory($data);
        if($category){
            return redirect(route('category'));
        }else{
            return Redirect::back()->withErrors(['msg', 'Category is not updated!']);
        }
    }

    public function delete(Request $request){
        $this->category->deleteCategory($request->id);
        return redirect(route('category'));
    }

}

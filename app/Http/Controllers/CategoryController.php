<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderByDesc('id')->paginate(10);
        return view('Category/listCategory', compact('categories'));
    }

    public function createCategory()
    {
        return view('category.create');
    }


    public function storeCategory(Request $request)
    {
        $data = $request->all();
        // dd($data);
        //Lưu data vào databse
        Category::query()->create($data);
        return redirect()->route('category.index')->with('message', 'Thêm dữ liệu thành công');
    }

    public function editCategory(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        // dd($category);
        return view('Category/edit', compact('category'));
    }


    public function updateCategory(Request $request)
    {
        $data = $request->except('_token', '_method');

        Category::where('id', $request->id)->update($data);

        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }

    public function destroyCategory(Request $request)
    {
        $books = Book::where('Category_id', $request->id)->get();
        // dd($books);
        // $books->delete();
        foreach ($books as $book) {
            $book->delete();
        }


        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Xóa dữ liệu thành công');
    }
}

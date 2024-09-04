<?php

namespace App\Http\Controllers;

// use App\Models\Book;

use App\Http\Requests\BookPostRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\Variation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class BookController extends Controller
{

    public function index()
    {
        // $books = Book::query()->paginate(10);
        $books = Book::query()->orderByDesc('id')->paginate(10);
        return view('books/index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }


    public function store(BookPostRequest $request)
    {
        $data = $request->except('thumbnail');
        $data['thumbnail'] = "";
        //Kiểm tra file
        if ($request->hasFile('thumbnail')) {
            $path_thumbnail = $request->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $path_thumbnail;
        }
        //Lưu data vào databse
        Book::query()->create($data);
        return redirect()->route('book.index')->with('message', 'Thêm dữ liệu thành công');
    }


    public function edit(Request $request)
    {
        $categories = Category::all();
        $book = Book::find($request->id);
        return view('books.edit', compact('categories', 'book'));
    }

    public function update(BookPostRequest $request)
    {
        $data = $request->except('thumbnail', '_token', '_method');
        $book = Book::where('id', $request->id)->first();
        $thumbnail = $book->thumbnail;
        $old_thumbnail = $thumbnail;
        $data['thumbnail'] = $old_thumbnail;
        // dd($book->thumbnail);
        if ($request->hasFile('thumbnail')) {
            $path_thumbnail = $request->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $path_thumbnail;
        }
        Book::where('id', $request->id)->update($data);

        if ($request->hasFile('thumbnail')) {
            if (file_exists('storage/' . $old_thumbnail)) {
                unlink('storage/' . $old_thumbnail);
            }
        }

        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }

    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        $book->delete();
        return redirect()->route('book.index')->with('message', 'Xóa dữ liệu thành công');
    }

    public function getEightHighestAnd8LowestPrice()
    {
        $books = DB::table('books')->get();
        $booksHighestPrice = DB::table('books')->orderBy('price', 'DESC')->limit(8)->get();
        $booksLowestPrice = DB::table('books')->orderBy('price', 'ASC')->limit(8)->get();
        return view('home', compact('booksHighestPrice', 'booksLowestPrice'), compact('books'));
    }


    // public function getBookFollowCategoryToView()
    // {
    //     $categories = DB::table('categories')->get();
    //     return view('listBooksFollowCategories', compact('categories'));
    // }

    public function getBookFollowCategoryToShow(int $id)
    {
        // $listBooks = DB::table('books')->get();
        $categories = DB::table('categories')->get();

        if ($id == 0) {
            $books = DB::table('books')
                ->join('categories', function ($join) use ($id) {
                    $join->on('books.Category_id', '=', 'categories.id');
                })
                ->select('books.*', DB::raw('categories.id AS cate_id'), DB::raw('categories.name AS cate_name'))
                ->paginate(6);
            // dd($books->first());
            // $books->first()->cate_name != '';
            // $listBooks = DB::table('books')->get();
            return view('listBooksFollowCategories', compact('categories', 'id'), compact('books'));
        } else {
            // $listBooks = DB::table('books')->get();
            $books = DB::table('books')->join('categories', function ($join) use ($id) {
                $join->on('books.Category_id', '=', 'categories.id')
                    ->where('categories.id', '=', $id);
            })
                ->select('books.*', DB::raw('categories.id AS cate_id'), DB::raw('categories.name AS cate_name'))
                ->paginate(6);
            // dd($books->first());
            if ($books->first() == null) {
                // $listBooks = DB::table('books')->get();
                return view('listBooksFollowCategories', compact('categories', 'id'));
            } else {
                return view('listBooksFollowCategories', compact('categories', 'id'), compact('books'));
            }
        }
    }

    public function detailBook(int $id)
    {
        $checkForVar = false;
        $book = DB::table('books')
            ->join('categories', function ($join) use ($id) {
                $join->on('books.Category_id', '=', 'categories.id')
                    ->where('books.id', '=', $id);
            })
            ->select('books.*', DB::raw('categories.id AS cate_id'), DB::raw('categories.name AS cate_name'))
            ->get();
        $id_book = $book->first()->id;
        $variations = Variation::where('book_id',$id)->first();
        if (isset($variations['attribute_1'])) {
            $ctb_1 = $variations['attribute_1'];
            $arr_ctb_1 = explode("|", $ctb_1);
            $checkForVar = true;
        }

        if (isset($variations['attribute_2'])) {
            $ctb_2 = $variations['attribute_2'];
            $arr_ctb_2 = explode("|", $ctb_2);
            $checkForVar = true;

        }
        // dd($arr_ctb_1);
        // $book = DB::table('books')->where('books.id', $id)->get();
        if($checkForVar){
            return view('detailBook', compact('book', 'arr_ctb_1', 'arr_ctb_2', 'id_book'));
        }
        else{
            return view('detailBook', compact('book', 'id_book'));
        }
        
        
        // return $id;
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        // dd($search);
        $search = trim($search);
        $books = DB::table('books')
            ->where('title', 'LIKE', "%$search%")
            ->paginate(6);
        $count = DB::table('books')
            ->where('title', 'LIKE', "%$search%")
            ->count();
        // dd($count);
        return view('search', compact('books'), compact('count', 'search'));
        // return redirect()->view('search', compact('books'), compact('count', 'search'));
        // return redirect()->route('book.search', compact('books'), compact('count', 'search'));
    }

    public function addToCart(Request $request){
        dd($request);
        // $data = $request->all();
        //Lưu data vào databse
        Order::query()->create($data);
        // return redirect()->route('book.index')->with('message', 'Thêm dữ liệu thành công');
    }
}

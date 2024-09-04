<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use Illuminate\Http\Request;

class variationController extends Controller
{
    public function listVariation()
    {
        // $books = Book::query()->paginate(10);
        $variations = Variation::query()->orderByDesc('id')->paginate(10);
        // dd($variations);

        return view('admin/variation', compact('variations'));
    }
}

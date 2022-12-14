<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {

        $categories = Category::doesntHave('slider');

        $categories = $request->input('all') == 1 ? $categories->get() : $categories->paginate(10);

        return CategoryCollection::make($categories);
    }
}

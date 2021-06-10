<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Home;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddCategoryRequest;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * 自分の所属しているHomeカテゴリーを全て取得します。
     */
    public function index() 
    {
        return Auth::user()->home()->first()->categories()->get();
    }

    /**
     * カテゴリを作成します。
     */
    public function create(AddCategoryRequest $request)
    {
        return Auth::user()->home()->first()->categories()->updateOrCreate(
            ['path' => $request->input('path') ],
            ['path' => $request->input('path')]
        );
    }

    /**
     * カテゴリを更新します。
     */
    public function update(AddCategoryRequest $request, $categoryId)
    {
        $user = Auth::user();
        $category = Category::where('home_id', '=', $user->home_id)->findOrFail($categoryId);
        $category->fill($request->only('path'));
        $category->save();
        return response(null, 204);
    }

    /**
     * カテゴリを削除します。
     */
    public function delete($categoryId)
    {
        Auth::user()->home()->first()->categories()->findOrFail($categoryId)->delete();
        return response(null, 204);
    }
}

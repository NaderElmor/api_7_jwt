<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use GeneralTrait;

    public function index(){

        // $categories = Category::get();

        $categories = Category::select('id', 'name_'. app()->getLocale() . ' as name')->get();

        return $this->returnData('categories', $categories);
    }

   public function getCategoryByID(Request $request){

    $category = Category::select('id', 'name_'. app()->getLocale() . ' as name')->find($request->id);

    if(!$category){
        return $this->returnError(404,__('site.notfound'));
    }
    return $this->returnData('category', $category);
}

public function changeCategoryStatus(Request $request){

        $category = Category::where('id',$request->id)->update(['active' => $request->active]);

    if(!$category){
        return $this->returnError(404,__('site.notfound'));
    }
    return $this->returnSuccessMessage(__('site.updated_successfully'));
}


}

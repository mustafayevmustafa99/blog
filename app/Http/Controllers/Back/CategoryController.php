<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('back.categories.index',compact('categories'));
    }

    public function create(Request $request){
        $isExist=Category::whereSlug(str_slug($request->category))->first();
        if($isExist){
            toastr()->error($request->category.' adında bir kateqoriya artıq yaradılıb!');
            return redirect()->back();
        }
        $category = new Category;
        $category->name=$request->category;
        $category->slug=str_slug($request->category);
        $category->save();
        toastr()->success('Kateqoriya Uğurla Yaradıldı');
        return redirect()->back();
    }
    public function update(Request $request){
        $isSlug=Category::whereSlug(str_slug($request->slug))->whereNotIn('id',[$request->id])->first();
        $isName=Category::whereName($request->category)->whereNotIn('id',[$request->id])->first();
        if($isSlug or $isName){
            toastr()->error($request->category.' adında bir kateqoriya artıq yaradılıb!');
            return redirect()->back();
        }

        $category = Category::find($request->id);
        $category->name=$request->category;
        $category->slug=str_slug($request->slug);
        $category->save();
        toastr()->success('Kateqoriya Uğurla Güncellendi');
        return redirect()->back();
    }

    public function delete(Request $request){
        $category=Category::findOrFail($request->id);
        if($category->id==1){
            toastr()->error('Bu kateqoriya silinə  bilməz!');
            return redirect()->back();
        }
        $message='';
        $count=$category->articleCount();
        if($count>0){
            Article::where('category_id',$category->id)->update(['category_id'=>1]);
            $defaultCategory=Category::find(1);
            $message='Bu kateqoriyaya aid '.$count.' məqalə '.$defaultCategory->name. ' kateqoriyasina əlavə olundu.';
        }
        $category->delete();
        toastr()->success($message,'Kateqoriya Uğurla Silindi');
        return redirect()->back();
    }

    public function getData(Request $request){
        $category=Category::findOrFail($request->id);
        return response()->json($category);
    }

    public function switch(Request $request){
        $category=Category::findOrFail($request->id);
        $category->status=$request->statu=="true" ? 1 : 0 ;
        $category->save();
    }
}

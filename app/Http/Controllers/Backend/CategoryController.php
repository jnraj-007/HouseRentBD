<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Throwable;


class CategoryController extends Controller
{
    public function viewcategory(){

        $title="View Categories";
        $categories=Category::all();
//        dd($categories);
        return view("backend.layouts.categories",compact('categories','title'));

    }
    public function createcategory(Request $request){
        Category::create([
            'title'=>$request->category_name,
        'description'=>$request->description,
        'status'=>$request->status]);
        return redirect()->back();
    }

    public function deleteCategory($id)
    {
 $delete= Category::find($id);
        try {

            $delete->delete();
            return redirect()->back()->with('success','Category Deleted Successfully!!!');
        }
//        catch (Exception $e) or use
        catch (Throwable $e)
        {

            if ($e->getCode()=='23000'){
                return redirect()->back()->with('danger','Can not delete! Category has child data!!!');
            }

        }

    }

    public function editCategoryForm($id)
    {   $title="Edit Category";
        $edit=Category::find($id);
        return view('backend.layouts.category.editcategory',compact('edit','title'));
    }

    public function updateCategory(Request $request,$id)
    {
        $update=Category::find($id);
        $update->update([
            'title'=>$request->category_name,
            'description'=>$request->description,
            'status'=>$request->status
        ]);
        return redirect()->route('category.view')->with('success','Category updated successfully!!!');
    }
}

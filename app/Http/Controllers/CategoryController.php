<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }
    public function list(Request $request){
       
        $list = Category::latest()->get();
        $data["pageTitle"]="Category";
        $data["list"]=$list;
        return view("category.list",$data);

    }
    public function add(Request $request){
       
        $data["pageTitle"]="Category Add";
        return view("category.add",$data);

    }

    public function edit(Request $request, $id=null){
        
        $id = $request->id; 
        $data['category'] = Category::find($id);
        $data["pageTitle"]="Category Add";
        return view("category.add",$data);

    }
    
    public function manage(Request $request){
        $id = $request->id;

        if($id){
            $cat=Category::find($id);
            $cat->category_name=$request->category_name;
            $cat->is_active=$request->is_active;
            $cat->save();

            $class="success";
            $message="Category has been updated successfully";
        }
        else{
            $cat=new Category();
            $cat->category_name=$request->category_name;
             $cat->is_active=$request->is_active;
            $cat->save();

            $class="success";
            $message="Category has been added successfully";
        }
        return redirect()->back()->with($class,$message);
    }
    
    public function delete(Request $request,$id=null){
        $class = 'warning';
        $msg="Something went to wrong";
        $dataId =$id;
        if($dataId)
        {
            $info = Category::find($dataId);
            if($info){
                try{
                    $deleteData= $info->delete();
                    $class='success';
                    $msg="Category has been deleted successfully";
                }
                catch(\Exception $e){
                   
                    $msg= $e->getMessage();
                }

            }
        }
        return redirect()->back()->with($class,$msg);
    }

}
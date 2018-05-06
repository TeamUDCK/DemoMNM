<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateAddRequest;
use App\Models\Cate;
use DateTime;

class CateController extends Controller
{
    public function getCateAdd()
    {
    	return view('admin.modules.category.cate_add');
    }

    public function postCateAdd(CateAddRequest $request)
    {
    	$cate = new Cate;
    	$cate->category_name = $request->txtCateName;
    	$cate->slug = str_slug($request->txtCateName, '-');
    	$cate->parent_id = $request->sltCate;
    	$cate->created_at = new DateTime();
        $cate->save();

        return redirect()->route('getCateList');
    }

    public function getCateList()
    {
    	return view('admin.modules.category.cate_list');
    }
}

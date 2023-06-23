<?php

namespace App\Http\Controllers\Admin;

use App\Models\BannerScript;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerScriptController extends AdminBaseController
{
  public function index(){
      $descriprtion= BannerScript::first();
      return view('admin.bannerscript.index',compact('descriprtion'));
    }

  public function storeBannerScrpt(Request $request){
    if($request->id==null){
      BannerScript::create(['description'=>$request->editor1]);
    }
    else{
      BannerScript::where('id',$request->id)->update(['description'=>$request->editor1]);
    }
    
      return redirect()->back()->with('success', 'Banner Script Save Successfully');
  }
}

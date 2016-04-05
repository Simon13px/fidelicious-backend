<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Repositories\IPictureRepository;
use App\Picture;

class BackendController extends Controller
{
    public function __construct(IPictureRepository $picture){
      $this->picture = $picture;
    }

    public function checkWizard()
    {
      $check = Auth::user()->setting;

      if(is_null($check)){

        // $types = array('pictoach','pictobon','pictonok','pictook','pictoval');
        //
        // $pictures = array();
        //
        // $collection = collect(Picture::where('defaultpic',1)->get());
        //
        // foreach($types as $type)
        // {
        //   $pictures = array_add($pictures, $type, $this->picture->getDefaultPicture($type));
        // }

        return view('backend.wizard');
      }else{
        return view('backend.index');
      }
    }

}

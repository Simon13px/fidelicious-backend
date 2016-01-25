<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Repositories\ISettingRepository;
use App\Repositories\IPictureRepository;

class SettingsController extends Controller
{
    public function __construct(ISettingRepository $setting, IPictureRepository $picture){
      $this->middleware('auth');
      $this->setting = $setting;
      $this->picture = $picture;
    }

    public function index(){
      $userid = Auth::user()->id;

      $settings = $this->setting->getSettingByUser($userid);
      $background = $this->picture->getPictureByType('background', $userid);
      $logo = $this->picture->getPictureByType('logo', $userid);
      $pub = $this->picture->getPictureByType('pub',$userid);

      $pictoval = $this->picture->getPictureByType('pictoval',$userid);
      $pictoach = $this->picture->getPictureByType('pictoach', $userid);
      $pictook = $this->picture->getPictureByType('pictook', $userid);
      $pictonok = $this->picture->getPictureByType('pictonok', $userid);
      $pictobon = $this->picture->getPictureByType('pictobon', $userid);

      return view('backend.settings.index')->with(['params'=>$settings,'logo'=>$logo,'background'=>$background,'pub'=>$pub,'pictoval'=>$pictoval,
      'pictoach'=>$pictoach,'pictook'=>$pictook,'pictonok'=>$pictonok,'pictobon'=>$pictobon]);
    }

    public function getGeneral()
    {
      $settings = $settings = $this->setting->getSettingByUser(Auth::user()->id);

      return view('backend.settings.general',['settings'=>$settings]);
    }

    public function postGeneral(Request $request){

      $userid = Auth::user()->id;

      $nom_jetons = $request->input('nom_jetons');
      $max_bons = $request->input('max_bons');
      $max_jetons = $request->input('max_jetons');

      $this->setting->setSettingsByUser($nom_jetons,$max_bons, $max_jetons, $userid);

      return redirect()->action('SettingsController@index');
    }



    public function getItemList($type)
    {
      $userid = Auth::user()->id;

      $item_list = $this->picture->getPictureListByType($type, $userid);

      $view = 'backend.settings.'.$type;

      return view($view)->with('item_list',$item_list);
    }

    public function getAddItem($type)
    {
      $view = 'backend.settings.add'.$type;

      return view($view);
    }

    public function postAddItem(Request $request,$type)
    {

      $this->validate($request, [
        $type => 'required|image|mimes:jpeg,bmp,png'
      ]);

      if($request->hasFile($type)){
        $file = $request->file($type);
      }

      $name = $request->input('name');

      $this->picture->storePicture($file, $type, $name);

      return redirect()->route('settingsItem',[$type]);
    }

    public function activeItem($item, $id)
    {
      $userid = Auth::user()->id;

      $old_item = $this->picture->oldItem($item, $userid);

      $new = $this->picture->activeNewItem($id);

      return redirect()->route('settingsItem',[$item]);
    }

    public function deleteItem($item, $id)
    {
      $this->picture->deletePicture($id);

      return redirect()->route('settingsItem',[$item]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Repositories\ISettingRepository;
use App\Repositories\IPictureRepository;

class WizardController extends Controller
{
    public function __construct(ISettingRepository $setting, IPictureRepository $picture){
      $this->setting = $setting;
      $this->picture = $picture;
    }

    public function store(Request $request){

    $userid = Auth::user()->id;

    $nom_jetons = $request->input('nom_jetons');
    $max_bons = $request->input('nbr_max_bons');
    $max_jetons = $request->input('nbr_max_jetons');

    $this->setting->setSettingsByUser($nom_jetons,$max_bons,$max_jetons, $userid);

    $pictoach = $request->input('inputach');
    $this->picture->setDefaultPicture($pictoach, 'pictoach',$userid);
    $pictoval = $request->input('inputval');
    $this->picture->setDefaultPicture($pictoval, 'pictoval', $userid);
    $pictook = $request->input('inputok');
    $this->picture->setDefaultPicture($pictook, 'pictook', $userid);
    $pictonok = $request->input('inputnok');
    $this->picture->setDefaultPicture($pictonok, 'pictonok', $userid);
    $pictobon = $request->input('inputbon');
    $this->picture->setDefaultPicture($pictobon, 'pictobon', $userid);

    $timer = '8; URL=/';

    return response()->view('backend.wizardok')->header('Refresh',$timer);

    }
}

<?php

  namespace App\Repositories;

  use App\Picture;
  use App\User;
  use Auth;
  use Folklore\Image\Facades\Image;
  use Storage;
  use File;

  class PictureRepository implements IPictureRepository
  {
    public function getPictureByType($type, $userid)
    {
      $picture = User::find($userid)->pictures()->where(['actif'=>true,'type'=>$type])->first();

      if(is_null($picture)){
        $picture = new Picture();
        $picture->type = $type;
        $picture->nom = '';
        if($type == 'logo'){
          $picture->url = 'img/logo_fidelicious.png';
          $picture->thumb_url = 'img/logo_fidelicious.png';
        }elseif($type=='background'){
          $picture->url = 'img/no_bg.png';
          $picture->thumb_url = 'img/no_bg.png';
        }else{
          $picture->url = 'img/no_img.png';
          $picture->thumb_url = 'img/no_img.png';
        }
      }

      return $picture;
    }

    public function getPictureListByType($type, $userid)
    {
      $pictures = User::find($userid)->pictures()->where(['type'=>$type])->get();

      return $pictures;
    }

    public function storePicture($file, $type, $name)
    {

      $userid = Auth::user()->id;
      $extension = $file->getClientOriginalExtension();

      $filename = $name.'.'.$extension;

      $url = 'img/'.$type;

      $exists = File::exists(public_path().'/'.$url.'/'.$filename);

      if($exists)
      {
      //Ajout d'une composante random pour ne pas écraser le fichier
        $rdm = str_random(6);
        $file->move($url, $name.$rdm.'.'.$extension);
        $url = $url.'/'.$name.$rdm.'.'.$extension;
        $thumb_url = 'img/thumb/thumb-'.$type.'-'.$name.$rdm.'.'.$extension;
      }else{
        $file->move($url, $filename);
        $url = $url.'/'.$filename;
        $thumb_url = 'img/thumb/thumb-'.$type.'-'.$filename;
      }

      $thumbnail = Image::open($url);

      $new_item = User::find($userid)->pictures()
      ->create([
        'nom'       => $filename,
        'url'       => $url,
        'actif'     => false,
        'type'      => $type,
        'thumb_url' => $thumb_url
      ])->save();

      Image::make($url,array(
        'width'=>300,
        'height'=>300
      ))->save($thumb_url);
    }

    public function oldItem($item, $userid)
    {
      $old = User::find($userid)->pictures()->where(['actif'=>1,'type'=>$item])->first();

      if(!is_null($old))
      {
        $old->actif = false;
        $old->save();
      }
    }

    public function activeNewItem($id)
    {
      $new = Picture::find($id)->update(['actif'=>1]);
    }

    public function deletePicture($id)
    {
      $del = Picture::find($id);

      File::delete($del->url);

      $del->delete();
    }

    public function getDefaultPicture($type)
    {
      return Picture::where(['defaultpic'=>1,'type'=>$type])->get();
    }

    public function setDefaultPicture($url, $type, $userid){
      User::find($userid)->pictures()
        ->create([
          'nom' => $type.'-default.png',
          'type' => $type,
          'actif' => true,
          'url' => $url,
          'thumb_url' => $url,
          'defaultpic' => true
        ])->save();
    }

  }

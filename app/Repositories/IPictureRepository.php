<?php

  namespace App\Repositories;

  interface IPictureRepository
  {
      public function getPictureByType($type, $userid);
      public function getPictureListByType($type, $userid);
      public function storePicture($file, $type, $name);
      public function oldItem($item, $userid);
      public function activeNewItem($id);
      public function deletePicture($id);
  }

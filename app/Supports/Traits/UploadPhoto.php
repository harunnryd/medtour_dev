<?php
namespace App\Supports\Traits;

use Intervention\Image\Exception\NotSupportedException;
use Intervention\Image\ImageManager;
use Illuminate\Http\UploadedFile;
use Response;
use App;

trait UploadPhoto {

    function storeImage(UploadedFile $photo) {
        $name        = str_random(10). '.'. $photo->guessClientExtension();
        $destination = public_path(). DIRECTORY_SEPARATOR. 'img';
        $photo->move($destination, $name);

        //interventing image
        try {
            $manager      = new ImageManager();
            $locationPath = public_path(). DIRECTORY_SEPARATOR. 'img'. DIRECTORY_SEPARATOR. $name;
            $img          = $manager->make($locationPath)->resize(300, 300);
            $img->encode('jpeg', 60)->save();
        } catch (NotSupportedException $e) {
            return Response::json(['error' => 'encoding format is not supported :('], 403);
        }

        return $name;

    }

    function destroyImage($name) {
        $locationPath = public_path(). DIRECTORY_SEPARATOR. 'img'. DIRECTORY_SEPARATOR. $name;
        return App::make('files')->delete($locationPath);
    }

}
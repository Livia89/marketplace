<?php


namespace App\Traits;

trait UploadTrait
{
    private function imageUpload($images, $imageColumn = null){

        $uploadedImages = [];
        
        if (is_array($images)) {
            foreach ($images as $img) {
                $uploadedImages[] = [$imageColumn => $img->store('products', 'public')]; // path name and disk 
            }
        }else{
            $uploadedImages = $images->store('logo', 'public'); // path name and disk 
        }

        return $uploadedImages;
    
    }
}
    
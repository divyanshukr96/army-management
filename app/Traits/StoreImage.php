<?php
/**
 * Created by PhpStorm.
 * User: DIVYANSHU
 * Date: 30-03-2019
 * Time: 17:29
 */

namespace App\Traits;

use Illuminate\Http\Request;
use Str;

trait StoreImage
{

    /**
     * @param Request $request
     * @param string $fieldName
     * @param string $directory
     * @return false|string
     */
    public function verifyAndStoreImage(Request $request, $fieldName = 'image', $directory = '')
    {
        if ($request->hasFile($fieldName)) {
            if (!$request->file($fieldName)->isValid()) {
                return redirect()->back()->withInput();
            }
            return $request->file($fieldName)->store('image/' . $directory, 'public');
        }
        return null;
    }

    /**
     * @param $file
     * @param string $name
     * @param bool $store
     * @return string
     */
    public function generateFileNameAndStore($file, $name = '', $store = false)
    {
        if ($name) {
            $file = $file->file($name);
        }
        $extension = $file->getClientOriginalExtension();
        $file_slug = Str::slug(basename($file->getClientOriginalName(), '.' . $extension));
        $file_name = time() . '__' . Str::limit($file_slug, '50', '') . '.' . $extension;
        if ($store) {
            $date = date('Y') . '/' . date('m');
            $storage = storage_path('app/public/' . $date);
            $file->move($storage, $file_name);
            $file_name = "{$date}/{$file_name}";
        }
        return $file_name;
    }


    /**
     * @param $image
     * @return float|int|null
     */
    public function getImageSize($image)
    {
        if (is_object($image)){
            $size = $image->getSize() / (1024 * 1024);
            return number_format($size, 3);
        }
        return null;
    }


}

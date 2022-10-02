<?php

if (!function_exists('_setFilename')) {
    function _setFileName($file, $defaultName = null)
    {
        $fileExtension  = $file->getClientOriginalExtension();
        $newName        = is_null($defaultName) ?  md5(uniqid()) : $defaultName;
        
        return $newName . '.' . $fileExtension;
    }
}

if (!function_exists('_imgUpload')) {
    function _imgUpload($file, $path, $name = null)
    {
        try {
            if (is_null($file)) {
                throw new Exception('Şəkil Seçilməyib');
            }

            $filePath = 'public/' . $path;
            $fileName = _setFileName($file, $name);
            $file->storeAs($filePath, $fileName);

            return $path . '/' . $fileName;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

if (!function_exists('_imgDelete')) {
    function _imgDelete($file,$path='storage')
    {
        try {
            $fileWithPath = $path.'/' . $file;
            if (file_exists($fileWithPath) && !is_dir($fileWithPath)) {
                unlink($fileWithPath);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

if(!function_exists('_checkFile')){
    function _checkFile($file,$path='storage'){
        $fileWithPath = $path.'/'.$file;

        return (bool) file_exists($fileWithPath) && !is_dir($fileWithPath);
    }
}

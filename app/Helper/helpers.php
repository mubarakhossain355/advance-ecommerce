<?php

 function fileUpload($fileObject, $nameString = null, $existFilePath = null){
    if(isset($fileObject)){
        if(file_exists($existFilePath)){
            unlink($existFilePath);
        }
        $fileName = rand(10,10000).time().$fileObject->getClientOriginalName();
        $fileDirectory = 'admin/upload-files/'.$nameString.'/';
        $fileObject->move($fileDirectory,$fileName);
        $fileUrl = $fileDirectory.$fileName;
    }else{
        
    }
   

    return $fileUrl;
}
<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function file_name($file = null)
    {
        if ($file) {
            $uniqueName = md5(
                rand(100, 200) . "_" . time() . str_shuffle('abcdef')
            ) . "." . $file->getClientOriginalExtension();
        } else {
            $uniqueName = md5(rand(100, 200) . "_" . time() . str_shuffle('abcdef'));
        }

        return $uniqueName;
    }




    protected function fileUpload($file = null, $path)
    {
        if (!$file) {
            return null;
        }

        if ($file) {
            $filename = $this->file_name($file);
            $file->move(public_path($path), $filename);
        }
        return $filename;
    }
}

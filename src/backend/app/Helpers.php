<?php

if (!function_exists('manifest')) {
    /**
    * Pull hashed name from manifest.
    *
    * @param string $file_path
    * @param string $dir
    * @return string
    */
    function manifest(string $file_path, $dir = 'dist'): string
    {
        if (!file_exists($manifest_path = public_path($dir . '/manifest.json'))) {
            return $file_path;
        }

        $manifest = json_decode(file_get_contents($manifest_path), true);

        $file = explode('/', $file_path);

        $filename = end($file);
        $path = '';
        if (count($file) > 1) {
            unset($file[count($file) - 1]);
            $path = implode('/', $file);
        }

        return $path . '/' . $manifest[$filename];
    }
}

if (!function_exists('nullIfEmpty')) {
    function nullIfEmpty(mixed $val, mixed $ret = null): mixed
    {
        return !empty($val) ? ($ret ?? $val) : null;
    }
}

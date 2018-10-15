<?php
// sau khi tao function thi can vao file composer.json de cau hinh

function change_time_to_text($time, $type = null)
{
    if (!is_numeric($time)) {
        $time = strtotime($time);
    }
    if ($type == 'update') {
        $text = 'Cập nhật khoảng ';
    } else {
        $text = '';
    }
    if ((time() - $time) < 60) {
        return $text . round(time() - $time) . __('config.seconds_ago');
    } elseif ((time() - $time) < 60 * 60) {
        return $text . round((time() - $time) / 60) . __('config.minute_ago');
    } elseif ((time() - $time) < 60 * 60 * 24) {
        return $text . round(((time() - $time) / 60) / 60) . __('config.hours_ago');
    } else {
        return date('H:i:s A d/m/Y', $time);
    }
}

function slugTitle($string, $keyReplace = "/")
{
    $string = stripUnicode($string);
    $string = trim(preg_replace("/[^A-Za-z0-9]/i", " ", $string)); // khong dau
    $string = str_replace(" ", "-", $string);
    $string = str_replace("--", "-", $string);
    $string = str_replace($keyReplace, "-", $string);

    return strtolower($string);
}
// public - images
function getImage($image, $url)
{
    if ($image) {
        $data_cat_img = explode('/', $image);
        $file = $data_cat_img[6];
        $img = file_get_contents($image);
        if (!empty($img)) {
            $file_images = str_random(4) . "_" . basename($file);
            while (file_exists('assets/upload/' . $url . '/' . $file_images)) {
                $file_images = str_random(4) . "_" . $file;
            }
            file_put_contents('assets/upload/ =' . $url . '/$file_images', $img);

            return $file_images;
        }
    } else {
        return null;
    }
}

?>﻿

<?php

namespace Dende\PolmediaBundle\Lib;

class Globals {

    protected static $mainImageDir;
    protected static $galleryDir;
    protected static $thumbnailDir;

    // <editor-fold defaultstate="collapsed" desc="setters and getters">
    public static function getMainImageDir() {
        return self::$mainImageDir;
    }

    public static function getGalleryDir() {
        return self::$galleryDir;
    }

    public static function getThumbnailDir() {
        return self::$thumbnailDir;
    }

    public static function setMainImageDir($mainImageDir) {
        self::$mainImageDir = $mainImageDir;
    }

    public static function setGalleryDir($galleryDir) {
        self::$galleryDir = $galleryDir;
    }

    public static function setThumbnailDir($thumbnailDir) {
        self::$thumbnailDir = $thumbnailDir;
    }

// </editor-fold>

    /**
     * 
     * @param string $string
     * @return string
     */
    public static function applyMainImageDir($string) {
        return self::getMainImageDir() . $string;
    }

    /**
     * 
     * @param string $string
     * @return string
     */
    public static function applyGalleryDir($string) {
        return self::getGalleryDir() . $string;
    }

    /**
     * 
     * @param string $string
     * @return string
     */
    public static function applyThumbnailDir($string) {
        return self::getThumbnailDir() . $string;
    }

    /**
     * 
     * @param type $string
     * @return type
     */
    public static function convertGalleryPathToThumbnailPath($string) {
        return str_replace(self::getGalleryDir(), self::getThumbnailDir(), $string);
    }
    /**
     * 
     * @param type $string
     * @return type
     */
    public static function convertMainPathToThumbnailPath($string) {
        return str_replace(self::getMainImageDir(), self::getThumbnailDir(), $string);
    }
}

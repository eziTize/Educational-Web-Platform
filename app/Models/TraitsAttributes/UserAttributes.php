<?php
namespace App\Models\TraitsAttributes;

use Illuminate\Support\Str;

trait UserAttributes{

    /**
     * Get the user's profile image.
     *
     * @return string
     */
    public function getProfileImageAttribute()
    {
        $mediaItems = $this->getFirstMediaUrl('profile-image-collection');
        return $mediaItems;
    }

    /**
     * Get the user's profile video.
     *
     * @return string
     */
    public function getProfileVideoAttribute()
    {
        $mediaItems = $this->getFirstMediaUrl('profile-video-collection');
        return $mediaItems;
    }

    /**
     * Get the user's certificate images.
     *
     * @return string
     */
    public function getCertificateImagesAttribute()
    {
        $mediaItems = $this->getFirstMediaUrl('certificate-img-collection');
        return $mediaItems;
    }

    /**
     * Get the user's banner image.
     *
     * @return string
     */
    public function getBannerImageAttribute()
    {
        $mediaItems = $this->getFirstMediaUrl('profile-banner-collection');
        return $mediaItems;
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $full_name = $this->name.' '.$this->last_name;
        return Str::limit($full_name,25);
    }

}
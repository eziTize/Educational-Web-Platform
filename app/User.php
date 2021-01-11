<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Message;


use App\Models\{
    ProfileVisibility,
    ProfileCategory,
    ProfileAccomplishment
};
use App\Models\TraitsAttributes\UserAttributes;
use App\Models\TraitsRelationships\UserRelationships;
class User extends Authenticatable implements HasMedia
{
    use Notifiable,HasRoles,HasMediaTrait,UserRelationships,UserAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name', 'contact_number', 'zone_id','address', 'country', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages()
    {
      return $this->hasMany(Message::class);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('profile-image-collection')
        ->useFallbackUrl('custom-theme/assets/images/movie/venus.jpg')
        ->useFallbackPath(public_path('custom-theme/assets/images/movie/venus.jpg'))
        ->useDisk('uploads');

        $this->addMediaCollection('profile-video-collection')
        ->useFallbackUrl('custom-theme/assets/images/movie/video-button.png')
        ->useFallbackPath(public_path('custom-theme/assets/images/movie/video-button.png'))
        ->useDisk('uploads');

        $this->addMediaCollection('certificate-img-collection')
        ->useFallbackUrl('custom-theme/assets/images/movie/movie-details01.jpg')
        ->useFallbackPath(public_path('custom-theme/assets/images/movie/movie-details01.jpg'))
        ->useDisk('uploads');

        $this->addMediaCollection('profile-banner-collection')
        ->useFallbackUrl('custom-theme/assets/images/banner/banner03.jpg')
        ->useFallbackPath(public_path('custom-theme/assets/images/banner/banner03.jpg'))
        ->useDisk('uploads');
    }

    public function languages()
    {
      return $this->hasMany(Language::class);
    }

    public function studentProf()
    {
      return $this->hasOne(studentProf::class);
    }
}

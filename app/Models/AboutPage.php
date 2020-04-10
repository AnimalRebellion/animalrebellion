<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Parental\HasParent;
use Spatie\Translatable\HasTranslations;

class AboutPage extends Page
{
    use CrudTrait;
    use HasParent;
    use HasTranslations;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    // protected $table = 'about_pages';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    public $translatable = ['title', 'header', 'content'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return 'http://animalrebellion.test/'.$this->thumbnail;
        } else {
            return 'https://animalrebellion.org/wp-content/uploads/2020/02/Animal-Logo-No-Background-1-1536x855.png';
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setThumbnailAttribute($value)
    {
        $attribute_name = 'thumbnail';
        $disk = 'public';
        $destination_path = 'images/about_pages/'.$this->slug;

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image')) {
            // 0. Make the image
            $image = \Image::make($value)->encode('png', 90);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.png';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }
}

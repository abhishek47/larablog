<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model {

    /**
     * Fields that shouldn't be mass assigned
     *
     * @var array
     */
    protected $fillable= ['title', 'body', 'slug', 'published_at'];



    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query) {
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * Get the user of the article
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Get all the associated tags of the article
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get the list of associated tags
     * @return array
     */
    public function getTagListAttribute(){
        return $this->tags()->lists('id');
    }

    public function getPublishedAtAttribute($date){
        return  Carbon::parse($date);
    }





}

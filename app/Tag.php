<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * Fields that shouldn't be mass assigned
     *
     * @var array
     */
    protected $fillable = ['name'];



    /**
     * Get the articles associated with the given tag.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles(){
        return $this->belongsToMany('App\Article');
    }



    public function isATeamManager(){
        return true;
    }


}

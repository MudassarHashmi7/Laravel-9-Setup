<?php
/*
 * Reference
 * https://github.com/jenssegers/laravel-mongodb
 * */

namespace App\Models\Mongo;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * @group MongoDB Scraper Model Class
 *
 * Wrapper for MongoDB
 *
 */
class CompanyProfile extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'mongodb_company_profile';
    // Mongo will also create _id, but the 'id' property will be used for primary key actions like find().
    protected $primaryKey = '_id';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'current_step', 'step_1', 'step_2', 'step_3', 'step_4', 'step_5', 'step_6', 'partners','custom_data'];
}

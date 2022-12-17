<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    protected $appends = ['all_records', 'uploaded_records', 'latest_video_uploaded_at'];

    protected $fillable = [
        'user_id',
        'due_date'
    ];

    public function records()
    {
        return $this->hasMany(Record::class);
    }
    /**
     * Determine if the user is an administrator.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function getUploadedRecordsAttribute()
    {
        return $this->attributes['uploaded_records'] = $this->records()->whereNot('status', '未上傳')->count();;
    }
    /**
     * Determine if the user is an administrator.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function getAllRecordsAttribute()
    {
        return $this->attributes['all_records'] = $this->records()->count();
    }

    protected function getLatestVideoUploadedAtAttribute()
    {
        $record = ($this->records()->join('media', function ($join) {
            $join->on('records.id', 'media.model_id')->where('model_type', 'App\Models\Record');
        })->select('records.*', 'media.created_at as media_created_at')->latest('media_created_at')->first());

        return $record ? $record['media_created_at'] : null;
    }
}

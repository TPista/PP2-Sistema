<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Student
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Student whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Student whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @property-read \App\User $user
 * @property-read int|null $courses_count
 * @property-read mixed $courses_formatted
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Student query()
 */
class Student extends Model

{
	protected $fillable = ['user_id', 'title'];


	protected $appends = ['courses_formatted'];

    public function courses () {
    	return $this->belongsToMany(Course::class);
    }

	public function user () {
		return $this->belongsTo(User::class)->select('id', 'role_id', 'name', 'email');
	}

	public function getCoursesFormattedAttribute () {
    	return $this->courses->pluck('name')->implode('<br />');
	}
}

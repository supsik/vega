<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Analysis
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $price
 * @property int $analysis_group_id
 * @property-read \App\Models\AnalysisGroup $analysisGroup
 * @method static \Illuminate\Database\Eloquent\Builder|Analysis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Analysis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Analysis query()
 * @method static \Illuminate\Database\Eloquent\Builder|Analysis whereAnalysisGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analysis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analysis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analysis whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analysis wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analysis whereUpdatedAt($value)
 */
	class Analysis extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AnalysisGroup
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Analysis> $analysis
 * @property-read int|null $analysis_count
 * @method static \Illuminate\Database\Eloquent\Builder|AnalysisGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnalysisGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnalysisGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|AnalysisGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalysisGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalysisGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnalysisGroup whereUpdatedAt($value)
 */
	class AnalysisGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Diagnostics
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $seo_description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Doctor> $doctors
 * @property-read int|null $doctors_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics query()
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostics whereUpdatedAt($value)
 */
	class Diagnostics extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Doctor
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $first_name
 * @property string $second_name
 * @property string $last_name
 * @property int|null $price
 * @property string $slug
 * @property string|null $description
 * @property string|null $seo_description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Diagnostics> $diagnostics
 * @property-read int|null $diagnostics_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Speciality> $specialities
 * @property-read int|null $specialities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereUpdatedAt($value)
 */
	class Doctor extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 */
	class Document extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $first_name
 * @property string $second_name
 * @property string $slug
 * @property int|null $position_id
 * @property string|null $description
 * @property string|null $seo_description
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Position|null $position
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 */
	class Employee extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\HomeSlide
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $order
 * @property string $title
 * @property string|null $label
 * @property string|null $link
 * @property int $is_published
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide isPublished()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlide whereUpdatedAt($value)
 */
	class HomeSlide extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $slug
 * @property string|null $excerpt
 * @property string $content
 * @property string|null $published_at
 * @property int $is_published
 * @property string|null $seo_description
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|News isPublished()
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 */
	class News extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property string|null $seo_description
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Position
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position query()
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereUpdatedAt($value)
 */
	class Position extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $author
 * @property string $text
 * @property int $is_published
 * @method static \Illuminate\Database\Eloquent\Builder|Review isPublished()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int|null $price
 * @property int $diagnostics_id
 * @property-read \App\Models\Diagnostics $diagnostics
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Doctor> $doctors
 * @property-read int|null $doctors_count
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDiagnosticsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Speciality
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Doctor> $doctors
 * @property-read int|null $doctors_count
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality query()
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speciality whereUpdatedAt($value)
 */
	class Speciality extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}


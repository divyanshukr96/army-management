<?php

namespace App;

use App\Enums\DocumentType;
use App\Traits\StoreImage;
use App\Traits\UsesUuid;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Document extends Model implements Auditable
{
    use UsesUuid, CastsEnums, StoreImage, SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $fillable = ['document_no', 'image', 'type'];

    protected $enumCasts = ['type' => DocumentType::class];

    /**
     * @param $image
     * @return string
     */
    public function setImageAttribute($image)
    {
        if (is_object($image)) $image = $this->generateFileNameAndStore($image, '', true);
        return $this->attributes['image'] = $image;
    }

}

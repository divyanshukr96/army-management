<?php

namespace App;

use App\Enums\DocumentType;
use App\Traits\UsesUuid;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use UsesUuid, CastsEnums;

    protected $fillable = ['document_no', 'image', 'type'];

    protected $enumCasts = ['type' => DocumentType::class];
}

<?php

namespace App\Rules;

use App\Army;
use App\Enums\RelationType;
use Illuminate\Contracts\Validation\Rule;

class Relation implements Rule
{
    private $request;

    /**
     * Create a new rule instance.
     *
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value == RelationType::Children) {
            return true;
        } else {
            return $this->check($attribute, $value);
        }
    }


    private function check($attribute, $value)
    {
        if (request()->method() === 'POST'){
            if (is_object($this->request->army)) {
                return count($this->request->army->families()->where('relation', $value)->get()) <= 0;
            } else {
                $army = Army::findOrFail($this->request->army);
                return count($army->families()->where('relation', $value)->get()) <= 0;
            }
        }else{
            if (is_object($this->request->army)) {
                return count($this->request->army->families()->where('relation', $value)->where('id','!=',$this->request->family->id)->get()) <= 0;
            } else {
                $army = Army::findOrFail($this->request->army);
                return count($army->families()->where('relation', $value)->where('id','!=',$this->request->family->id)->get()) <= 0;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The data is already added for this.';
    }
}

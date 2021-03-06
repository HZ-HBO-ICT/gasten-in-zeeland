<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Add user_id of the current user for validation of measured_at
        $this->merge([
            'user_id' => Auth::user()->id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->extendValidatorWithCompositeUnique();

        // get today's date for validation measured_at
        $today = Carbon::now()->setHour(0)->setMinutes(0)->setSeconds(0)->addDay(1)->toDateString();

        $max_count = Auth::user()->max_capacity;

        return [
            'measured_at' => 'required|date|composite_unique:statuses,measured_at,user_id|before:'.$today,
            'count' => 'required|integer|min:0|max:'.$max_count,
        ];
    }

    /**
     * Extends the \Validator with a custom rule that validates a unique combination of fields
     *
     */
    public function extendValidatorWithCompositeUnique(): void
    {
        // extends Validator only for this request
        \Validator::extend('composite_unique', function ($attribute, $value, $parameters, $validator) {

            // remove first parameter and assume it is the table name
            $table = array_shift($parameters);

            // start building the conditions
            $fields = [$attribute => $value]; // current field, company_code in your case

            // iterates over the other parameters and build the conditions for all the required fields
            while ($field = array_shift($parameters)) {
                $fields[$field] = $this->get($field);
            }

            // query the table with all the conditions
            $result = \DB::table($table)->select(\DB::raw(1))->where($fields)->first();

            return empty($result); // edited here
        }, 'your custom composite unique key validation message');
    }

}

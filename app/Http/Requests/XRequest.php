<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

class XRequest extends FormRequest
{
    /**
     *  Add some actions before the validation error response
     */
    protected function failedValidation(Validator $validator)
    {
        if(property_exists($this, 'toaster_message')) {

            if($this->toaster_message) {

                try {
                    message($validator->messages()->first(), 'toastr', 'error');
                } catch (Exception $e) {
                    message('Verifique o formulário', 'toastr', 'error');
                }
            }
        }

        parent::failedValidation($validator);
    }

    /**
     *  To ignore the current id for unique rule
     */
    protected function getIgnoredId() {

        if($this->getMethod() === 'PUT') {
            return (int)$this->segment(3);
        }

        return 0;
    }

    /**
     *  Laravel automatic function to prepare request for validation
     *  - All the requests call this method
     */
    protected function prepareForValidation() {

        $this->mergeSlugs();
        $this->mergeCheckboxes();
    }

    /**
     *  To merge checkboxes in requests
     *  - Whem is not checked they dont appear in requests
     */
    private function mergeCheckboxes() {
        if(property_exists($this, 'checkboxes')) {
            foreach($this->checkboxes as $check) {
                $this->merge([$check => $this->has($check)]);
            }
        }
    }

    /**
     *  Merges slug in requests
     */
    private function mergeSlugs() {

        if(property_exists($this, 'slugs')) {
            foreach($this->slugs as $key => $slug) {
                $this->merge([$key => \Str::slug($this->get($slug, ''))]);
            }
        }
    }
}

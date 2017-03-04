<?php

namespace Modules\Dashboard\Http\Requests;

use Auth;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class BackendCreateNavigationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $tblPrefix = config('cms.admin.table-prefix', 'core_');

        return [
            'name' => ['required', Rule::unique($tblPrefix.'navigation')->ignore($this->name, 'name')],
            'class' => 'string',
        ];
    }
}

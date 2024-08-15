<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\BaseServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends CrudController
{
    protected string $module = 'profile';

    protected ?string $storeRequest = ProfileUpdateRequest::class;

    protected ?string $updateRequest = ProfileUpdateRequest::class;

    public function __construct(
        BaseServiceInterface $service,
    ){
        parent::setService($service);
    }

}

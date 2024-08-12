<?php

namespace App\Services;

use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileService extends BaseService implements BaseServiceInterface
{

    public function __construct(
        BaseViewInterface $view,
        protected BaseServiceInterface $service,
    ){
        $this->view = $view;
    }

    public function edit($id=null): Factory|View
    {   
        return $this->view->edit([
            'user' => request()->user(),
            'config' => app(ConfigService::class)->read(),
        ]);
    }

    public function update($id, $data): RedirectResponse 
    {
        $request = app(ProfileUpdateRequest::class);
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy($id): RedirectResponse
    {
        request()->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = request()->user();

        Auth::logout();

        $user->delete();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return Redirect::to('/');
    }
}

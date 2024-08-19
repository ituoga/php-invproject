<!-- resources/views/users/form.blade.php -->
<form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
    @csrf
    @isset($user)
        @method('PUT')
    @endisset

    <div class="site-card clearfix">
        <div class="site-card__header">
            <h4>Vartotojas</h4>
        </div>
        <div class="site-card__body">
            <div class="row gy-3">
                <div class="col-12">
                    <label for="name" class="form-regular__label">Pavadinimas</label>
                    <input type="text" name="name" placeholder="Įveskite pirkėjo pavadinimą" id="name"
                        value="{{ isset($user) ? $user->name : old('name') }}">
                </div>
                <div class="col-12">
                    <label for="company_code" class="form-regular__label">Kodas</label>
                    <input type="text" name="company_code" placeholder="Įveskite pirkėjo kodą" id="company_code"
                        value="{{ isset($user) ? $user->company_code : old('company_code') }}">
                </div>
                <!-- <div class="col-12">
                    <label for="company_person" class="form-regular__label">PVM kodas</label>
                    <input type="text" name="company_person" placeholder="Įveskite pirkėjo PVM kodą" id="company_person" value="{{ isset($user) ? $user->company_person : old('company_person') }}">
                </div> -->
                <div class="col-12">
                    <label for="email" class="form-regular__label">El. paštas</label>
                    <input type="email" name="email" placeholder="Įveskite pirkėjo el.paštą" id="email"
                        value="{{ isset($user) ? $user->email : old('email') }}">
                </div>
                <div class="col-12">
                    <label for="password" class="form-regular__label">Slaptažodis</label>
                    @if($action == 'create')
                        <input type="text" name="password" placeholder="Įveskite pirkėjo el.paštą" id="email"
                            value="{{ \Str::password(16, true, true, false) }}">
                    @else
                        <input type="text" name="password" placeholder="Įveskite pirkėjo el.paštą" id="email" value="">
                    @endif
                </div>
                <div class="col-12">
                    <label for="phone" class="form-regular__label">Telefonas</label>
                    <input type="text" name="phone" placeholder="Įveskite pirkėjo telefoną" id="phone"
                        value="{{ isset($user) ? $user->phone : old('phone') }}">
                </div>
                <div class="col-12">
                    <label for="address" class="form-regular__label">Adresas</label>
                    <input type="text" name="address" placeholder="Įveskite pirkėjo adresą" id="address"
                        value="{{ isset($user) ? $user->address : old('address') }}">
                </div>
                <div class="col-12">
                    <label for="city" class="form-regular__label">Miestas</label>
                    <input type="text" name="city" placeholder="Įveskite pirkėjo miestą" id="city"
                        value="{{ isset($user) ? $user->city : old('city') }}">
                </div>
                <div class="col-12">
                    <label for="country" class="form-regular__label">Šalis</label>
                    <input type="text" name="country" placeholder="Įveskite pirkėjo šalį" id="country"
                        value="{{ isset($user) ? $user->country : old('country') }}">
                </div>
            </div>
        </div>
    </div>

    <br />
    <br />

    <div class="site-card clearfix">
        <div class="site-card__header">
            <h4>Vartotojo tipas, leidimai</h4>
        </div>
        <div class="site-card__body">
            <div class="row gy-3">
                <!-- <div class="col-6">
                    <input type="checkbox" name="is_client" id="is_client" value="1" {{ (isset($user) && $user->is_client) ? 'checked' : '' }}>
                    <label for="is_client" class="form-regular__label">Klientas</label>
                </div> -->
                <!-- <div class="col-6">
                    <input type="checkbox" name="is_worker" id="is_worker" value="1" {{ (isset($user) && $user->is_worker) ? 'checked' : '' }}>
                    <label for="is_worker" class="form-regular__label">Mechanikas</label>
                </div> -->
                <!-- <div class="col-6">
                    <input type="checkbox" name="is_manager" id="is_manager" value="1" {{ (isset($user) && $user->is_manager) ? 'checked' : '' }}>
                    <label for="is_manager" class="form-regular__label">Vadovas</label>
                </div> -->
                <div class="col-3">
                    <input type="hidden" name="is_admin" id="is_admin"
                        value="{{ (isset($user) && $user->is_admin) ? '1' : '0' }}">
                    <!-- <label for="is_admin" class="form-regular__label">Administratorius</label> -->
                </div>


            </div>

            <div class="row">
                <div class="col-12 col-xl-3">
                    <label for="worker_category_id" class="form-regular__label">Darbuotojo kategorija</label>
                    <select name="worker_category_id" id="worker_category_id" class="js-select" style="padding:5px; min-width: 150px">
                        <!-- <option value="">Pasirinkti kategoriją</option> -->
                        @foreach ($workerCategories as $category)
                            <option value="{{ $category->id }}" {{ (isset($user) && $user->worker_category_id == $category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-xl-3">
                    <label for="hours_per_day" class="form-regular__label">Dirba valandų per dieną</label>
                    <input type="text" name="hours_per_day" placeholder="Įveskite valandas per dieną" id="hours_per_day"
                        value="{{ isset($user) ? $user->hours_per_day : old('hours_per_day', 8) }}">
                </div>

                <div class="col-12 col-xl-3">
                    <label for="level" class="form-regular__label">Darbuotojo tipas</label>
                    <select name="level" id="level" class="js-select" style="padding:5px; min-width: 150px">
                        <!-- <option value="">Pasirinkti kategoriją</option> -->
                        @foreach (["1"=>"Mechanikas","2"=>"Priėmėjas","3"=>"Direktorius/savininkas"] as $l => $name)
                            <option value="{{ $l }}" {{ (isset($user) && $user->level == $l) ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-xl-3">
                    <label for="default_filter_id" class="form-regular__label">Darbuotojų filtras vadovui</label>
                    <select name="default_filter_id" id="default_filter_id" class="js-select" style="padding:5px; min-width: 150px">
                        <option value="">Pasirinkti filtrą</option>
                        @foreach ($filters as $filter)
                            <option value="{{ $filter->id }}" {{ (isset($user) && $user->default_filter_id == $filter->id) ? 'selected' : '' }}>
                                {{ $filter->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <h3 style="padding-top:2rem">Leidimai</h3>
            <div class="col-12">
                <input type="checkbox" name="is_manager" id="is_manager" value="1" {{ (isset($user) && $user->is_manager) ? 'checked' : '' }}>
                <label for="is_manager" class="form-regular__label" style="font-size: 24px;">Vadovas</label>
            </div>

            <hr />

            <div class="row gy-3 perms-manager" @if(isset($user) && !$user->is_manager) style="display: none;" @endif>

                @foreach ($permissionTypes as $type)
                    @if ($type->is_for_manager == 1)
                        <div class="col-6 ">
                            <input type="checkbox" name="permissions[]" id="id-{{ $type->id }}" value="{{ $type->id }}" {{ in_array($type->id, $selectedPermissions) ? 'checked' : '' }}>
                            <label for="id-{{ $type->id }}" class="form-regular__label">{{ $type->description }}</label>
                        </div>
                    @endif
                @endforeach
                
                
            </div>

            <!-- <h5 style="margin-top:2rem;">Mechanikas</h5> -->
            <div style="margin-top: 2rem;">
                <input type="checkbox" name="is_worker" id="is_worker" value="1" {{ (isset($user) && $user->is_worker) ? 'checked' : '' }}>
                <label for="is_worker" class="form-regular__label" style="font-size: 24px;">Mechanikas</label>
            </div>
            <hr />

            <div class="row gy-3 perms-worker" @if(isset($user) && !$user->is_worker) style="display: none;" @endif>
                @foreach ($permissionTypes as $type)
                    @if ($type->is_for_worker == 1)
                        <div class="col-6 ">
                            <input type="checkbox" name="permissions[]" id="id-{{ $type->id }}" value="{{ $type->id }}" {{ in_array($type->id, $selectedPermissions) ? 'checked' : '' }}>
                            <label for="id-{{ $type->id }}" class="form-regular__label">{{ $type->description }}</label>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="site-card clearfix mt-4">
        <div class="site-card__header">
            <h4>Priklauso filtrams</h4>
        </div>
        <div class="site-card__body">
            <div class="row gy-3">

                @foreach ($filters as $filter)
                    <div class="col-6 ">
                        <input type="checkbox" name="filters[]" id="fid-{{ $filter->id }}" value="{{ $filter->id}}" {{ in_array($filter->id, $selectedFilters) ? 'checked' : '' }}>
                        <label for="fid-{{ $filter->id }}" class="form-regular__label">{{ $filter->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    

    <div class="mt-4">
        <button type="submit" class="btn btn--primary btn--block-xs"
            style="margin-top:1.5rem; width:100%; margin-bottom:1rem">Išsaugoti</button>
    </div>

</form>

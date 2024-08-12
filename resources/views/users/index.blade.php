
<x-app-layout>

    <h1>
        @if (request()->has('is_worker'))
            Darbuotojai
        @elseif (request()->has('is_client'))
            Klientai
        @endif        
    </h1>

    <div class="row align-items-center">
        <div class="col m-b-20 site-buttons">
            @if ( 
                    (request()->has('is_worker') and $current_user->hasPermission('manage_workers')) 
                    OR  
                    (request()->has('is_client') and $current_user->hasPermission('manage_clients')) 
                )
                <a href="{{ route('users.filter-modal') }}" class="btn btn--secondary js-modal-link" aria-label="filtras"><i class="icon-filter" aria-hidden="true"></i></a>
                <a href="{{ route('users.create') }}" class="btn btn--secondary"><i class="icon-plus" aria-hidden="true"></i><span class="hidden-xs">
                    Sukurti 
                    @if (request()->has('is_worker'))
                        darbuotoją
                    @elseif (request()->has('is_client'))
                        klientą
                    @endif 
                </span></a>
            @endif
        </div>
        <div class="col-12 col-sm-6 col-xl-4 m-b-20 order-sm-first">
            <form action="{{ route('users.index') }}" method="GET" class="clearfix">
                <label for="id-047724" class="visually-hidden">ieškoti</label>
                <div class="form-regular__wrap">
                    <span class="form-regular__icon"><i class="icon-search" aria-hidden="true"></i></span>
                    <input type="text" name="text" placeholder="Ieškoti kliento" id="id-047724">
                </div>
            </form>
        </div>
    </div>

    <table style="">
        <tr>
            <th>Klientas</th>
            <th>El.paštas</th>
            <th>Numeris</th>
            <th>Adresas</th>
            <th class="text-right">Veiksmai</th>
        </tr>

        @foreach ($users as $u)
        <tr data-tr="@if (request()->has('is_worker')) Darbuotojas @elseif (request()->has('is_client')) Klientas @endif">
            <td data-th="Klientas">{{ $u->name }}</td>
            <td data-th="El.paštas">{{ $u->email }}</td>
            <td data-th="Numeris">{{ $u->phone }}</td>
            <td data-th="Adresas">{{ $u->address }}</td>
            <td data-th="Veiksmai">
                @if ( 
                    (request()->has('is_worker') and $current_user->hasPermission('manage_workers')) 
                    OR  
                    (request()->has('is_client') and $current_user->hasPermission('manage_clients')) 
                    OR  
                    (request()->has('is_manager') and $current_user->hasPermission('manage_clients')) 
                )
                    <ul class="site-helpers justify-content-end">
                        {{--
                        <li class="site-helpers__items"><a href="#" class="site-helpers__links color-persian-green"><i class="icon-clipboard" aria-hidden="true"></i></a></li>
                        --}}
                        <li class="site-helpers__items"><a href="{{ route('users.edit', $u->id) }}" class="site-helpers__links color-yellow-orange"><i class="icon-edit" aria-hidden="true"></i></a></li>
                        <li class="site-helpers__items">
                            <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="site-helpers__links color-scarlet" onclick="return confirm('Ar tikrai norite ištrinti šį klientą?')"><i class="icon-trash" aria-hidden="true"></i></button>
                            </form>
                        </li>
                    </ul>
                @endif
            </td>
        </tr>
        @endforeach

    </table>


    {{ $users->links('components.pagination') }}


</x-app-layout>

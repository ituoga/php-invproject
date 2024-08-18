    <x-app-layout>


        <h1>Produktai</h1>

        {{-- <x-search_buttons/> --}}

        <div class="row align-items-center">
            <div class="col m-b-20 site-buttons">
                <a href="{{ route('products.create') }}" class="btn btn--primary"><i class="icon-plus"
                        aria-hidden="true"></i><span class="hidden-xs">
                        Sukurti
                    </span></a>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 m-b-20 order-sm-first">
                <form action="{{ route('products.index') }}" method="GET" class="clearfix">
                    <label for="id-047724" class="visually-hidden">{{__("ieškoti")}}</label>
                    <div class="form-regular__wrap">
                        <span class="form-regular__icon"><i class="icon-search" aria-hidden="true"></i></span>
                        <input type="text" name="text" placeholder="{{__("Ieškoti produkto")}}" id="id-047724">
                    </div>
                </form>
            </div>
        </div>

        <table>
            <tr>
                <th>{{__("Pavadinimas")}}</th>
                <th>{{__("Kaina")}}</th>
                <th>{{__("Veiksmai")}}</th>
            </tr>
            @foreach ($items as $item)
                <tr data-tr="{{ $item->name }}">
                    <td data-th="{{__("Pavadinimas")}}">{{ $item->name }}</td>
                    <td data-th="{{__("Kaina")}}">{{ $item->price }}</td>
                    <td data-th="{{__("Veiksmai")}}">
                    @include("partials.actions", [
                                'item' => $item,
                                'editRoute' => "products.edit",
                              ])

                    </td>
                </tr>
            @endforeach
        </table>
    </x-app-layout>

    <x-app-layout>


        <h1>Produktai</h1>

        {{-- <x-search_buttons/> --}}

        @include("components.search_buttons", ["createNew" => route("products.create"), "filter" => ""])

        <table>
            <tr>
                <th>{{__("Pavadinimas")}}</th>
                <th>{{__("Kaina")}}</th>
                <th class="w-1/8 text-right">{{__("Veiksmai")}}</th>
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

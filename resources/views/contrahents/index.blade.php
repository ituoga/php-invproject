<x-app-layout>
<h1>{{__("Klientai")}}</h1>

    @include("components.search_buttons", ["createNew" => route("contrahents.create"), "filter" => ""])

    <table>
        <tr>
            <th>{{__("Pavadinimas")}}</th>
            <th>{{__("Telefonas")}}</th>
            <th>{{__("El. paštas")}}</th>
            <th>{{__("Veiksmai")}}</th>
        </tr>
        @foreach ($items as $contrahent)
            <tr data-tr="{{ $contrahent->name }}">
                <td data-td="{{__("Pavadinimas")}}">{{ $contrahent->name }}</td>
                <td data-td="{{__("Telefonas")}}">
                    <a href="tel:{{$contrahent->phone}}">{{ $contrahent->phone }}</a>
                </td>
                <td data-td="{{__("El. paštas")}}">
                    <a href="mailto:{{$contrahent->email}}">{{ $contrahent->email }}</a>
                </td>
                <td>
                    @include("partials.actions", ['item' => $contrahent, 'editRoute' => "contrahents.edit"])
                </td>
            </tr>
        @endforeach
    </table>

</x-app-layout>

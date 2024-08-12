<x-app-layout>

<div class="row align-items-center">
        <div class="col m-b-20 site-buttons">
                <a href="{{ route('contrahents.create') }}" class="btn btn--primary"><i class="icon-plus" aria-hidden="true"></i><span class="hidden-xs">
                    Sukurti 
                </span></a>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 m-b-20 order-sm-first">
            <form action="{{ route('contrahents.index') }}" method="GET" class="clearfix">
                <label for="id-047724" class="visually-hidden">ieškoti</label>
                <div class="form-regular__wrap">
                    <span class="form-regular__icon"><i class="icon-search" aria-hidden="true"></i></span>
                    <input type="text" name="text" placeholder="Ieškoti kliento" id="id-047724">
                </div>
            </form>
        </div>
    </div>


    <table>
        <tr>
            <th>Pavadinimas</th>
            <th>Telefonas</th>
            <th>El. paštas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($items as $contrahent)
            <tr data-tr="{{ $contrahent->name }}">
                <td data-td="Pavadinimas">{{ $contrahent->name }}</td>
                <td data-td="Telefonas">
                    <a href="tel:{{$contrahent->phone}}">{{ $contrahent->phone }}</a>
                </td>
                <td data-td="El. paštas">
                    <a href="mailto:{{$contrahent->email}}">{{ $contrahent->email }}</a>
                </td>
                <td>
                    @can('manage_contrahents')
                        <a href="{{ url('contrahents/' . $contrahent->id . '/edit') }}">Redaguoti</a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

</x-app-layout>
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
                    <label for="id-047724" class="visually-hidden">ieškoti</label>
                    <div class="form-regular__wrap">
                        <span class="form-regular__icon"><i class="icon-search" aria-hidden="true"></i></span>
                        <input type="text" name="text" placeholder="Ieškoti kliento" id="id-047724">
                    </div>
                </form>
            </div>
        </div>

        <h2>Darbų statuso apžvalga</h2>

        <table>
            <tr>
                <th>Darbo ID</th>
                <th>Kaina</th>
            </tr>
            @foreach ($items as $item)
                <tr data-tr="Darbo statusas">
                    <td data-th="Statusas">{{ $item->name }}</td>
                    <td data-th="Darbuotojas">{{ $item->price }}</td>
                </tr>
            @endforeach
        </table>
    </x-app-layout>

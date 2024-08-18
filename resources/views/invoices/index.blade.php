<x-app-layout>
  <h1>{{ __('Sąskaitos') }}</h1>

  @include("components.search_buttons", ["createNew" => route("invoices.create"), "filter" => ""])

  <h2>{{ __('Darbų statuso apžvalga') }}</h2>

  <table>
    <tr>
      <th>{{ __('Dokumento Data') }}</th>
      <th>{{ __('Darbuotojas') }}</th>
      <th>{{ __('Veiksmai') }}</th>
    </tr>
    @foreach($items as $item)
    <tr data-tr="{{ __('Sąskaita') }} {{ $item->id }}">
      <td data-th="{{ __('Dokumento Data') }}">{{ $item->document_date }}</td>
      <td data-th="{{ __('Darbuotojas') }}">{{ $item->contrahent_name }}</td>
      <td data-th="{{ __('Veiksmai') }}">
        <div class="row">
          <div class="col">
            <a href="{{ route("invoices.read", $item) }}" class="btn btn--default">{{ __('Peržiūrėti') }}</a>
          </div>
          <div class="col">

            <a href="{{ route("invoices.edit", $item) }}" class="btn btn--default">{{ __('Redaguoti') }}</a>
          </div>
          <div class="col">
            <form action="{{ route("invoices.delete", $item) }}" method="POST">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn--default">{{ __('Ištrinti') }}</button>
            </form>
          </div>
          </div>
        </td>
    </tr>
    @endforeach
  </table>
</x-app-layout>
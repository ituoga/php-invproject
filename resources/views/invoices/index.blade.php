<x-app-layout>
  <h1>Saskaitos</h1>

  @include("components.search_buttons", ["createNew" => route("invoices.create"), "filter" => ""])

  <table>
    <tr>
      <th>Dokumento Data</th>
      <th>Darbuotojas</th>
      <th>Veiksmai</th>
    </tr>
    @foreach($items as $item)
    <tr data-tr="Saskaita {{ $item->id }}">
      <td data-th="Dokumento Data">{{ $item->document_date }}</td>
      <td data-th="Darbuotojas">{{ $item->contrahent_name }}</td>
      <td data-th="Veiksmai">
        <div class="row">
          <div class="col">
            <a href="{{ route("invoices.read", $item) }}" class="btn btn--default">Peržiūrėti</a>
          </div>
          <div class="col">

            <a href="{{ route("invoices.edit", $item) }}" class="btn btn--default">Redaguoti</a>
          </div>
          <div class="col">
            <form action="{{ route("invoices.delete", $item) }}" method="POST">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn--default">Ištrinti</button>
            </form>
          </div>
          </div>
        </td>
    </tr>
    @endforeach
  </table>
</x-app-layout>
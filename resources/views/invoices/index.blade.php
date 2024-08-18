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

          @include("partials.actions", [
            'item' => $item,
            'editRoute' => "invoices.edit",

          ])
        </td>
    </tr>
    @endforeach
  </table>
</x-app-layout>

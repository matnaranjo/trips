<div class="table-responsive container-md mt-5">
  <div class="input-group mb-3">
    <input wire:model.debounce.300ms="search" type="text" placeholder="Search trip..." class="form-control mx-3" name="searchInfo"> </input>
    
    <select wire:model="category" class="form-select mx-3" aria-label="Default select example">
      <option disabled>Select category to look for</option>
      <option value="From">From</option>
      <option value="To">To</option>
    </select>

    <select wire:model="perPage" class="form-select mx-3" aria-label="Default select example">
      <option disabled>Entries per page</option>
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="30">30</option>
    </select>
  </div>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Value</th>
        <th scope="col">Payment</th>
        <th scope="col">Received</th>
        <th scope="col">Delivered</th>
      </tr>
    </thead>


    <tbody>
      @foreach($trips as $trip)
        <tr>
            <td class="border px-4 py-2">{{ $trip->from }}</td>
            <td class="border px-4 py-2">{{ $trip->to }}</td>
            <td class="border px-4 py-2">{{ $trip->value }}</td>
            <td class="border px-4 py-2">{{ $trip->payment }}</td>
            <td class="border px-4 py-2">{{ $trip->received }}</td>
            <td class="border px-4 py-2">{{ $trip->delivered }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {!! $trips->links()!!}
</div>

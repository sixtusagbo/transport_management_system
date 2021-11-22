{{-- {{$destination}} --}}
<table>
    <thead>
        <tr>
          <th class="text-center" width="34%">Amount</th>
          <th width="34%">Vehicles - Depature time</th>
        </tr>
    </thead>
    <tbody>
        <tr>
          <td class="text-center"><small>&#8358;{{number_format($destination->amount, '2', '.', ',')}}</small></td>
          <td>
            @foreach ($destination->vehicles as $vehicle)
              <p><b>{{ $vehicle->plate_number }}</b> - <small>{{ $vehicle->depature_time }}</small></p>
            @endforeach  
          </td>
        </tr>
    </tbody>
</table>
<div class="form-group mb-3">
  {{Form::label('vehicle_id', 'Vehicle', ['class' => 'control-label'])}}
  {{Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control border ps-2', 'placeholder' => 'Select Vehicle', 'id' => 'vehicleID'])}}
</div>
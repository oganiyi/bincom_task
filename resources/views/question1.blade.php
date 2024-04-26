@extends('layouts.app')

@section('content')
    <div class="row">
        This page shows the result for any individual polling unit on a web page
    </div>

    <div class="card row shadow my-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Polling Unit Results</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Polling Unit Name</th>
                            <th>Ward</th>
                            <th>Local Government</th>
                            <th>State</th>
                            <th>Polling Unit Number</th>
                            <th>Party Score</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Polling Unit Name</th>
                            <th>Ward</th>
                            <th>Local Government</th>
                            <th>State</th>
                            <th>Polling Unit Number</th>
                            <th>Party Score</th>
                            <th>Total</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $sn = 0;
                            $total = 0;
                        @endphp
                        @foreach ($groupedResults as $key => $items)
                            <tr>
                                <td>{{ ++$sn }}</td>
                                <td>{{ $items[0]->pollingUnit->polling_unit_name }}</td>
                                <td>{{ $items[0]->pollingUnit->ward->ward_name }}</td>
                                <td>{{ $items[0]->pollingUnit->lga->lga_name }}</td>
                                <td>{{ $items[0]->pollingUnit->lga->state->state_name }}</td>
                                <td>{{ $items[0]->pollingUnit->polling_unit_number }}</td>
                                <td>
                                    <ul class="list-unstyled">
                                        @foreach ($items as $eachParty)
                                        @php
                                            $total += $eachParty->party_score
                                        @endphp
                                        <li>- {{ $eachParty->party_abbreviation }} - {{ $eachParty->party_score }}</li>
                                        @endforeach
                                        </ul>
                                </td>
                                <td>{{ $total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
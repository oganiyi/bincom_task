@extends('layouts.app')

@section('content')
    <div class="row">
        This page is used to store the result of a new polling unit
    </div>

    <form action="{{ route('pages.question3.post') }}" class="row my-5" method="POST">
        @csrf
        @method('post')
        <div class="col-md-6 mb-3">
            <label for="party">Select your Party</label>
            <select name="party" id="party" class="form-select">
                @foreach ($parties as $party)
                    <option value="{{ $party->partyid }}" {{ old('party') == $party->partyid ? 'selected' : "" }}>
                        {{ $party->partyname }}
                    </option>
                @endforeach
            </select>
            @error('party')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="polling_unit">Select your Polling Unit</label>
            <select name="polling_unit" id="polling_unit" class="form-select">
                @foreach ($pollingUnits as $pollingUnit)
                    <option value="{{ $pollingUnit->uniqueid }}" {{ old('polling_unit') == $pollingUnit->uniqueid ? 'selected' : "" }}>
                        {{ $pollingUnit->polling_unit_name }} - {{ $pollingUnit->polling_unit_number }}
                    </option>
                @endforeach
            </select>
            @error('party')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="party_score">Party Score</label>
            <input type="number" class="form-control" id="party_score" name="party_score" value="{{ old('party_score') }}">
            @error('party_score')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="entered_by">Entered By</label>
            <input type="text" id="entered_by" class="form-control" name="entered_by" value="{{ old('entered_by') }}">
            @error('entered_by')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <input class="col-md-4 mx-auto btn btn-success mt-2" type="submit" value="Get">
        @if (session('message'))
        <h3 class="col-12 text-danger">{{ session('message') }}</h3>
        @endif

        @if (session('success'))
        <h3 class="col-12 text-success">{{ session('success') }}</h3>
        @endif
    </form>

@endsection
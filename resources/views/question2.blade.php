@extends('layouts.app')

@section('content')
    <div class="row">
        This page shows the sum total of all the polling units under any particular local government
    </div>

    <form action="{{ route('pages.question2.post') }}" class="row my-5" method="POST">
        @csrf
        @method('post')
        <div class="col-md-6">
            <label for="">Select your Local Government</label>
            <select name="local_government" id="" class="form-select">
                @foreach ($lgas as $lga)
                    <option value="{{ $lga->lga_id }}"
                        @isset($selected_lga)
                            {{ $selected_lga->lga_id == $lga->lga_id ? 'selected' : ''}}
                        @endisset>
                        {{ $lga->lga_name }}
                    </option>
                @endforeach
            </select>
            @error('local_government')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input class="btn btn-success mt-2" type="submit" value="Get">
        </div>
    </form>

    @isset($lga_result)
        @if (count($lga_result) > 0)
        <p>The total of all the polling units in {{ $selected_lga->lga_name }} Local Government is {{ number_format($lga_result->sum('party_score')) }} </p>
        @else
        <p>{{ $selected_lga->lga_name }} Local Government result is not available yet</p>        
        @endif
    @endisset

@endsection
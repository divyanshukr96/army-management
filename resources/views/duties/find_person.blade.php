@extends('layouts.app')

@section('content')

    <div class='col-lg-10 offset-lg-1'>

        <h3><i class="fa fa-users" style="font-size: large"></i>  Add Person's <span
                title="Military Hospital">MH</span> or <span title="Temporary Duty">T/Duty</span>

            {{ Form::open(['class' => 'form-inline float-right', 'method' => 'get']) }}
            {{ Form::search('search', request()->get('search'), ['class' => 'form-control mr-sm-1', 'placeholder' => 'Search person']) }}
            {{ Form::submit('Search', ['class' => 'btn btn-outline-success']) }}
            {{ Form::close() }}

        </h3>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Regd. No.</th>
                    <th scope="col">Company</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>

                <tbody>
                @if(count($armies) > 0)
                    @php
                        $s_no = $armies->currentpage() * $armies->perpage() -  $armies->perpage();
                    @endphp
                    @foreach ($armies as $army)
                        <tr>
                            <th scope="row">{{ sprintf('%02d',++$s_no) }}</th>
                            <td><a href="{{ route('duties.create', $army->id) }}">{{ $army->name }}</a></td>
                            <td>{{ $army->rank }}</td>
                            <td>{{ $army->regd_no }}</td>
                            <td>{{ $army->company }}</td>
                            <td>{{ $army->email }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row" colspan="6" class="text-center bg-warning">
                            Data not available @if(request()->get('query')) for
                            search {{ request()->get('query') }}@endif
                            @if($armies->currentpage() > 1)
                                <a href="{{$armies->previousPageUrl()}}">Go to previous page</a>
                            @endif
                        </th>
                    </tr>
                @endif
                </tbody>

            </table>


            {{ $armies->links() }}

        </div>
        @if(request()->get('search'))
            <a href="{{ route('duties.new') }}" class="btn btn-info float-right">Clear search</a>
        @endif
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>

@endsection

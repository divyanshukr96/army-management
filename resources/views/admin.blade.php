@extends('layouts.app')
@section('content')


    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-12 col-md-3">
            <div class="card bg-info">
                <div class="card-header h4 font-weight-bold py-2">
                    Leave
                </div>
                <div class="card-body">
                    <div>Today Leave Granted: <span class="font-weight-bolder"> {{ $leave->today }}</span></div>
                    <div>Currently on Leave: <span class="font-weight-bolder"> {{ $leave->current }}</span></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card bg-info">
                <div class="card-header h4 font-weight-bold py-2">
                    Punishments
                </div>
                <div class="card-body">
                    <div>Today Punishment Awarded: <span class="font-weight-bolder"> {{ $punishment->today }}</span>
                    </div>
                    <div>Total Punishment Awarded: <span class="font-weight-bolder"> {{ $punishment->total }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card bg-info">
                <div class="card-header h4 font-weight-bold py-2">
                    Armies
                </div>
                <div class="card-body">
                    <div>Registration Completed: <span class="font-weight-bolder"> {{ $armies->complete }}</span></div>
                    <div>Registration Pending: <span class="font-weight-bolder"> {{ $armies->pending }}</span></div>
                    <div>Total: <span class="font-weight-bolder"> {{ $armies->complete + $armies->pending }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="819" height="345"--}}
    {{--            style="display: block; width: 819px; height: 345px;"></canvas>--}}

    <div class="row">
        <div class="col-12 col-md-6">
            <h4>Latest Punishment Awarded</h4>
            <div class="table-responsive mb-2">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Punishment</th>
                        <th>Order Date</th>
                        <th>By Whom</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($punishment->data as $punish)
                        <tr onclick="window.location = '{{route('punishments.show', $punish->id)}}'">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $punish->army->name }}</td>
                            <td>{{ $punish->punishment }}</td>
                            <td>{{ $punish->order_date }}</td>
                            <td>{{ $punish->by_whom }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <h4>New Armies Added</h4>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($armies->data as $army)
                        <tr onclick="window.location = '{{route('armies.show', $army->id)}}'">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $army->name }}</td>
                            <td>{{ $army->email }}</td>
                            <td>{{ $army->regd_no }}</td>
                            <td>{{ $army->rank }}</td>
                            <td>{{ $army->registered ? 'Registered' : 'Pending' }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <h4>Activities</h4>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Model</th>
                        <th>Data Changed</th>
                        <th>Action</th>
                        <th>Date & Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($activities) > 0)
                        @foreach($activities as $activity)
                            {{--                        <tr onclick="window.location = '{{route('armies.show', $army->id)}}'">--}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="px-2">{{ $activity->auditable_type }}</td>
                                <td class="text-concat">
                                    {{ json_encode($activity->new_values) }}
                                </td>
                                <td>{{ $activity->event }}</td>
                                <td>{{ $activity->created_at->format('F d, Y h:iA') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th scope="row" colspan="6" class="text-center py-2"> No activity available</th>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

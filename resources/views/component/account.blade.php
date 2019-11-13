<div class="card mb-2">
    <div class="card-header py-2">
        <h5 class="mb-0 font-weight-bold">Account Details</h5>
    </div>
    <div class="card-body pb-0 pt-1">
        @if($army->account)
            <div class="row mb-2">
                <div class="col-12 col-sm-4 pt-2">Account Number <span class="float-right">:</span></div>
                <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->account->account_no}}</div>
                <div class="col-12 col-sm-4 pt-2">Branch Name <span class="float-right">:</span></div>
                <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->account->branch_name}}</div>
                <div class="col-12 col-sm-4 pt-2">IFSC Code <span class="float-right">:</span></div>
                <div class="col-12 col-sm-8 pt-2 font-weight-bold">{{$army->account->ifsc}}</div>
                <div class="col-12 text-right">
                    @can('army-edit')
                        <a href="{{ route('account.edit',[$army->id, $army->account->id, 'redirect' => url()->full()]) }}"
                           class="btn btn-sm btn-info mx-2">Edit</a>
                    @endcan
                    @can('army-delete')
                    {{ Form::open(['method' => 'DELETE', 'route' => ['account.destroy', $army->id, $army->account->id], 'class' => 'd-inline']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger d-inline']) }}
                    {{ Form::close() }}
                    @endcan
                </div>
            </div>
        @else
            @can('army-edit')
                {{ Form::open(['route' => ['account.store', $army->id], 'novalidate']) }}
                <div class="form-row pt-1">
                    <div class="col-md-4 mb-2">
                        {{--                    {!! Form::label('account_no', 'Bank Account No.') !!}--}}
                        {!! Form::text('account_no',null,[
                        'class' => 'form-control ' . ($errors->has('account_no') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter account no',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('account_no') }}</div>
                    </div>
                    <div class="col-md-4 mb-2">
                        {{--                    {!! Form::label('branch_name', 'Bank Branch Name') !!}--}}
                        {!! Form::text('branch_name',null,[
                        'class' => 'form-control ' . ($errors->has('branch_name') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter bank branch name',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('branch_name') }}</div>
                    </div>
                    <div class="col-md-3 mb-2">
                        {{--                    {!! Form::label('ifsc', 'Bank IFSC Code') !!}--}}
                        {!! Form::text('ifsc',null,[
                        'class' => 'form-control ' . ($errors->has('ifsc') ? 'is-invalid' : ''),
                        'placeholder' => 'Enter Bank IFSC Code',
                        'required'
                        ]) !!}
                        <div class="invalid-feedback">{{ $errors->first('ifsc') }}</div>
                    </div>
                    <div class="col mb-2 text-right">
                        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {{ Form::close() }}
            @else
                <div class="py-2">
                    Account Details not available.
                </div>
            @endcan
        @endif

    </div>
</div>

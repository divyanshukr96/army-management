<div class="card mb-2">
    <div class="card-header py-2">
        <h5 class="mb-0 font-weight-bold">Insurance / Policy Details</h5>
    </div>
    <div class="card-body pb-0 pt-2">
        @if(count($army->insurances) > 0)
            @foreach($army->insurances as $insurance)
                <div class="text-right float-right">
                    {{ Form::open(['method' => 'DELETE', 'route' => ['insurance.destroy', $army->id, $insurance->id], 'class' => 'd-inline']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger d-inline']) }}
                    {{ Form::close() }}
                </div>
                <div class="row mb-1">
                    <div class="col-12 col-sm-4 col-md-2 pt-2">Policy Number</div>
                    <div class="col-12 col-sm-8 col-md-4 pt-2 font-weight-bold">{{$insurance->policy_no}}</div>
                    @if($insurance->policy_name)
                        <div class="col-12 col-md-6 pt-2 ">
                            ({{$insurance->policy_name}})
                        </div>
                    @endif
                </div>
                @if(!$loop->last)
                    <hr class="my-1">
                @endif
            @endforeach
            <hr style="margin: 1.1rem -1.2rem .5rem; border-top-width: 2px">
        @endif
        {{ Form::open(['route' => ['insurance.store', $army->id], 'novalidate']) }}
        <div class="form-row">
            <div class="col-md-5 mb-2">
                {!! Form::label('policy_no', 'Insurance Policy No.') !!}
                {!! Form::text('policy_no',null,[
                'class' => 'form-control ' . ($errors->has('policy_no') ? 'is-invalid' : ''),
                'placeholder' => 'Enter Insurance Policy no',
                'required'
                ]) !!}
                <div class="invalid-feedback">{{ $errors->first('policy_no') }}</div>
            </div>
            <div class="col-md-5 mb-2">
                {!! Form::label('policy_name', 'Insurance Policy Name') !!}
                {!! Form::text('policy_name',null,[
                'class' => 'form-control ' . ($errors->has('policy_name') ? 'is-invalid' : ''),
                'placeholder' => 'Enter Insurance Policy Name',
                'required'
                ]) !!}
                <div class="invalid-feedback">{{ $errors->first('policy_name') }}</div>
            </div>
            <div class="col-md-2 mb-2 text-right align-self-end">
                {{ Form::submit('Add', ['class' => 'btn btn-primary ']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

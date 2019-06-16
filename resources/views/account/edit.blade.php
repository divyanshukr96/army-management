@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

    <div class='col-lg-4 offset-lg-4'>

        <h3><i class='fa fa-user-plus' style="font-size: large"></i> Edit Account</h3>
        <hr>
        @include('armies.details')

        <div class="border p-2">


            @if(request()->has('redirect'))
                {{ Form::model($account, array('route' => array('account.update', $army->id, $account->id, 'redirect' => request()->get('redirect')), 'method' => 'PUT')) }}
            @else
                {{ Form::model($account, array('route' => array('account.update', $army->id, $account->id), 'method' => 'PUT')) }}
            @endif

            <div class="form-group mb-2">
                {{ Form::label('account_no') }}
                {{ Form::text('account_no', null, array('class' => 'form-control '.($errors->has('account_no') ? 'is-invalid' : ''))) }}
                <div class="invalid-feedback">{{ $errors->first('account_no') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('branch_name') }}
                {{ Form::text('branch_name', null, array('class' => 'form-control '.($errors->has('branch_name') ? 'is-invalid' : ''))) }}
                <div class="invalid-feedback">{{ $errors->first('branch_name') }}</div>
            </div>

            <div class="form-group mb-2">
                {{ Form::label('ifsc') }}
                {{ Form::text('ifsc', null, array('class' => 'form-control '.($errors->has('ifsc') ? 'is-invalid' : ''))) }}
                <div class="invalid-feedback">{{ $errors->first('ifsc') }}</div>
            </div>


            <div class="d-flex justify-content-between mt-4 mb-2">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Update', array('class' => 'btn btn-primary px-4')) }}
            </div>

            {{ Form::close() }}
        </div>

    </div>

@endsection

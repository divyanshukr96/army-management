@php
    $documents = \App\Enums\DocumentType::toSelectArray();
@endphp
<div class="card mb-2">
    <div class="card-header py-2">
        <h5 class="mb-0 font-weight-bold">Documents</h5>
    </div>
    <div class="card-body pb-0 pt-2">
        @if(count($army->documents) > 0)
            <div class="mb-2">
                @foreach($army->documents as $doc)
                    <div class="font-weight-bold border-bottom pb-1">{{$doc->type->value}}</div>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-8 pt-2">
                            <span class="pr-3">Card No. </span>: {{$doc->document_no}}</div>
                        <div class="col-12 col-sm-4 pt-1 text-truncate">
                            <a href="{{ asset("image/{$doc->image}") }}" class="pr-2">View</a>
                            <a href="{{ asset("image/{$doc->image}") }}" class="btn btn-sm btn-warning d-inline"
                               download="{{$doc->image}}">Download</a>

                            {{--                            <a href="{{ '' }}" class="btn btn-sm btn-info mx-2">Edit</a>--}}

                            @can('army-delete')
                                {{ Form::open(['method' => 'DELETE', 'route' => ['documents.destroy', $army->id, $doc->id], 'class' => 'd-inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger d-inline']) }}
                                {{ Form::close() }}
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
            <hr style="margin: 1.1rem -1.2rem .5rem; border-top-width: 2px">
        @endif
                @hasanypermission("army-edit|army-add")
        {{ Form::open(['route' => ['documents.store', $army->id], 'novalidate', 'files' => true]) }}
        <div class="form-row ">
            <div class="col-md-3 mb-2">
                {!! Form::label('type', 'Document Type') !!}
                {!! Form::select('type', $documents,
                null,[
                'class' => 'form-control ' . ($errors->has('type') ? 'is-invalid' : ''),
                'placeholder' => 'Select Document Type',
                'required'
                ]) !!}
                <div class="invalid-feedback">{{ $errors->first('type') }}</div>
            </div>
            <div class="col-md-4 mb-2">
                {!! Form::label('document_no', null) !!}
                {!! Form::text('document_no',null,[
                'class' => 'form-control ' . ($errors->has('document_no') ? 'is-invalid' : ''),
                'placeholder' => 'Enter document no',
                'required'
                ]) !!}
                <div class="invalid-feedback">{{ $errors->first('document_no') }}</div>
            </div>
            <div class="col-md-3 mb-2 pb-2">
                <div class="custom-file mt-md-3">
                    {!! Form::file('image',[
                    'class' => 'custom-file-input' . ($errors->has('image') ? ' is-invalid' : ''),
                    'required'
                    ]) !!}
                    {!! Form::label('image', 'Document Image', ['class' => 'custom-file-label']) !!}
                    <div class="invalid-feedback ">{{ $errors->first('image') }}</div>
                </div>
            </div>
            <div class="col-md-2 mb-2 text-right mt-md-4 pt-md-1">
                {{ Form::submit('Upload', ['class' => 'btn btn-primary ']) }}
            </div>
        </div>
        {{ Form::close() }}
        @endhasanypermission
    </div>
</div>

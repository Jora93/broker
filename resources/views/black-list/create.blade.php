@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row customer-create col-sm-12">
        <form method="post" action="{{ url('/'.\App::make('currentCompany')->id.'/black-list')}}" class="col-sm-12">
            @csrf

            <!-- Company Information -->
            <div class="col-md-12">
                <div class="entityPanel entityFillPanel customerPanel">
                    <div class="entityPanelHeading"a>
                        <div class="entityPanelTitle">Black List</div>
                    </div>
                    <div class="entityPanelBody tabIndexContainer">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input class="form-control" placeholder="Enter MC Number" type="text" name="name" value="{{old('name')}}" tabindex="64">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">MC #</label>
                                    <input class="form-control" placeholder="Enter MC Number" type="text" name="mc_number" value="{{old('mc_number')}}" tabindex="64">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customerNote" class="control-label">Note</label>
                                    <textarea class="form-control" id="customerNote" name="note" placeholder="Enter a note about this customer" rows="4" tabindex="15">{{old('note')}}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="entityPanel entityFillPanel customerPanel">
                    <button type="submit" class="btn btn-primary">Add To List</button>
                </div>
            </div>
        </form>
    </div>
@endsection

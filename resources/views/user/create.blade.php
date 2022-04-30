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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create User</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="agent-tab" data-toggle="tab" href="#agent" role="tab" aria-controls="agent" aria-selected="true">Accounting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="support-tab" data-toggle="tab" href="#support" role="tab" aria-controls="support" aria-selected="false">Support</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            {{--start create Accounting--}}
                            <div class="tab-pane fade show active" id="agent" role="tabpanel" aria-labelledby="agent-tab">
                                <form method="POST" action="{{ url(\App::make('currentCompany')->id.'/user-store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
                                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <input name="role" type="hidden" value="{{\App\Constanats\UserRoles::Accounting}}">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            {{--end create Accounting--}}
                            {{--start create support  TODO change ids --}}
                            <div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab">
                                <form method="POST" action="{{ url(\App::make('currentCompany')->id.'/user-store') }}">

                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <input name="role" type="hidden" value="{{\App\Constanats\UserRoles::Support}}">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            {{--end create support--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

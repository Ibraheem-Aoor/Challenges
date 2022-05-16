@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('salary.store')}}" class="form-control col-sm-6" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Salary:</label>
                                <input type="text" name="salary" class="form-control">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-primary">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

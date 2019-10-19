@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('contact.send') }}">
                {{ csrf_field() }}
 
                <div class="form-group">
                    <label for="formInputName">Name</label>
                    <input type="text" class="form-control" id="formInputName" name="name" value="{{ old('name') }}">
 
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
 
                <div class="form-group">
                    <label for="formInputEmail">Email address</label>
                    <input type="text" class="form-control" id="formInputEmail" name="email" value="{{ old('email') }}">
 
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
 
                <div class="form-group">
                    <label for="formInputEmail">Message</label>
                    <textarea class="form-control" id="formInputMessage" name="message" value="{{ old('message') }}">{{ old('message') }}</textarea>
 
                    @if ($errors->has('message'))
                        <span class="help-block">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                </div>
 
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
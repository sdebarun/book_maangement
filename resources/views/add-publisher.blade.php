@extends('layouts.master')
@section('forms')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body"><h3>Add New Publisher</h3></div>
    </div>    
    <hr/>
    @if(session('status'))
        @if(session('status')==0)
            <div class="alert alert-danger">Publisher could not be added </div>
        @endif
        @if(session('status')==1)   
            <div class="alert alert-success">Publisher successfully added </div>
        @endif 
    @endif 

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/publisher/doAddPublisher" method='POST'>
        @csrf
        <div class="form-group">
            <label for="publisherName">Name of the Publisher</label>
            <input type="text" class="form-control" id="publisherName" name='publisherName'>
        </div>
        <div class="form-group">
            <label for="publisherDesription">Description (optional):</label>
            <textarea class="form-control" rows="5" id="publisherDesription" name='publisherDesription'></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection

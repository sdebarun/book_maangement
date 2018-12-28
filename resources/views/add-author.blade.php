@extends('layouts.master')
@section('forms')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body"><h3>Add New Author</h3></div>
    </div>    
    <hr/>
    @if(session('status'))
        @if(session('status')==0)
            <div class="alert alert-danger">Author {{Lang::get('messages.failure.add')}}</div>
        @endif
        @if(session('status')==1)   
            <div class="alert alert-success">Author {{Lang::get('messages.success.add')}} </div>
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

    <form action="/author/doAddauthor" method='POST'>
        @csrf
        <div class="form-group">
            <label for="authorName">Name of the Author</label>
            <input type="text" class="form-control" id="authorName" name='authorName'>
        </div>
        <div class="form-group">
            <label for="authorDescription">Description (optional):</label>
            <textarea class="form-control" rows="5" id="authorDescription" name='authorDescription'></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection

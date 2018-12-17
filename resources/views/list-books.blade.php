@extends('layouts.master')
@section('additional_styles')
    <link rel="stylesheet" href="{{asset('css/datatable.min.css')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
@endsection
   
@section('additional_scripts')
    <script src="{{asset('js/datatable.min.js')}}" defer ></script>
    <script src="{{asset('js/script.js')}}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
    <div class="panel-body"><h3>Publishers</h3></div>
    <hr/>
    @if(session('status'))
        @if(session('status')==0)
            <div class="alert alert-danger">Publisher could not be Deleted </div>
        @endif
        @if(session('status')==1)   
            <div class="alert alert-success">Publisher successfully Deleted </div>
        @endif 
    @endif 
    </div>
    <table id="allauthors" class="table table-striped table-bordered hover" style="width:100%">
        <thead>
            <tr align="center">
                <th>Sr.</th>
                <th>Name</th>
                <th>Author</th>
                <th>Description</th>
                <th>Publisher</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $sr = 1; ?>
        @foreach($retval as $val)
            <tr align="center" class='test'>
                <td>{{$sr++}}</td>
                <td>{{$val['bookName']}}</td>
                <td class='authors'>
                    @foreach($val['authors'] as $author)
                        {{$author}}
                    @endforeach
                </td>
                <td>{{$val['bookDescription']}}</td>
                <td>
                    @foreach( $val['publishers'] as $key=>$id)
                        @if($val['publisher_id'] == $id)
                            {{$key}}
                        @endif    
                    @endforeach   
                </td>
                <td> 
                    <span class='anchor-wrapper'><a href="/books/edit/{{$val['id']}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a></span>
                    <form action="{{route('books.delete', ['id' => $val['id']])}}" method="POST" id='formTodel'>
                        @csrf
                        <button type='submit' class="btn btn-danger btn-sm del" data-id="{{$val['id']}}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> 
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr align='center'>
                <th>Sr.</th>
                <th>Name</th>
                <th>Author</th>
                <th>Description</th>
                <th>Publisher</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>  
</div>
          
@endsection
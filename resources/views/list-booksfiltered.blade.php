@extends('layouts.master')
@section('additional_styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
@endsection
   
@section('additional_scripts')
    <script src="{{asset('js/script.js')}}" defer></script>
@endsection
@section('content')
<div class='container'>
    <div class='text-right datefilterWrapper'>
        <form action='/paginated/filtered' method="POST" class="form-inline">
            @csrf
            <div class="form-group">
                <label for="dateFilter">Select Data</label>
                <select id='dateFilter' class='form-control' name='startDate'>
                    <option value="{{date('Y-m-d H:i:s')}}">Today</option>
                    <option value="{{date('Y-m-d H:i:s', strtotime('-7 days'))}}">7 days</option>
                </select>
            </div> 
            <div class='from-group'>
                <button class='btn btn-success form-control' type='submit'>Filter</button>
            </div>
        </form>   
    </div>
<table id="allauthors" class="table table-striped table-bordered hover" style="width:100%">
        <thead>
            <tr align="center">
                <th>Sr.</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Description</th>
                <th>Publisher</th>
                <th>Added on</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $sr = 1; ?>
        @foreach($data as $val)
            <tr align="center" class='test'>
                <td>{{$sr++}}</td>
                <td>{{$val['bookName']}}</td>
                <td class='authors'>
                    @foreach($val['authors'] as $key => $author)
                        <p>{{$author}}</p>
                    @endforeach
                </td>
                <td>{{$val['bookDescription']}}</td>
                <td>
                    @foreach( $val['publishers'] as $key=>$id)
                        @if($val['publisher_id'] == $key)
                            {{$id}}
                        @endif    
                    @endforeach   
                </td>
                <td>
                    {{date('d-m-Y',strtotime($val['created_at']))}}
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
                <th>Book Name</th>
                <th>Author</th>
                <th>Description</th>
                <th>Publisher</th>
                <th>Added on</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
    </div>
    @endsection
  
@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Omikujis
            <a class="btn btn-success pull-right" href="{{ route('omikujis.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($omikujis->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                        <th>MSG</th>
                        <th>PRICE</th>
                        <th>RETURN_BIG</th>
                        <th>RETURN_SMALL</th>
                        <th>AMOUNT_ALL</th>
                        <th>AMOUNT_BIG</th>
                        <th> AMOUNT_SMALL</th>
                        <th>PUBLISHED</th>
                        <th>END</th>
                        <th>CREATED_AT</th>
                        <th>UPDATED_AT</th>
                        <th>DELETE_FLG</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($omikujis as $omikuji)
                            <tr>
                                <td>{{$omikuji->id}}</td>
                                <td>{{$omikuji->name}}</td>
                    <td>{{$omikuji->msg}}</td>
                    <td>{{$omikuji->price}}</td>
                    <td>{{$omikuji->return_big}}</td>
                    <td>{{$omikuji->return_small}}</td>
                    <td>{{$omikuji->amount_all}}</td>
                    <td>{{$omikuji->amount_big}}</td>
                    <td>{{$omikuji-> amount_small}}</td>
                    <td>{{$omikuji->published}}</td>
                    <td>{{$omikuji->end}}</td>
                    <td>{{$omikuji->created_at}}</td>
                    <td>{{$omikuji->updated_at}}</td>
                    <td>{{$omikuji->delete_flg}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('omikujis.show', $omikuji->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('omikujis.edit', $omikuji->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('omikujis.destroy', $omikuji->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $omikujis->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
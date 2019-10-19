<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
    
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- 本登録フォーム -->
        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            
            <!-- Visionの支援のリターンのタイトル -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="book" class="col-sm-3 control-label">リターン</label>
                    <input type="text" name="item_name" id="book-name" class="form-control">
                </div>
            </div>
                
                <!--何人まで-->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="number" class="col-sm-3 control-label">数量</label>
                    <input type="text" name="item_number" id="book-number"class="form-control">
                </div>
            </div>
                
                <!--金額-->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="amount" class="col-sm-3 control-label">金額</label>
                    <input type="text" name="item_amount" id="book-amount" class="form-control">
                </div>
            </div>
                
                <!--公開日時-->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="published" class="col-sm-3 control-label">公開日時</label>
                    <input type="date" name="published" id="book-published" class="form-control">
                </div>
            </div>
            
            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>
        
        
         <!-- 現在 本 -->
         @if (count($books) > 0)
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    優待
                </div>
                <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>Myリターン一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                         @forelse ($books as $book)
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $book->item_name }}</div>
                                    <div>数量:{{ $book->item_number }}</div>
                                    <div>金額:{{ $book->item_amount }}</div>
                                    <div>{{ $book->published }}</div>
                                </td>
                                
                                <!-- 本：更新ボタン -->
                                <td>
                                    <form action="{{ url('booksedit/'.$book->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-pencil"></i> 更新 </button>
                                    </form>
                                </td>
                                
                                <!-- 本: 削除ボタン -->
                                <td>
                                    <form action="{{ url('book/delete/'.$book->id) }}" method="POST">
                                        
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> 
                                            削除
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                        @empty
                        <tr>
                            <td>
                                No posts yet
                            </td>
                        <tr>
                         @endforelse
                         
                    </tbody>
                </table>
            </div>
            
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                   {{ $books->links()}}
                 </div>
            </div>
            
        </div>
    @endif
    <!--  ook: 既に登録されてる本 リスト -->
   
    </div>
@endsection
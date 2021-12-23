<!-- resources/views/coffees.blade.php -->
@extends('layouts.app')
@section('content')

    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            Coffeeの種類
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- コーヒー店 -->
        <form action="{{ url('coffees') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="store" class="col-sm-3 control-label">Coffee Store</label>
                    <input type="text" name="store_name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="coffee" class="col-sm-3 control-label">Coffee</label>
                    <input type="text" name="coffee_name" class="form-control">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="reviwe" class="col-sm-3 control-label">レビュー</label>
                    <input type="text" name="reviwe" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="date" class="col-sm-3 control-label">購入日</label>
                    <input type="date" name="date" class="form-control">
                </div>
            </div>

            <!-- コーヒー 登録ボタン -->
            <div class="form-row">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <!-- coffee: 既に登録されてるコーヒーのリスト -->
    <!-- 現在のコーヒー -->
    @if (count($coffees) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>Coffee List</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($coffees as $coffee)
                            <tr>
                                <!-- コーヒーの情報 -->
                                <td class="table-text">
                                    <div>{{ $coffee->store_name }}</div>
                                    <div>{{ $coffee->coffee_name }}</div>
                                </td>
                                
                                <!--  コーヒー：更新ボタン -->
                                <td>
                                    <form action="{{ url('coffeesedit/'.$coffee->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            更新
                                        </button>
                                    </form>
                                </td>

                                <!-- コーヒー: 削除ボタン -->
                                <td>
                                    <form action="{{ url('coffee/'.$coffee->id) }}" method="POST">
                                        @csrf               <!-- CSRFからの保護 -->
                                        @method('DELETE')   <!-- 擬似フォームメソッド -->
                                        
                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    
@endsection
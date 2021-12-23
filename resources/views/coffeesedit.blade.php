@extends('layouts.app')

@section('content')
<div class="row container">
    <div class="col-md-12">
        @include('common.errors')
        <form action="{{ url('coffees/update') }}" method="POST">
            
            <!-- Coffee Store -->
            <div class="form-group">
                <label for="store_name">Coffee Store</label>
                <input type="text" name="store_name" class="form-control" value="{{$coffee->store_name}}">
            </div>
            
            <!-- Coffee -->
            <div class="form-group">
                <label for="coffee_name">Coffee</label>
                <input type="text" name="coffee_name" class="form-control" value="{{$coffee->coffee_name}}">
            </div>
            
            <!-- レビュー -->
            <div class="form-group">
                <label for="reviwe">レビュー</label>
                <input type="text" name="reviwe" class="form-control" value="{{$coffee->reviwe}}">
            </div>
            
            <!-- 購入日 -->
            <div class="form-group">
                <label for="date">購入日</label>
                <input type="date" name="date" class="form-control" value="{{$coffee->date}}">
            </div>
            
            <!-- Saveボタン/Backボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/')}}">Back</a>
            </div>
             <!-- id値を送信 -->
            <input type="hidden" name="id" value="{{$coffee->id}}">
         
            @csrf
            
            
        </form>
    </div>
</div>

@endsection
@extends('layouts.app')
@section('title', 'Add')
@section('content')
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="/payments" class="form-control w-25 mx-auto mt-3">
            @csrf
            <div class="my-2">
                <label class="d-block">Добавить</label>
                    <select name="is_income" class="form-select" onchange="window.location.href = this.options[this.selectedIndex].value">>
                        <option {{ $type === 0 ? 'selected' : '' }} value="http://127.0.0.1:8000/payments/create">Расход</option>
                        <option {{ $type === 1 ? 'selected' : '' }} value="http://127.0.0.1:8000/payments/create?type=1">Доход</option>
                    </select>
                <input type="number" name="is_income" hidden value="{{$type}}">
            </div>
            <div class="my-2">
                <label class="d-block">Тип</label>
                @if(isset($type_names))
                    <select name="type_id" class="form-select">
                        @foreach($type_names as $name)
                            @if($loop->first)
                                <option selected value="{{ $name->type_id }}">{{ $name->type_name }}</option>
                            @else
                                <option value="{{ $name->type_id }}">{{ $name->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <div class="btn btn-info">Добавить тип</div>
                @endif
            </div>
            <div class="my-2">
                <label for="amount">Сумма</label>
                <input class="form-control" name="amount" type="number">
            </div>
            <div class="my-2">
                <label for="comment">Комментарий</label>
                <input class="form-control" type="text" name="comment">
            </div>
            <button class="btn btn-success">Добавить</button>
        </form>

    </div>
@endsection

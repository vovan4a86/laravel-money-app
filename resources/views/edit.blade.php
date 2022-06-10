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

        <form method="get" action="/payments/{{ $payment->id }}/update" class="form-control w-25 mx-auto mt-3">
            @csrf
            <div class="my-2">
                <label class="d-block">Обновить</label>
                    <select name="is_income" class="form-select" onchange="window.location.href = this.options[this.selectedIndex].value">>
                        <option {{ $payment->is_income === 0 ? 'selected' : '' }} value="http://127.0.0.1:8000/payments/{{ $payment->id }}/edit?type=0">Расход</option>
                        <option {{ $payment->is_income === 1 ? 'selected' : '' }} value="http://127.0.0.1:8000/payments/{{ $payment->id }}/edit?type=1">Доход</option>
                    </select>
                <input type="number" name="is_income" hidden value="{{$payment->is_income}}">
            </div>
            <div class="my-2">
                <label class="d-block">Тип</label>
                @if(isset($type_names))
                    <select name="type_id" class="form-select">
                        @foreach($type_names as $name)
                            <option {{ $name->type_id === $payment->t_id ? 'selected' : ''}} value="{{ $name->type_id }}">
                                {{ $name->type_name }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <div class="btn btn-info">Добавить тип</div>
                @endif
            </div>
            <div class="my-2">
                <label for="amount">Сумма</label>
                <input class="form-control" name="amount" type="number" value="{{ $payment->amount }}">
            </div>
            <div class="my-2">
                <label for="comment">Комментарий</label>
                <input class="form-control" type="text" name="comment" value="{{ $payment->comment }}">
            </div>
            <button class="btn btn-success">Добавить</button>
        </form>

    </div>
@endsection

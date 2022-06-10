@extends('layouts.app')
@section('title', 'Incomes')
@section('content')
<div>
    <h1>{{ $type === 1 ? 'Доходы' : 'Расходы' }}</h1>

    <div class="bg-success bg-opacity-25 p-2">
    @if($pays)
        <ul class="list-group">
            @foreach($pays as $pay)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <span>{{ $pay->amount }} - {{ $pay->comment }}</span>
                        <span class="fst-italic">{{ $pay->updated_at }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
        <h4 class="mt-3">Общий {{ $type === 1 ? 'доход' : 'расход' }}: {{ $sum }} рублей</h4>
    @else
        <h3>Нет доходов</h3>
    @endif
    </div>

</div>
@endsection

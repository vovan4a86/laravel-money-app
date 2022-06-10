@extends('layouts.app')

@section('title', 'Money app')
@section('content')
<div>
    <h1>Главная</h1>

    <div class="d-flex my-4">
        <a href="/payments/create" class="btn btn-primary">Добавить</a>
    </div>

    @if($all)
         <div class="table">
            <ul class="list-group">
            @foreach($all as $one)
                <li class="d-flex list-group-item {{$one->is_income === 1 ? 'bg-success' : 'bg-danger'}}  bg-opacity-25">
                    <div class="flex-grow-1">
                        <span class="text-secondary">{{ $one->amount }}</span> - {{ $one->type_name }} /
                        <span class="text-primary fst-italic">{{ $one->comment }}</span>
                    </div>
                    <div class="d-flex">
                        <span class="fst-italic mx-2 align-self-center">{{$one->updated_at}}</span>
                        <div class="d-flex bg-light p-2 rounded-1">
                            <a href="/payments/{{ $one->id }}/edit" rel="nofollow" class="btn btn-sm btn-outline-dark">Изменить</a>
                            <a href="/payments/{{ $one->id }}/delete" rel="nofollow" class="btn btn-sm btn-close"></a>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
            <h3 class="mt-5">Общая сумма: {{ $sum }} рублей</h3>
         </div>
    @else
        <h3>No incomes</h3>
    @endif

</div>
@endsection

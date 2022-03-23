@extends('layouts.app')
@section('header')
@include('components.header')
@endsection
@section('content')
<main class="my-main">
    <div class="my-block">
        <form class="form-info" id="dataForm" method="POST" action="{{ $info->count() > 0 ? route('updateInfo') : route('AddInfo') }}">
        @csrf
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-info-input">
                <div class="input-block__date">
                    <p>Дата</p>
                    <input type="date" name="dateInfo" id="dateInfo" value="{{ $date }}"/>
                </div>
                @foreach($settings as $val)
                @if($val->salary != 0)
                <div class="input-block">
                    <label for="salary">Ставка за выход</label>
                    <input type="number" name="salary" id="salary" placeholder="Ставка за выход" value="{{ $info->count() > 0 ? $info[0]->salary : $val -> salary }}" pattern="\d*"/>
                </div>
                @endif
                @if($val->hourlyPayment != 0)
                <div class="input-block">
                <label for="countHours">Кол-во часов</label>
                    <input type="number" name="countHours" id="countHours" placeholder="Кол-во отработанных часов" value="{{ $info->count() > 0 ? $info[0]->countHours : 0}}"  pattern="\d*"/>
                </div>
                <div class="input-block">
                <label for="hourlySalary">Оплата за работу по часам</label>
                    <input type="number" name="hourlySalary" id="hourlySalary" placeholder="Опалата"  value="{{ $info->count() > 0 ? $info[0]->hourlySalary : 0}}" pattern="\d*"/>
                </div>
                @endif
                @if($val->percent != 0)
                <div class="input-block">
                    <label for="percent">Оплата за работу процентом от кассы</label>
                    <input type="number" name="percent" id="percent" placeholder="Зарплата" value="{{ $info->count() > 0 ? $info[0]->percent : 0}}"  pattern="\d*"/>
                </div>
                @endif
                <div class="input-block">
                    <label for="kassa">Касса</label>
                    <input type="number" name="kassa" id="kassa" placeholder="Касса" value="{{ $info->count() > 0 ? $info[0]->kassa : 0}}"  pattern="\d*"/>
                </div>
                @if($val->tips == 1)
                <div class="input-block">
                    <label for="tips">Чаевые</label>
                    <input type="number" name="tips" id="tips" placeholder="Чаевые" value="{{ $info->count() > 0 ? $info[0]->tips : 0}}"  pattern="\d*"/>
                </div>
                @endif
                @if($val->taxi == 1)
                <div class="input-block">
                    <label for="taxi">Расходы на такси</label>
                    <input type="number" name="taxi" id="taxi" placeholder="Такси" value="{{ $info->count() > 0 ? $info[0]->taxi : 0}}"  pattern="\d*"/>
                </div>
                @endif
                @if($val->rub == 1)
                <div class="input-block">
                    <label for="rub">Расходы на натирку</label>
                    <input type="number" name="rub" id="rub" placeholder="Натирка" value="{{ $info->count() > 0 ? $info[0]->rub : 0}}"  pattern="\d*"/>
                </div>
                @endif
                @if($val->other == 1)
                <div class="input-block">
                    <label for="other">Прочие расходы</label>
                    <input type="number" name="other" id="other" placeholder="Прочие расходы" value="{{ $info->count() > 0 ? $info[0]->other : 0}}"  pattern="\d*"/>
                </div>
                @endif
                @endforeach
                <div class="button_block" id="button_block">
                @if($info->count())
                    <input class="info-enter" type="submit" name="sub" value="Изменить данные" />
                    <input class="info-enter" type="button" id="delete" name="delete" value="Удалить данные" />
                @else
                    <input class="info-enter" type="submit" name="sub" value="Добавить данные" />
                @endif
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

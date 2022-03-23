@extends('layouts.app')
@include('components.header')
@section('content')
<main class="my-main">
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header">Мои настройки</h3>
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form-info" action="{{ route('settingsUpdate') }}" method="POST">
                @csrf
                <div class="form-info-input">
                    @foreach($settings as $val)
                    <div class="input-block">
                        <label class="text-field__label" for="firstName">Имя:</label>
                        <input type="text" name="firstName" id="firstName" value="{{ $val->firstName }}"> 
                    </div>
                    <div class="input-block">
                        <label class="text-field__label" for="lastName">Фамилия: </label>
                        <input type="text" name="lastName" id="lastName" value="{{ $val->lastName }}">  
                    </div>
                    <div class="input-block">
                        <label class="text-field__label" for="salary">Ставка за смену: </label>
                        <input type="number" name="salary" id="salary" value="{{ $val->salary }}">
                    </div>
                    <div class="input-block">
                        <label class="text-field__label" for="hourlyPayment">Ставка за час: </label>
                        <input type="number" name="hourlyPayment" id="hourlyPayment" value="{{ $val->hourlyPayment }}">
                    </div>
                    <div class="input-block">
                        <label class="text-field__label" for="percent">Процент от кассы: </label>
                        <input type="number" name="percent" id="percent" value="{{ $val->percent }}">
                    </div>
                    <div class="checkbox-block">
                        <div class="checkbox-block__item">
                            <label class="text-field__label" for="tips">Чаевые: </label>
                            <input type="checkbox" name="tips" id="tips" {{ $val->tips == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="checkbox-block__item">
                            <label class="text-field__label" for="taxi">Такси: </label>
                            <input type="checkbox" name="taxi" id="taxi" {{ $val->taxi == '1' ? 'checked' : '' }}> 
                        </div>
                        <div class="checkbox-block__item">
                            <label class="text-field__label" for="rub">Натирка: </label>
                            <input type="checkbox" name="rub" id="rub" {{ $val->rub == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="checkbox-block__item">
                            <label class="text-field__label" for="other">Прочие расходы: </label>
                            <input type="checkbox" name="other" id="other" {{ $val->other == '1' ? 'checked' : '' }}> 
                        </div>
                    </div>
                    @endforeach
                        <div class="button_block" id="button_block">
                            <input class="info-enter" type="submit" value="Изменить">
                        </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
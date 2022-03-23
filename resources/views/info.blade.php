@extends('layouts.app')
@include('components.header')
@section('content')
<main class="my-main">
    <div class="my-block">
        <div class="my-block__content ">
            <h3 class="my-block__header">{{ $title }}</h3>
            @if($info->count())
            <div class="my-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Дата</th>
                        @if($settings[0]->salary != 0)
                        <th>Ставка</th>
                        @endif
                        @if($settings[0]->hourlyPayment != 0)
                        <th>Кол-во часов</th>
                        <th>Оплата</th>
                        @endif
                        @if($settings[0]->percent != 0)
                        <th>ЗП</th>
                        @endif
                        <th>Касса</th>
                        @if($settings[0]->tips != 0)
                        <th>Чаевые</th>
                        @endif
                        @if($settings[0]->taxi != 0)
                        <th>Такси</th>
                        @endif
                        @if($settings[0]->rub != 0)
                        <th>Натирка</th>
                        @endif
                        @if($settings[0]->other != 0)
                        <th>Прочие расходы</th>
                        @endif
                        <th>Чистая прибыль</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($info as $val)
                    <tr>
                        <td>{{ $val->dateInfo }}</td>
                        @if($settings[0]->salary != 0)
                        <td>{{ $val->salary }}</td>
                        @endif
                        @if($settings[0]->hourlyPayment != 0)
                        <td>{{ $val->countHours }}</td>
                        <td>{{ $val->hourlySalary }}</td>
                        @endif
                        @if($settings[0]->percent != 0)
                        <td>{{ $val->percent }}</td>
                        @endif
                        <td>{{ $val->kassa }}</td>
                        @if($settings[0]->tips != 0)
                        <td>{{ $val->tips }}</td>
                        @endif
                        @if($settings[0]->taxi != 0)
                        <td>{{ $val->taxi }}</td>
                        @endif
                        @if($settings[0]->rub != 0)
                        <td>{{ $val->rub }}</td>
                        @endif
                        @if($settings[0]->other != 0)
                        <td>{{ $val->other }}</td>
                        @endif
                        <td>{{ $val->salary + $val->hourlySalary + $val->percent + $val->tips - $val->taxi - $val->rub -$val->other }}</td>
                    </tr>  
                    @endforeach
                </tbody>
                <tfoot>
                    @foreach($avgday as $val)
                    <tr>
                        <td>Среднее в день</td>
                        @if($settings[0]->salary != 0)
                        <td>{{ $val->salary }}</td>
                        @endif
                        @if($settings[0]->hourlyPayment != 0)
                        <td>{{ $val->countHours }}</td>
                        <td>{{ $val->hourlySalary }}</td>
                        @endif
                        @if($settings[0]->percent != 0)
                        <td>{{ $val->percent }}</td>
                        @endif
                        <td>{{ $val->kassa }}</td>
                        @if($settings[0]->tips != 0)
                        <td>{{ $val->tips }}</td>
                        @endif
                        @if($settings[0]->taxi != 0)
                        <td>{{ $val->taxi }}</td>
                        @endif
                        @if($settings[0]->rub != 0)
                        <td>{{ $val->rub }}</td>
                        @endif
                        @if($settings[0]->other != 0)
                        <td>{{ $val->other }}</td>
                        @endif
                        <td>{{ $val->salary + $val->hourlySalary + $val->percent + $val->tips - $val->taxi - $val->rub -$val->other }}</td>
                    </tr>  
                    @endforeach
                    @foreach($resutlMonth as $val)
                    <tr>
                        <td>Итог за месяц</td>
                        @if($settings[0]->salary != 0)
                        <td>{{ $val->salary }}</td>
                        @endif
                        @if($settings[0]->hourlyPayment != 0)
                        <td>{{ $val->countHours }}</td>
                        <td>{{ $val->hourlySalary }}</td>
                        @endif
                        @if($settings[0]->percent != 0)
                        <td>{{ $val->percent }}</td>
                        @endif
                        <td>{{ $val->kassa }}</td>
                        @if($settings[0]->tips != 0)
                        <td>{{ $val->tips }}</td>
                        @endif
                        @if($settings[0]->taxi != 0)
                        <td>{{ $val->taxi }}</td>
                        @endif
                        @if($settings[0]->rub != 0)
                        <td>{{ $val->rub }}</td>
                        @endif
                        @if($settings[0]->other != 0)
                        <td>{{ $val->other }}</td>
                        @endif
                        <td>{{ $val->salary + $val->hourlySalary + $val->percent + $val->tips - $val->taxi - $val->rub -$val->other }}</td>
                    </tr>  
                    @endforeach
                </tfoot>
            </table>
            </div>
            @else
            <div>
                Данных пока что нет
            </div>
            @endif
        </div>
    </div>
</main>
@endsection

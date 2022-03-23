$(document).ready (function() {
    //delete button
    $("body").on('click', '#delete', function(){
        date = $("#dateInfo").val();
        location="/delete/" + date;
    });

    //percent
    $("#percent").change(function (){
        $.get("/getPercent", function(data){
            data = JSON.parse(data);
            var percent = data;
            var Wage =  $("#percent").val();
            var kassa = Wage * 100/percent;
            $("#kassa").val(kassa);
        })
    });

    $("#kassa").change(function (){
        $.get("/getPercent", function(data){
            data = JSON.parse(data);
            var percent = data;
            var kassa =  $("#kassa").val();
            var Wage = kassa * percent/100;
            $("#percent").val(Wage);
        })
    });

    //hourly payment
    $("#countHours").change(function (){
        $.get("/getHourlyPayment", function(data){
            data = JSON.parse(data);
            var hourly_payment = data;
            var countHours =  $("#countHours").val();
            var salary = countHours * hourly_payment;
            $("#hourlySalary").val(salary);
        })
    });

    $("#hourlySalary").change(function (){
        $.get("/getHourlyPayment", function(data){
            data = JSON.parse(data);
            var hourly_payment = data;
            var salary =  $("#hourlySalary").val();
            var countHours = Math.round(salary/hourly_payment);
            $("#countHours").val(countHours);
        })
    });

    //date
    $("#dateInfo").change(function (){
        var work_date = $("#dateInfo").val();
        
        $.get("/dateGetInfo", {date: work_date}, function (data){
            data = JSON.parse(data);
            if( data.length != 0){
                var salary = data[0]['salary'];
                var countHours = data[0]['countHours'];
                var hourlySalary = data[0]['hourlySalary'];
                var percent = data[0]['percent'];
                var kassa = data[0]['kassa'];
                var tips = data[0]['tips'];
                var taxi = data[0]['taxi'];
                var rub = data[0]['rub'];
                var other = data[0]['other'];

                $("#salary").val(salary);
                $("#countHours").val(countHours);
                $("#hourlySalary").val(hourlySalary);
                $("#percent").val(percent);
                $("#kassa").val(kassa);
                $("#tips").val(tips);
                $("#taxi").val(taxi);
                $("#rub").val(rub);
                $("#other").val(other);
                
                $("#button_block").empty();
                $("#button_block").append("<input class='info-enter' type='submit' name='sub' value='Изменить данные' />");
                $("#button_block").append("<input class='info-enter' type='submit' id='delete' name='delete' value='Удалить данные' />");
                $("#dataForm").attr('action', '/UpdateInfo');
            }   
            else {
                $("#salary").val('');
                $("#countHours").val('');
                $("#hourlySalary").val('');
                $("#percent").val('');
                $("#kassa").val('');
                $("#tips").val('');
                $("#taxi").val('');
                $("#rub").val('');
                $("#other").val('');
                $("#button_block").empty();
                $("#button_block").append("<input class='info-enter' type='submit' name='sub' value='Добавить данные' />");
                $("#dataForm").attr('action', '/AddInfo');
            }
        });
    });
});
    
$(document).ready(function() {
    $.ajax({
        url: "ajax/graficos.ajax.php",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data) {
            var nombre = [];
            var stock = [];
            var color = ['#21B443', '#565DE0', '#D8DB9D', '#ED58BE', '#FA4932'];
            var bordercolor = ['#06641A', '#0F1674', '#767B18', '#67124C', '#951D0D'];
            console.log(data);

            for (var i in data) {
                nombre.push(data[i].Estado);
                stock.push(data[i].Total);
            }

            var chartdata = {
                labels: nombre,
                datasets: [{
                    label: nombre,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: stock
                }]
            };

            var mostrar = $("#pieChart");

            var grafico = new Chart(mostrar, {
                type: 'doughnut',
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {

                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
    $.ajax({
        data: {
            "Grafico": "Grafico1"
        },
        //Cambiar a type: POST si necesario
        type: "POST",
        // Formato de datos que se espera en la respuesta
        dataType: "json",
        // URL a la que se enviará la solicitud Ajax
        url: "ajax/graficos.ajax.php",
        success: function(data) {
            var nombre = [];
            var stock = [];
            var color = ['#21B443', '#565DE0', '#D8DB9D', '#ED58BE', '#FA4932'];
            var bordercolor = ['#06641A', '#0F1674', '#767B18', '#67124C', '#951D0D'];
            console.log(data);

            for (var i in data) {
                nombre.push(data[i].Estado);
                stock.push(data[i].Total);
            }

            var chartdata = {
                labels: nombre,
                datasets: [{
                    label: nombre,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: stock
                }]
            };

            var mostrar = $("#pieChart1");
            var grafico = new Chart(mostrar, {
                type: 'doughnut',
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {

                    }
                }
            });

        },
        error: function(data) {
            console.log(data);
        }
    });
});

$.ajax({
    data: {
        "Grafico": "Grafico2"
    },
    //Cambiar a type: POST si necesario
    type: "POST",
    // Formato de datos que se espera en la respuesta
    dataType: "json",
    // URL a la que se enviará la solicitud Ajax
    url: "ajax/graficos.ajax.php",
    success: function(data2) {
        var nombre = [];
        var stock = [];
        var color = ['#21B443', '#565DE0', '#D8DB9D', '#ED58BE', '#FA4932'];
        var bordercolor = ['#06641A', '#0F1674', '#767B18', '#67124C', '#951D0D'];
        console.log(data2);

        for (var i in data2) {
            nombre.push(data2[i].Modelo);
            stock.push(data2[i].Total);
        }

        var chartdata2 = {
            labels: nombre,
            datasets: [{
                label: nombre,
                backgroundColor: color,
                borderColor: color,
                borderWidth: 2,
                hoverBackgroundColor: color,
                hoverBorderColor: bordercolor,
                data: stock
            }]
        };

        var mostrar = $("#pieChart2");
        var grafico = new Chart(mostrar, {
            type: 'doughnut',
            data: chartdata2,
            options: {
                responsive: true,
                scales: {

                }
            }
        });
    },
    error: function(data2) {
        console.log(data2);
    }
});
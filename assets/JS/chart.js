

    const labels = moneyArray.map(item => item.number);
    const data = moneyArray.map(item => item.money);
    const incdata = moneyArray.map(item => item.incomes);
    const expdata = moneyArray.map(item => item.expenses);

  renderTresdChart([...labels], incdata, expdata);
  renderYearsChart(labels,data)


function renderTresdChart(labels, incdata, expdata) {
    labels.pop();

    const data = {
        labels: labels, 
        datasets: [
            {
                label: 'Incomes', 
                data: incdata,
                backgroundColor: 'rgba(0, 128, 0, 0.9)', 
            },
            {
                label: 'Expenses', 
                data: expdata,
                backgroundColor: 'rgba(255, 0, 0, 0.9)', 
            }
        ]
    };

    const options = {
        responsive: true,
        plugins: {
            legend: {
                display: true
            },
        },
        scales: {
            x: {
                stacked: true, 
            },
            y: {
                stacked: true, 
                beginAtZero: true 
            }
        }
    };

    new Chart("tresdChart", { type: "bar", data, options }); 
}

function renderYearsChart(num, money){
    const lastValue = money[money.length - 1]; 
    const borderColor = lastValue >= 0 ? '0, 128, 0' : '255, 0, 0'; 

    const data = {
        labels: num,
        datasets: [{
            label: 'My First Dataset',
            data: money,
            fill: true,
            backgroundColor:'rgba(' + borderColor + ', 0.2)',
            borderColor: 'rgb(' + borderColor + ')',
            tension: 0.0
        }]
    }

    const options = {
        plugins: {
            legend: { display: false }
        }
    }

    new Chart("yearsChart", { type: "line", data, options})
    //new Chart("modelsChart", {type: "pie", data})
}
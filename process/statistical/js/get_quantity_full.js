'use strict';
let chartSelect = document.querySelector('#chart__select');

const callAjax = async function (days) {
  try {
    const url = '../../../process/statistical/get_quantity_full.php';
    const data = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ days }),
    });

    if (!data.ok) throw new Error(`${data.statusText} (${data.status})`);

    const res = await data.json();

    const arrX = Object.keys(res);
    const resultSold = Object.values(res).map((a) => a[0]);
    const resultRest = Object.values(res).map((a) => a[1]);
    getChart(arrX, resultSold, resultRest, days);
  } catch (err) {
    showToast({
      title: 'Có lỗi',
      message: `${err.message}`,
      type: 'error',
    });
    console.log(err);
  }
};

let days = 30;
if (days != 7 || days != 30 || days != 60) {
  days = 30;
}
callAjax(days);

chartSelect.addEventListener('change', function (e) {
  days = +e.target.value;
  if (days !== 7 && days !== 30 && days !== 60) {
    days = 30;
  }
  callAjax(days);
});

function getChart(arrX, resultSold, resultRest, days) {
  Highcharts.chart('container', {
    title: {
      text: `Thống kê hàng hóa trong ${days} ngày gần đây`,
    },

    yAxis: {
      title: {
        text: 'Số lượng',
      },
    },

    xAxis: {
      categories: arrX,
    },

    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle',
    },

    plotOptions: {
      series: {
        label: {
          connectorAllowed: false,
        },
      },
    },

    series: [
      {
        name: 'Lượt hàng bán',
        data: resultSold,
      },
      {
        name: 'Lượt hàng tồn',
        data: resultRest,
      },
    ],

    responsive: {
      rules: [
        {
          condition: {
            maxWidth: 500,
          },
          chartOptions: {
            legend: {
              layout: 'horizontal',
              align: 'center',
              verticalAlign: 'bottom',
            },
          },
        },
      ],
    },
  });
}

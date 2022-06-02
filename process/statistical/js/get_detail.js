'use strict';
const callAjaxDetail = async function (days) {
  try {
    const url = '../../../process/statistical/get_detail.php';
    const data = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ days }),
    });

    if (!data.ok) throw new Error(`${data.statusText} (${data.status})`);

    const res = await data.json();

    const arr = Object.values(res[0]);
    const arrDetails = [];
    Object.values(res[1]).forEach((each) => {
      each.data = Object.values(each.data);
      arrDetails.push(each);
    });
    // Create the chart
    getChartDetail(arr, arrDetails, days);
  } catch (err) {
    showToast({
      title: 'Có lỗi',
      message: `${err.message}`,
      type: 'error',
    });
    console.log(err);
  }
};

callAjaxDetail(7);

function getChartDetail(arr, arrDetails) {
  Highcharts.chart('container_detail', {
    chart: {
      type: 'column',
    },
    title: {
      text: `Thông tin về 10 mặt hàng bán chạy nhất 7 ngày gần đây`,
    },
    accessibility: {
      announceNewData: {
        enabled: true,
      },
    },
    xAxis: {
      type: 'category',
    },
    yAxis: {
      title: {
        text: 'Tổng hàng hóa',
      },
    },
    legend: {
      enabled: false,
    },
    plotOptions: {
      series: {
        borderWidth: 0,
        dataLabels: {
          enabled: true,
          format: '{point.y:f}',
        },
      },
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat:
        '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> mặt hàng<br />',
    },

    series: [
      {
        name: 'Bán được',
        colorByPoint: true,
        data: arr,
      },
    ],

    drilldown: {
      series: arrDetails,
    },
  });
}

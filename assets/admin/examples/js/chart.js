(function ($) {
  // main page signup chart loader  active
  if ($('#bar2').length)

    new Morris.Bar({
      element: 'bar2',
      data: signup_chart_data , // thsi chart_data is loaded from ajax_script controller through ajax call
      xkey: 'y',
      ykeys: ['a'],
      labels: ['New Users'],
      barColors: ['#039BE5'],
      barShape: 'soft',
      xLabelMargin: 10,
      resize: true
    });
  // end
// start property chart
  if ($('#bar').length)
    new Morris.Bar({
      element: 'bar',
      data: property_chart_data,
      xkey: 'y',
      ykeys: ['a'],
      labels: ['New Properties'],
      barColors: ['#039BE5'],
      barShape: 'soft',
      xLabelMargin: 10
    });
  // followings are inactive
  if ($('#stats').length)
    new Morris.Bar({
      element: 'stats',
      data: [
        { y: '2006', a: 100 },
        { y: '2007', a: 75 },
        { y: '2008', a: 50 },
        { y: '2009', a: 75 },
        { y: '2010', a: 50 },
        { y: '2011', a: 75 },
        { y: '2012', a: 100 },
        { y: '2013', a: 200 },
        { y: '2014', a: 300 },
        { y: '2015', a: 260 },
        { y: '2016', a: 40}
      ],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Sales'],
      barColors: ['#039BE5'],
      barShape: 'soft',
      xLabelMargin: 10,
      resize: true
    });

  if ($('#line1').length)
    new Morris.Line({
      element: 'line1',
      data: [
        { y: '2008', a: 150, b:50 },
        { y: '2009', a: 75, b:90 },
        { y: '2010', a: 200, b:120 },
        { y: '2011', a: 75, b:340 },
        { y: '2012', a: 130, b:60 }
      ],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['New', 'Resolved'],
      lineColors: ['#039BE5', '#FF5722'],
      resize: true
    });

  if ($('#line').length)
    new Morris.Line({
      element: 'line',
      data: [
        { y: '2008', a: 150, b:50 },
        { y: '2009', a: 75, b:90 },
        { y: '2010', a: 200, b:120 },
        { y: '2011', a: 75, b:340 },
        { y: '2012', a: 130, b:60 },
        { y: '2013', a: 75, b:340 },
        { y: '2014', a: 50, b:260 },
        { y: '2015', a: 130, b:160 },
        { y: '2016', a: 210, b:180 }
      ],
      xkey: 'y',
      ykeys: ['a','b'],
      labels: ['New', 'Resolved'],
      lineColors: ['#039BE5', '#FF5722']
    });

  if ($('#area').length)
    new Morris.Area({
      element: 'area',
      data: [
        { y: '2006', a: 100 },
        { y: '2007', a: 75 },
        { y: '2008', a: 50 },
        { y: '2009', a: 75 },
        { y: '2010', a: 50 },
        { y: '2011', a: 75 },
        { y: '2012', a: 100 }
      ],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Series A'],
      lineColors: ['#039BE5'],
      fillOpacity: 0.3
    });

  if ($('#donut').length)
    new Morris.Donut({
      element: 'donut',
      data: [
        { label: "Download Sales", value: 12 },
        { label: "In-Store Sales", value: 30 },
        { label: "Mail-Order Sales", value: 20 }
      ],
      colors: ['#039BE5', '#FF5722', '#4CAF50']
    });

}(jQuery));
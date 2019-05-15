
<!DOCTYPE html>
<html>
    <head>
      <title>忘れがちなキャンパー達の知恵袋</title>
        <meta charset="utf-8">
        <meta content="キャンプで頻繁に忘れ物をしてしまう方必見！！" name="description">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/common.css"/>
        <link rel="stylesheet" href="css/summary.css"/>
       <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:500" rel="stylesheet">
    </head>
    
    <body>
        <h1 class = "mainTitle"align="center">忘れがちなキャンパー達の</br>知恵袋</h1>
      	<script src="js/Chart/Chart.bundle.js"></script>
        <script src="js/Chart/utils.js"></script>
        <style>
          canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
          }
        </style>
        <div align="right">
				  <input type="button"class="square_btn"onclick="location.href='/entry'" value="トップページへ">
        </div>
        <h1 class="titleH1">カテゴリ別の集計結果</h1>
        <div  align="center" id="canvas-holder"  >
            <canvas id="chart-area"></canvas>
        </div>

        <h1 class="titleH1">忘れ物ランキングトップ10</h1>
        <table class="table table-striped table-bordered">
          <tr>
            <th>順位</th>
            <th>忘れ物</th>
            <th>ポイント</th>
            <th>確認</th>
          </tr>
          @php($rank=1)
          @foreach($dataLostitemRank as $row)
          
            <tr>
            <td>{{$rank}}</td>
            <td>{{ $row->itemname }}</td>
            <td>{{ $row->count }}</td>
            <td><input type="checkbox"> </td>
            </tr>
            @php($rank++)
          @endforeach
        </table>
        
        <h1 class="titleH1">忘れ物履歴</h1>
        <table class="table table-striped table-bordered">
          <tr>
            <th>日付</th>
            <th>忘れ物</th>
            <th>場所</th>
            <th>確認</th>
          </tr>
          @foreach($dataLostitems as $row)
            <tr>
            <td>{{ substr($row->insertdate, 0, 10)}}</td>
            <td>{{ $row->itemname }}</td>
            <td>{{ $row->location }}</td>
            <td><input type="checkbox"> </td>
            </tr>
          @endforeach
        </table>
        </div>

      <script>
          var js_arraya = {!! json_encode($dataLostitemSummary) !!};
      		// var randomScalingFactor = function() {
      		// 	return Math.round(Math.random() * 100);
      		// };
      
      		var config = {
      			type: 'doughnut',
      			data: {
      				datasets: [{
      					data: [
      						js_arraya[0].count,
      						js_arraya[1].count,
      						js_arraya[2].count,
      						js_arraya[3].count,
      						js_arraya[4].count,
      					],
      					backgroundColor: [
      						window.chartColors.red,
      						window.chartColors.orange,
      						window.chartColors.yellow,
      						window.chartColors.green,
      						window.chartColors.blue,
      					],
      					label: 'Dataset 1'
      				}],
      				labels: [
      						js_arraya[0].dispname,
      						js_arraya[1].dispname,
      						js_arraya[2].dispname,
      						js_arraya[3].dispname,
      					js_arraya[4].dispname
      				]
      			},
      			options: {
      				responsive: false,
      				legend: {
      					position: 'top',
      				},
      				title: {
      					display: false,
      					text: 'カ���ゴリ別の分布'
      				},
      				animation: {
      					animateScale: true,
      					animateRotate: true
      				}
      			}
      		};
      
      		window.onload = function() {
      			var ctx = document.getElementById('chart-area').getContext('2d');
      			window.myDoughnut = new Chart(ctx, config);
      			
      		};
      	</script>
    </body>
</html>
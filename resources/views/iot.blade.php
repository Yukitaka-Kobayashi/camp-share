
<!DOCTYPE html>
<html>
    <head>
      <title>IOTテストページ</title>
        <meta charset="utf-8">
        <meta content="ラズベリーパイのデータをAWSのRDSへ" name="description">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/common.css"/>
        <link rel="stylesheet" href="css/summary.css"/>
       <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:500" rel="stylesheet">
    </head>
    
    <body>
        <h1 class = "mainTitle"align="center">IOTテストページ</h1>
        <h1 class="titleH1">直近の収集データ</h1>
        <table class="table table-striped table-bordered">
          <tr>
            <th>日時</th>
            <th>データ1</th>
            <th>データ2</th>
            <th>データ3</th>
          </tr>
          @foreach($iotDataItems as $row)
          
            <tr>
            <td>{{ $row->insertdate }}</td>
            <td>{{ $row->value1 }}</td>
            <td>{{ $row->value2 }}</td>
            <td>{{ $row->valuestr }}</td>
            </tr>
          @endforeach
        </table>

    </body>
</html>
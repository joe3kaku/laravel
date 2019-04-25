<!DOCTYPE html">
<html lang="ja">
<head>
  <title>スタッフ一覧画面</title>
</head>
<body>
<h1>スタッフ一覧</h1>
<table>
<tr>
  <th>division_no</th>
  <th>staff_id</th>
  <th>staff_name</th>
  <th>officer_flag</th>
</tr>
@foreach($mstaffs as $mstaff)
<tr>
  <td>{{$mstaff->division_no}}</td>
  <td>{{$mstaff->staff_id}}</td>
  <td>{{$mstaff->staff_name}}</td>
  <td>{{$mstaff->officer_flag}}</td>
</tr>
@endforeach
</table>
</body>

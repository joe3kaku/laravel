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
@foreach($staffs as $staff)
<tr>
  <td>{{$staff->division_no}}</td>
  <td>{{$staff->staff_id}}</td>
  <td>{{$staff->staff_name}}</td>
  <td>{{$staff->officer_flag}}</td>
</tr>
@endforeach
</table>
</body>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    <h1>Payment form CMI</h1>
    <form method="post" action="{{route('process')}}">
      @csrf
      <label for="cmd">Num command</label>
      <input type="text" name="cmd" value="138cmd"><br>
    <label for="amount">Amount</label>
        <input type="text" name="amount" class="input-control" placeholder="put amount here 10.65" value="10.60"> DHS<br/>
        <button type="submit">Buy</button>
    </form>
</body>
</html>
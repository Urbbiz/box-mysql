<form action="{{route('box.update', $box)}}" method="post">
yra tiek {{$box->bananas}} bananu
<input type="text" name="bananas_in_box" value="{{$box->bananas}}">

<button type="submit">Edit Box</button>

@csrf
</form>
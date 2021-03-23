<form action="{{route('box.store')}}" method="post">

<input type="text" name="bananas_in_box">

<button type="submit">Create Box</button>

@csrf
</form>
@include('admin.head')
</head>
<form method="post" action="/fail_save/{{$id}}"
	class="form-group container mt-5">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<div class="container">
        <li>
            <label for="amount">Note</label><br>
            <input class="form-control" type="number">
        </li>
        <li>
            <label for="title">Note</label><br>
            <textarea class="form-control" name="note"></textarea>
        </li>
        <button type="submit" class="form-control btn btn-success">Save</button>
	</div>
</form>

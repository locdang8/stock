@include('admin.head')
</head>
<form method="post" action="/invoice/store" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 		<p>
        	<label for="title">Name</label><br>
        	<input type="text" class="form-control" name="name" value="">
    	</p>
 		<p>
        	<label for="title">Partner</label><br>
			<select class="form-control" name="partner_id" aria-label="Default select example">
				<option selected>Open this select menu</option>
				@foreach($partners as $row)
					<option value="{{$row->name}}">{{$row->id}}</option>
				@endforeach
</select>	
    	</p>
 		<p>
        	<label for="title">Create Date</label><br>
        	<input type="datetime-local" class="form-control" name="create_date" value="">
    	</p>
 		<p>
        	<label for="title">Date Payment</label><br>
        	<input type="datetime-local" class="form-control" name="date_payment" value="">
    	</p>
 	</div>
 	<div class="col-6">
 		<p>
        	<label for="title">Payment Term</label><br>
        	<input type="text" class="form-control" name="payment_term" value="">
    	</p>
 		<p>
        	<label for="title">Total Payment</label><br>
        	<input type="number" class="form-control" name="total_payment" value="">
    	</p>
    	<p>
        	<button type="submit" class="form-control btn btn-success">Submit</button>
    	</p>
 	</div>
 </div>
</form>
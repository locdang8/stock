@include('admin.head')
<form method="post" action="/ipepstore" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 		<p>
        	<label for="title">Delivery Date</label><br>
        	<input type="datetime-local" class="form-control" name="delivery_date" value="">
    	</p>
 		<p>
        	<label for="title">Received Date</label><br>
        	<input type="datetime-local" class="form-control" name="received_date" value="">
    	</p>
    	<p>
        	<label for="title">Delivery Address</label><br>
        	<input type="text" class="form-control" name="delivery_address" value="">
    	</p>
    	<p>
        	<label for="title">Order</label><br>
        	<input type="text" class="form-control" name="order_id" value="{{$id}}">
    	</p>
 	</div>
 	<div class="col-6">
    	<p>
        	<button type="submit" class="form-control btn btn-success">Submit</button>
    	</p>
 	</div>
 </div>
</form>

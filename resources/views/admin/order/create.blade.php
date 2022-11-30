@include('admin.head')
<form method="post" action="/order/store"
	class="form-group container mt-5">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<div class="row">
		<div class="col-6">
			<p>
				<label for="title">Partner</label><br> <select class="form-control"
					name="partner_id" aria-label="Default select example">
					@foreach($partners as $row)
					<option value="{{$row->id}}">{{$row->name}}</option> @endforeach
				</select>
			</p>
			<p>
				<label for="title">Received Date</label><br> <input
					type="datetime-local" class="form-control" name="received_date"
					value="">
			</p>
		</div>
		<div class="col-6">
			<p>
				<label for="title">Employee</label><br> <select class="form-control"
					name="employee_id" aria-label="Default select example">
					@foreach($employees as $row)
					<option value="{{$row->id}}">{{$row->name}}</option> @endforeach
				</select>
			</p>
			<p>
				<label for="title">Payment term</label><br> <input type="text"
					class="form-control" name="payment_term" value="">
			</p>
            <!-- type : nhập hàng hay xuất hàng			 -->
				<label for="title">Type</label><br>
				<select class="form-control"
					name="type" aria-label="Default select example">
					<option value="import">Import</option>
					<option value="export">Export</option>
				</select>
            </p>
			<p>
				<button type="submit" class="form-control btn btn-success">Submit</button>
			</p>
		</div>
	</div>
</form>

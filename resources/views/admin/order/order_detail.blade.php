<!DOCTYPE html>
<html lang="en">
<head>@include('admin.head')
</head>
@include('admin.main')
<a href="order_create">
	<button class="btn btn-success">Create</button>
</a>
<div class="container">
	<div class="container rounded border p-4">
		<div class="container row">
			<div class="col-2">
				<a href="/order_edit/{{$orders->oid}}"><button class="btn btn-info"
						style="width: 70px">Edit</button></a>
                <a href="/order_delete/{{$orders->oid}}">
                    <button class="btn btn-danger" style="width: 70px">Delete</button></a>
                <a href="/order_done/{{$orders->oid}}">
                    <button class="btn btn-success mt-1" style="width: 70px">Import</button>
                </a>
				<button class="btn btn-success mt-1" style="width: 70px">Sent</button>
				<a href="/create_invoice_from_order/{{$orders->oid}}"><button
						class="btn btn-success mt-1" style="width: 145px">Create Invoice</button></a>
			</div>
			<div class="col-4">
				<ul>
					<li>{{__('lang.name')}}: {{ $orders->odname }}</li>
					<li>{{__('lang.partner')}}: {{ $orders->ptname }}</li>
					<li>{{__('lang.createdate')}}: {{ $orders->create_date }}</li>
				</ul>
			</div>
			<div class="col-4">
				<ul>
					<li>{{__('lang.rdate')}}: {{ $orders->received_date }}</li>
					<li>{{__('lang.employee')}}: {{ $orders->epname }}</li>
					<li>Type: {{ $orders->type }}</li>
				</ul>
			</div>
			<div class="col-2 align-self-center">
				<div
					class="d-flex justify-content-center py-3 state">{{$orders->state}}</div>
			</div>
		</div>
		<div class="container">
			<b>{{__('lang.payment_term')}}:</b> {{ $orders->payment_term }}
		</div>
	</div>
	<div class="container mt-2">
		<a href="/orderline_create/{{$orders->oid}}">
			<button class="btn btn-info">Add</button>
		</a>
		<table class="table table-bordered mt-2">
			<thead>
				<tr class="bg-success">
					<th>Create Date</th>
					<th>Product</th>
					<th>Volume</th>
					<th>Amount</th>
					<th>Note</th>
					<th style="width: 170px">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($lines as $row)
				<tr>
					<td>{{$row->create_date}}</td>
					<td>{{$row->pname}}</td>
					<td>{{$row->volume}} <sup>m<sup>3</sup></sup></td>
					<td>{{$row->amount}}</th>
					<td>{{$row->note}}</td>
					<td><a href="/orderline_edit/{{$row->olid}}"><button  class="btn">Edit</button></a>
						<a href="/orderline_delete/{{$row->olid}}"><button class="btn">Remove</button></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</section>
	<!-- /.content -->
</div>
</div>
@include('admin.footer')
</body>
</html>

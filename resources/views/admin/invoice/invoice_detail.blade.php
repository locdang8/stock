<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')

<div class="container">
	<div class="container row bg-success p-3 mb-3 rounded">
		<form class="col-2 align-self-center">
			<button class="btn btn-info" style="width: 70px">Edit</button>
			<button class="btn btn-danger">Unlink</button>
			<button class="btn btn-primary mt-1" style="width: 70px">Done</button>
		</form>
		<div class="col-4">
			<ul>
                <li>Name: {{ $invoices->name }}</li>
                <li>Partner: {{ $invoices->partner_id }}</li>
                <li>Create date: {{ $invoices->create_date }}</li>
                <li>Date Payment: {{ $invoices->date_payment }}</li>
			</ul>
		</div>
		<div class="col-4">
			<ul>
                <li>Payment Term: {{ $invoices->payment_term }}</li>
                <li>Total Payment: {{ $invoices->total_payment }}</li>
                <li>Order: {{ $invoices->order_id }}</li>
			</ul>
		</div>
		<div class="col-2 d-flex">
			<div class="bg-light align-self-center rounded-circle p-3"><p class="h3">{{ $invoices->state }}</p></div>
		</div>
	</div>
	<div class="container">
	<table class="table table-bordered">
        <thead>
         <tr class="bg-success">
            <th>Product</th>
            <th>Total Money</th>
            <th>Amount</th>
            <th>Unit Price</th>
            <th>Note</th>
          </tr>
        </thead>
        <tbody>
        @foreach($lines as $row)
          <tr>
            <td>{{ $row->product_id}}</td>
            <td>{{ $row->total_money}}</td>
            <td>{{ $row->amount}}</td>
            <td>{{ $row->unit_price}}</td>
            <td>{{ $row->note}}</td>
          </tr>
         @endforeach
        </tbody>
      </table>
	</div>
	<div class="container-fluid">
	</div>
</div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</div>
@include('admin.footer')
</body>
</html>

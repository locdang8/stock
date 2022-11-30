<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')

<div class="container mt-3">
	<div class="container row rounded border p-4">
		<div class="col-2">
			<a href="/ipep_delete/{{$ipeps->id}}"><button class="btn btn-danger">Delete</button></a></br>
			<button class="btn btn-success mt-1" style="width: 70px">Sent</button>
			<a href="/ipep_done/{{$ipeps->id}}"><button class="btn btn-danger">Done</button></a></br>
		</div>
		<div class="col-4">
			<ul>
                <li>Name: {{ $ipeps->name }}</li>
                <li>Partner: {{ $ipeps->delivery_address }}</li>
                <li>Create date: {{ $ipeps->received_date }}</li>
                <li>Date Payment: {{ $ipeps->delivery_date }}</li>
			</ul>
		</div>
		<div class="col-4">
			<ul>
                <li>Payment Term: {{ $ipeps->partner_id }}</li>
                <li><a href="/order/{{$ipeps->order_id}}">Order: {{ $ipeps->order_id}}</a></li>
			</ul>
		</div>
		<div class="col-2 align-self-center">
			<div class="bg-light rounded-circle d-flex justify-content-center py-3">{{$ipeps->status}}</div>
		</div>
	</div>
</div>

<table class="table table-bordered table-hover container mt-2">
	<thead>
		<tr class="bg-success">
			<th>{{__('lang.name')}}</th>
			<th>{{__('lang.state')}}</th>
			<th>{{__('lang.height')}}</th>
			<th>{{__('lang.width')}}</th>
			<th>{{__('lang.length')}}</th>
			<th>{{__('lang.weight')}}</th>
			<th>{{__('lang.color')}}</th>
			<th>Số lượng</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($array as $row)
		<tr>
			<td><a href="/product/{{$row->id}}">{{$row->name}}</a></td>
			<td>{{$row->state}}</td>
			<td>{{$row->height}} <sup>m</sup></td>
			<td>{{$row->width}} <sup>m</sup></td>
			<td>{{$row->length}} <sup>m</sup></td>
			<td>{{$row->weight}} <sup>kg</sup></td>
			<td><input type="color" disable value="{{$row->color}}"></td>
            <td>{{$row->amount}}</td>
			<td>
                <a href="/fail/{{$row->id}}"><button class="btn">Fail</button></a>
                <a href="/save/{{$row->id}}"><button class="btn">Store</button></a>
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

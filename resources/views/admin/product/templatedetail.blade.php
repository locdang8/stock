<!DOCTYPE html>
<html lang="en">
<head>@include('admin.head')
</head>
@include('admin.main')

<div class="container mt-5">
	<div class="container-fluid row">
		<div class="col-4">
			<a href="/template_edit/{{$template->id}}">
				<button class="btn btn-info" style="width: 70px">Edit</button></a>
			<a href="/template_delete/{{$template->id}}">
				<button class="btn btn-danger" style="width: 70px">Unlink</button>
            </a>
			<a href="/template_save/{{$template->id}}">
				<button class="btn btn-danger" style="width: 70px">Store</button>
            </a>
<!--            <a href="/templatereload/{{$template->id}}"/>
                <button class="btn brn-info">Reload</button></a>-->
		</div>
		<div class="col-4">
			<ul>
				<li>Name: {{ $template->name }}</li>
				<li>Category: {{$category->name}}</li>
				<li>State: {{$template->state}}</li>
			</ul>
		</div>
		<div class="col-4">
			<ul>
				<li>Date Manufacture: {{ $template->date_manufacture }}</li>
				<li>Expiry Date: {{ $template->expiry_date }}</li>
				<li>Amount: {{$template->amount}}</li>
			</ul>
		</div>
	</div>
	<label>Note</label>
    <div class="container py-5 border">
			{{$template->note}}
    </div>
	<div class="container-fluid mt-3">
		<a href="/product_create/{{$template->id}}">
			<button class="btn btn-success">ADD</button>
		</a>
		<table class="table table-bordered">
			<thead>
				<tr class="bg-success">
					<th>Height</th>
					<th>Width</th>
					<th>Length</th>
					<th>Weight</th>
					<th>Color</th>
					<th>Price</th>
					<th>Volume</th>
					<th>State</th>
					<th>Amount</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($product as $row)
				<tr>
					<td><a href="/product/{{$row->pid}}">{{ $row->height}} <sup>m</sup></a></td>
					<td>{{ $row->width }} <sup>m</sup></td>
					<td>{{ $row->length }} <sup>m</sup></td>
					<td>{{ $row->weight}} <sup>kg</sup></td>
					<td><input type="color" value="{{$row->color}}" class="color"></td>
					<td>{{ $row->price}}</td>
					<td>{{ $row->volume}} <sup>m<sup>3</sup></sup></td>
					<td>{{ $row->pstate}}</td>
					<td>{{ $row->amount}}</td>
					<td><a href="/product_delete/{{$row->pid}}">Remove</a>
						<a href="/product_edit/{{$row->pid}}">Edit</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
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

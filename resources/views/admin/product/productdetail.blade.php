<!DOCTYPE html>
<html lang="en">
<head>@include('admin.head')
</head>
@include('admin.main')
<a href="/product_create">
	<button class="btn btn-success">Create</button>
</a>
<a href="/product_edit/{{$products->pid}}">
    <button class="btn btn-success">Edit </button></a>

<div class="container">
	<div class="container-fluid row">
		<div class="col-4">
			<ul>
				<li>{{__('lang.name')}}: {{ $products->tname }}</li>
				<li>{{__('lang.name')}}: {{ $products->pname }}</li>
				<li>{{__('lang.price')}}: {{ $products->price }} <sup>đ</sup></li>
				<li>{{__('lang.date_import')}}: {{$products->import_date}}</li>
				<li>{{__('lang.date_export')}}: {{$products->export_date}}</li>
			</ul>
		</div>
		<div class="col-4">
			<ul>
				<li>{{__('lang.height')}}: {{ $products->height }} <sup>m</sup></li>
				<li>{{__('lang.width')}}: {{ $products->width }} <sup>m</sup></li>
				<li>{{__('lang.length')}}: {{ $products->length }} <sup>m</sup></li>
				<li>{{__('lang.weight')}}: {{ $products->weight }} <sup>kg</sup></li>
				<li>{{__('lang.color')}}: {{ $products->color }}</li>
			</ul>
		</div>
		<div class="col-2 align-self-center">
			<div
				class="bg-light rounded-circle d-flex justify-content-center py-3">{{$products->pstate}}</div>
		</div>
	</div>
	<label>Note</label>
	<div class="container border py-5">
        {{ $products->pnote}}
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

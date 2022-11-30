@include('admin.head')
</head>
<form method="post" action="{{route('warehouseinventory.store')}}" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 		
 		<p>
        	<label for="title">{{__('lang.employee')}}</label><br>
			<select class="form-control" name="employee_id" aria-label="Default select example">
				@foreach ($employees as $employee)
				<option value="{{$employee->id}}">{{$employee->name}}</option>
				@endforeach
			</select>
    	</p>
		<p>
        	<label for="title">{{__('lang.template')}}</label><br>
			<select class="form-control" id="template" name="template_id" aria-label="Default select example">
				@foreach ($templates as $template)
				<!-- <option selected>Open this select menu</option> -->
				<option value="{{$template->id}}">{{$template->name}}</option>
				@endforeach
			</select>
    	</p>
		<p>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">

		</script>
		<script>
			$('#template').on('change',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to("getamount") }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('#msg1').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
		</script>
			<label for="title" >{{__('lang.actual_number')}}</label><br>
        	<label for="title" id="msg1"></label><br>
			<!-- oninput regex để lấy mỗi giá trị là số, không phải số  thì không hiển thị ra input-->
        	<!-- <input type="text" id="msg" class="form-control" name="actual_number" value=""> -->
    	</p>
		<script>
			function calculate() {
				let x = document.getElementById('actual_number').value;
				let y  = document.getElementById('quantity').value;
				let result;
				if(y == "") {
					y = 0;
					result = 0;
				}
				else {
					result = x - y;
				}
				return document.getElementById('deviant').value = result;
			}

			function checkState() {
				let check = document.getElementById('deviant').value;
				/*
					<option value="balance">Ổn định</option>
					<option value="shortage">Thiếu</option>
					<option value="excess">Thừa</option>
					<option value="other">Khác</option>
				 */
				let state = document.getElementById('state_select');
				if(check == 0) {
					state.innerHTML = '<option value="balance">Ổn định</option>';
				}
				else if(check < 0) {
					state.innerHTML = '<option value="shortage">Thiếu</option>';
					
				}
				else {
					state.innerHTML = '<option value="excess">Thừa</option>';

				}
			}
		</script>
		<p>
		   <label for="title">{{__('lang.quantity_checked')}}</label><br>
		   <!-- oninput regex để lấy mỗi giá trị là số, không phải số  thì không hiển thị ra input-->
		   <input type="text" class="form-control" id="quantity" name="quantity_checked" value="" maxlength="10" onkeyup="calculate();checkState()">
	   </p>
 		<p>
        	<label for="title">{{__('lang.date')}}</label><br>
        	<input type="date" class="form-control" name="date" value="">
    	</p>
	</div>
	<div class="col-6">
		<p>
		   <label for="title">{{__('lang.deviant')}}</label><br>
		   <input type="text" id="deviant" class="form-control" name="deviant" value="">
	   </p>
		 <p>
			 <label for="title">{{__('lang.state')}}</label><br>
			 <select class="form-control" id="state_select" name="state" aria-label="Default select example">
				 
			 </select>
		 </p>
 		<p>
        	<label for="title">{{__('lang.note')}}</label><br>
			<textarea class="form-control" name="note" rows="4"></textarea>
    	</p>
    	<p>
        	<button type="submit" class="form-control btn btn-success">{{__('lang.submit')}}</button>
    	</p>
 	</div>
 </div>
</form>

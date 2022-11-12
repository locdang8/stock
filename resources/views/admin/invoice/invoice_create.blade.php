<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')

<div class="container">
<form method="post" action="/admin/news/store" class="container-fluid row mb-2">
    @method('PATCH')
    @csrf
    <div class="col-6">
        <p>
            <label for="title">Name</label><br>
            <input type="text" class="form-control" name="name" value="">
        </p>
    
        <p>
            <label for="create_date">Create Date</label><br>
            <input type="datetime-local" class="form-control" name="create_date" value="">
        </p>
        <p>
            <label for="date_payment">Date Payment</label><br>
            <input type="datetime-local" class="form-control" name="date_payment" value="">
        </p>
        <p>
            <label for="payment_term">Payment Term</label><br>
            <input type="number" class="form-control" name="payment_term" value="">
        </p>
    </div>

	<div class="col-6">
        <p>
            <label for="total_payment">Total Payment</label><br>
            <input type="number" class="form-control" name="total_payment" value="">
        </p>
        <p>
            <label for="debt">Debt</label><br>
            <input type="number" class="form-control" name="debt" value="">
        </p>
            <p>
            <label for="state">State</label><br>
            <input class="form-control" name="state" value="">
        </p>
         <p>
        	<button type="submit" class="btn btn-success">Submit</button>
    	</p>
	</div>

</form>

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

<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')
        <!-- Small boxes (Stat box) -->
<a href="/warehouseinventory_create">
  <button class="btn btn-success">{{__('lang.create')}}</button>
</a>
<table class="table table-bordered">
    <thead>
     <tr class="bg-success">
        <th>{{__('lang.product')}}</th>
        <th>{{__('lang.employee')}}</th>
        <th>{{__('lang.actual_number')}}</th>
        <th>{{__('lang.quantity_checked')}}</th>
        <th>{{__('lang.date')}}</th>
        <th>{{__('lang.deviant')}}</th>
        <th>{{__('lang.state')}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach($wis as $row)
      <tr>
        <td>{{ $row->tpname}}</td>
        <td>{{ $row->epname }}</td>
        <td>{{ $row->actual_number }}</td>
        <td>{{$row->quantity_checked }}</td>
        <td>{{ $row->date }}</td>
        <td>{{ $row->deviant }}</td>
        <td>{{ $row->state }}</td>
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

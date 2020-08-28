<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</head>
	<body>
	<li>
		<a href="{{ route('home') }}"><b>Back</b></a>
	</li>
	<div class="card-body">	
		<div class>
			<input type="text" id="search" name="search" placeholder="search here">
		</div>
		<table class="table table-hover table-striped" style="width: 70%; margin-top: 50px;" border="1" align="center" >
			<tr>
				<th>#</th>
				<br>
				<th>Title</th>			
				<th>Buying_price</th>
				<th>Selling_price</th>
				<th>Category</th>
				<th>Sub Category</th>
				<th>Picture</th>		
				<th>Action</th>
			</tr>

			@foreach($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td>{{ $product->buying_price }}</td>
					<td>{{ $product->selling_price }}</td>
					<td>
						@foreach($categories as $category)
							@if( $category->id == $product->category_id)
								{{ $category->name }}
							@endif   
						@endforeach
					</td>
					<td>
						@foreach($sub_categories as $sub_category)
							@if( $sub_category->id == $product->sub_category_id)
								{{ $sub_category->name }}
							@endif   
						@endforeach
					</td>
					<td>
						<img src="{{ $product->picture }}" style="height: 60px;width: 60px;">
					</td>
					<td>
						<ul class="d-flex justify-content-center">
							<li class="mr-3"><a href="{{ route('products.edit',[ $product->id ])}}" class="btn btn-primary">Edit</a></li>

							<li><a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();" >Delete</a></li>

						<form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy',$product->id) }}" method="POST" style="display: none;">
							@csrf @method('delete')
						</form>

						</ul>
					</td>
				</tr>
			@endforeach 
		</table>
	</div>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		function fetch_product(query = ''){
			url:{{ route('product_search') }},
			method: 'GET',
			data:{{query:query}},
			dataType:'json',
			function(data){
				$('tbody').html(data.table_data);
				$('total_products').text(data.total_products);
			}
		}
	});
</script>
		


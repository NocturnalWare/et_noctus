@extends('layouts.master')

@section('content')
	<div id="createProduct">
		<div class="col-xs-12 col-md-6 col-md-offset-1 well">
			<h2 class="col-sm-3 col-xs-12">Add a new Product</h2>
			<div class="col-xs-12 col-sm-7">
				<div class="col-xs-12 row">
					<input type="text" class="form-control" v-model="product.name" placeholder="Product Name">
				</div>
				<div class="col-xs-12 row">
					<textarea class="form-control" style="height:150px;" v-model="product.description" placeholder="Description"></textarea>
				</div>
				<div class="col-xs-12 row">
					<select v-model="product.category" class="form-control">
						<option value="Tees" selected>Category</option> 
						<option v-for="category in categories" value="@{{category}}" v-text="category"></option>
					</select>
				</div>
				<div class="col-xs-12 row">
					<input type="text" class="form-control" v-model="product.price" placeholder="Display Price (19.99 - 24.99)">
				</div>
				<div class="col-xs-6">
					<i @click="setActive" class="fa btn" :class="['', product.active === true ? 'fa-check-square-o' : 'fa-square-o']"></i> Active
				</div>
				<div class="col-xs-6">
					<i class="fa btn" @click="setOnesize" :class="['', product.onesize === true ? 'fa-check-square-o' : 'fa-square-o']"></i> One Size Only
				</div>
			</div>

			<hr>

			<h3 class="col-xs-12">Inventory & Prices</h3>
			<table class="table table-striped table-hover" style="color:#000;background-color:#fff">
				<thead>
					<tr>
						<th>Size</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody v-if="product.onesize === true">
					<tr>
						<td>
							One Size
						</td>
						<td>
							<input type="text" v-model="inventory.onesize">
						</td>
						<td>
							<span class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" v-model="price.onesize">
							</span>
						</td>
					</tr>
				</tbody>
				<tbody v-if="product.onesize === false">
					<tr>
						<td>
							X-small
						</td>
						<td>
							<input type="text" v-model="inventory.xsmall">
						</td>
						<td>
							<span class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" v-model="price.xsmall">
							</span>
						</td>
					</tr>
					<tr>
						<td>
							Small
						</td>
						<td>
							<input type="text" v-model="inventory.small">
						</td>
						<td>
							<span class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" v-model="price.small">
							</span>
						</td>
					</tr>
					<tr>
						<td>
							Medium
						</td>
						<td>
							<input type="text" v-model="inventory.medium">
						</td>
						<td>
							<span class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" v-model="price.medium">
							</span>
						</td>
					</tr>
					<tr>
						<td>
							Large
						</td>
						<td>
							<input type="text" v-model="inventory.large">
						</td>
						<td>
							<span class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" v-model="price.large">
							</span>
						</td>
					</tr>
					<tr>
						<td>
							X-Large
						</td>
						<td>
							<input type="text" v-model="inventory.xlarge">
						</td>
						<td>
							<span class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" v-model="price.xlarge">
							</span>
						</td>
					</tr>
					<tr>
						<td>
							XX-Large
						</td>
						<td>
							<input type="text" v-model="inventory.xxlarge">
						</td>
						<td>
							<span class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" v-model="price.xxlarge">
							</span>
						</td>
					</tr>
					<tr>
						<td>
							XXX-Large
						</td>
						<td>
							<input type="text" v-model="inventory.xxxlarge">
						</td>
						<td>
							<span class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" v-model="price.xxxlarge">
							</span>
						</td>
					</tr>

				</tbody>
			</table>
			<span @click="addProduct" class="btn btn-primary col-sm-12">ADD <i class="fa fa-plus"></i></span>
		</div>
	</div>

@stop

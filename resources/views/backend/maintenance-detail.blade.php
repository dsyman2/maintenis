<!-- First you need to extend the CB layout -->

@extends('crudbooster::admin_template')

@section('content')
<!-- Your custom  HTML goes here -->


	<style type="text/css">
		.table-scroll {
			position:relative;
			/*max-width:600px;*/
			margin:auto;
			overflow:hidden;
			border:1px solid #000;
		}
		.table-wrap {
			width:100%;
			overflow:auto;
		}
		.table-scroll table {
			width:100%;
			margin:auto;
			border-collapse:separate;
			border-spacing:0;
		}
		.table-scroll th, .table-scroll td {
			padding:5px 10px;
			border:1px solid #000;
			background:#fff;
			white-space:nowrap;
			vertical-align:top;
		}
		.table-scroll thead, .table-scroll tfoot {
			background:#f9f9f9;
		}
		.clone {
			position:absolute;
			top:0;
			left:0;
			pointer-events:none;
		}
		.clone th, .clone td {
			visibility:hidden
		}
		.clone td, .clone th {
			border-color:transparent
		}
		.clone tbody th {
			visibility:visible;
			color:red;
		}
		.clone .fixed-side {
			border:1px solid #000;
			background:#eee;
			visibility:visible;
		}
		.clone thead, .clone tfoot{background:transparent;}
	</style>



	<?php 

		function getMonthsInRange($startDate, $endDate) {
			$months = array();
			while (strtotime($startDate) <= strtotime($endDate)) {
			    $months[] = array('year' => date('Y', strtotime($startDate)), 'month' => date('m', strtotime($startDate)), );
			    $startDate = date('d M Y', strtotime($startDate.
			        '+ 1 month'));
			}

			return $months;
		}

		// MONTH
		$months = getMonthsInRange('2017-01-01', '2017-12-01'); 

	?>

	<div id="table-scroll" class="table-scroll">
	  <div class="table-wrap">
	    <table class="main-table">
	      <thead>
	        <tr>
				<th class="fixed-side" scope="col">Type</th>
				<th class="fixed-side" scope="col">Nominal</th>
				<th class="fixed-side" scope="col">Date Start</th>
				<th class="fixed-side" scope="col">Date End</th>
				@foreach($months as $months_item)
				<th scope="col">
					<?php 
						echo date("M", strtotime($months_item['year']."-".$months_item['month']."-01"))
					?>
				</th>
				@endforeach
	        </tr>
	      </thead>
	      <tbody>
			<?php 
				$maintenance = DB::table('maintenance')->where('id_project',$id)->orderby('date_start','ASC')->get(); 
			?>
			@foreach($maintenance as $item)
			<tr>
				<th class="fixed-side">{{$item->type}}</th>
				<th class="fixed-side">{{$item->total_nominal}}</th>
				<th class="fixed-side">{{$item->date_start}}</th>
				<th class="fixed-side">{{$item->date_end}}</th>

				@foreach($months as $months_item)
					<?php
						$loop = getMonthsInRange($item->date_start, $item->date_end);
						$array = array('month'=>$months_item['month'],'year'=>$months_item['year']);
					?>

					@if(in_array($array, $loop))
						<td style="background-color: #FFC107"></td>
					@else
						<td></td>
					@endif
				@endforeach

			</tr>
			@endforeach
	      </tbody>
	    </table>
	  </div>
	</div>

	@push("bottom")
	<script type="text/javascript">
		jQuery(document).ready(function() {
		   jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');   
		 });
	</script>
	@endpush

@endsection
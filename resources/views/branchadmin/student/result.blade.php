<div class="row">
  <div class="col-12">
  	<section class="top-title-button white-bg remove-main-margin mb-3">
	    <div class="row mx-0 align-items-center">
	      <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0">
	      	@if (count($results) > 0)
	          <table id="students" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
	                <thead>
	                    <tr>
	                        <th>Test</th>
	                        <th>Reading</th>
	                        <th>Writing</th>
	                        <th>Listening</th>
	                        <th>Speaking</th>
	                    </tr>
	                    @foreach($results as $res)
	                    <tr>
	                    	<td>{{ $res['name'] }}</td>
	                    	<td>{{ isset($res['reading'])?$res['reading']:0 }}</td>
	                    	<td>{{ isset($res['writing'])?$res['writing']:0 }}</td>
	                    	<td>{{ isset($res['listening'])?$res['listening']:0 }}</td>
	                    	<td>{{ isset($res['speaking'])?$res['speaking']:0 }}</td>
	                    </tr>
	                    @endforeach
	                </thead>
	          </table>
          @else
          <p class="text-center mt-5">No tests completed by the student</p>
          @endif
	    </div>
	  </section> 
  </div>
</div>
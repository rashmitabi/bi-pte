@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
    <div class="heading-text-wrap">
        <h2>SELECT PACKAGE</h2>
    </div>
    <div class="container-fluid">
      <div class="row">
            @if(!empty($subscriptions))
                @foreach($subscriptions as $subscription)
                <div class="col col-12 col-md-6 col-xl-4 col-sm-12">
                    <div class="card">
                        <div class="card-header common-card-header1 ">
                            <h2>{{ $subscription->title }}</h2>
                        </div>
                        <form>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $subscription->students_allowed }}">
                                    </div>
                                    <label for="staticEmail" class="col-sm-8 col-form-label">monthly Price</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $subscription->monthly_price }}">
                                    </div>
                                    <label for="staticEmail" class="col-sm-8 col-form-label">Quarterly Price</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $subscription->quarterly_price }}">
                                    </div>
                                    <label for="staticEmail" class="col-sm-8 col-form-label">Halfyearly Price</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $subscription->halfyearly_price }}">
                                    </div>
                                    <label for="staticEmail" class="col-sm-8 col-form-label">White labelling Price</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $subscription->white_labelling_price }}">
                                    </div>
                                    <label for="staticEmail" class="col-sm-8 col-form-label">Mock tests</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $subscription->mock_tests }}">
                                    </div>
                                    <label for="staticEmail" class="col-sm-8 col-form-label">Practice tests</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $subscription->practice_tests }}">
                                    </div>
                                    <label for="staticEmail" class="col-sm-8 col-form-label">Practice Questions</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $subscription->practice_questions }}">
                                    </div>
                                    <label for="staticEmail" class="col-sm-8 col-form-label">Videos</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{($subscription->videos == 'Y')?'YES':'NO'}}">
                                    </div>
                                    <label for="staticEmail" class="col-sm-8 col-form-label">Prediction files</label>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ ($subscription->prediction_files == 'Y')?'YES':'NO' }}">
                                    </div>
                                </div>
                        </form>
                        <button type="button" class="btn  select-btn rzp-button1" style="background-color: #f5a623;">SELECT</button>
                    </div>
                </div>
                @endforeach
            @endif
           
           <!-- <div class="col col-12 col-md-6 col-xl-4 col-sm-12">
              <div class="card">
                   <div class="card-header common-card-header2">
                       <h2>PRO</h2>
                   </div>
                   <form>
                       <div class="form-group row">
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                            </div>
                            <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                            </div>
                            <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                            </div>
                        </div>
                   </form>
                   <button type="button" class="btn  select-btn" style="background-color: #f64d4d;">SELECT</button>
            </div>
          </div>
            <div class="col col-12 col-md-6 col-xl-4 col-sm-12">
              <div class="card">
                    <div class="card-header common-card-header3">
                       <h2>ADVANCED</h2>
                    </div>
                    <form>
                       <div class="form-group row">
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                           <div class="col-sm-4">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                           </div>
                           <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                            </div>
                            <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                            </div>
                            <label for="staticEmail" class="col-sm-8 col-form-label">No of Student</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="10">
                            </div>
                        </div>
                   </form>
                   <button type="button" class="btn  select-btn" style="background-color: #30dbb5;">SELECT</button>
                </div>
           </div> -->
       </div>
    </div>
</div>
@endsection
@section('js-hooks')
<script src="https://checkout.razorpay.com/v1/checkout.js" defer></script>
<script defer>
    $('body').on('click','.rzp-button1',function(e){
        e.preventDefault();
        var amount = 10;
        var total_amount = amount * 100;
        var options = {
            "key": "{{ env('RAZOR_KEY') }}", // Enter the Key ID generated from the Dashboard
            "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
            "currency": "INR",
            "name": "NiceSnippets",
            "description": "Test Transaction",
            "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
            "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function (response){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{ route('branchadmin-subscriptionpayment') }}",
                    data:{razorpay_payment_id:response.razorpay_payment_id,amount:amount},
                    success:function(data){
                        alert("payment success");
                    }
                });
            },
            "prefill": {
                "name": "Mehul Bagda",
                "email": "mehul.bagda@example.com",
                "contact": "818********6"
            },
            "notes": {
                "address": "test test"
            },
            "theme": {
                "color": "#F37254"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    });
</script>
@endsection



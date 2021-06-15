@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Vouchers</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <a href="{{ route('vouchers.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New
                    Voucher</button>
                </a>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="vouchers" class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Voucher Name</th>
                            <th>Voucher Code</th>
                            <th>Voucher Type</th>
                            <th>Discount Price</th>
                            <th>Created Date</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($vouchers) > 0)
                            @foreach($vouchers as $voucher)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $voucher->name }}</td>
                                <td>{{ $voucher->code }}</td>
                                <td>{{ ($voucher->discount_type == 'P')?'Percentage':'Fixed'}}</td>
                                <td>{{ ($voucher->discount_type == 'P')?$voucher->discount_percentage:$voucher->discount_price}}</td>
                                <td>{{ $voucher->created_at->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($voucher->valid_till)->format('d/m/Y') }}</td>
                                <td>{{ ($voucher->status == 'E')?'Active':'not Active'}}</td>
                                <td>
                                    <ul class="actions-btns">
                                        <li class="action" data-toggle="modal" data-target="#editvouchers"><a
                                                href="javascript:void(0);" class="vouchers-edit" data-id="{{ $voucher->id }}" data-url="{!! URL::route('vouchers.edit', $voucher->id) !!}"><i class="fas fa-pen"></i></a></li>
                                        <li class="action"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="{!! URL::route('vouchers.destroy', $voucher->id) !!}" data-id="{{ $voucher->id }}"><i class="fas fa-trash"></i></a></li>
                                        <li class="action shield {{ ($voucher->status == 'E')?'red':'green'}}"><a href="{{ route('superadmin-vouchers-changestatus', $voucher->id ) }}"><img
                                                    src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editvouchers" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body" id="voucher-edit-body">
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js-hooks')
<script src="{{ asset('assets/js/vouchers.js') }}" defer></script>
@endsection
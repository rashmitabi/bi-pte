<form class="form" id="precticeForm" name="precticeForm">
            <div class="form-check form-check-inline common-heading">
              <input type="checkbox" class="form-check-input" id="selectAllTest">
              <label class="form-check-label" for="selectAllTest">Select All</label>
            </div>
            @if(count($tests) >= 10)
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">Tests</label>
            </div>            
            <div class="form-check form-check-inline">
              <label for="rdo-1" class="btn-radio">
                <input type="radio" id="rdo-1" class="test_select testradio10" name="test_select" value="10">
                <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                </svg>
                <span class="col-blue fw-500">Select 10</span>
              </label>
            </div>
            @endif
            @if(count($tests) >= 20)
            <div class="form-check form-check-inline">
              <label for="rdo-2" class="btn-radio">
                <input type="radio" id="rdo-2" class="test_select testradio20" name="test_select" value="20">
                <svg width="20px" height="20px" viewBox="0 0 20 20">
                  <circle cx="10" cy="10" r="9"></circle>
                  <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                  <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                </svg>
                <span class="col-blue fw-500">Select 20</span>
              </label>
            </div>
            @endif
            @if(count($tests) >= 30)
            <div class="form-check form-check-inline">
                <label for="rdo-3" class="btn-radio">
                      <input type="radio" id="rdo-3" class="test_select testradio30" name="test_select" value="30">
                           <svg width="20px" height="20px" viewBox="0 0 20 20">
                               <circle cx="10" cy="10" r="9"></circle>
                               <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                               <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                           </svg>
                           <span class="col-blue fw-500">Select 30</span>
                </label>
            </div>
            @endif
            @if(count($tests) >= 40)
            <div class="form-check form-check-inline">
                <label for="rdo-4" class="btn-radio">
                      <input type="radio" id="rdo-4" class="test_select testradio40" name="test_select" value="40">
                           <svg width="20px" height="20px" viewBox="0 0 20 20">
                               <circle cx="10" cy="10" r="9"></circle>
                               <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                               <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                           </svg>
                           <span class="col-blue fw-500">Select 40</span>
                </label>
            </div>
            @endif
            @if(count($tests) >= 50)
            <div class="form-check form-check-inline">
                <label for="rdo-5" class="btn-radio">
                      <input type="radio" id="rdo-5" class="test_select testradio50" name="test_select" value="50">
                           <svg width="20px" height="20px" viewBox="0 0 20 20">
                               <circle cx="10" cy="10" r="9"></circle>
                               <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                               <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                           </svg>
                           <span class="col-blue fw-500">Select 50</span>
               </label>
            </div>
            @endif
            <div class="common-wrap text-center">
              <b>{{ $user->role->role_name.' - '.$user->name }}</b>
            </div>
                <div class="test-series">
                    @if(count($tests) > 0)
                        @php
                          $temp = 0;
                          $totalTest = count($tests);
                        @endphp
                        @foreach($tests as $test)
                            @php 
                              $temp++;
                            @endphp
                            <div class="form-check  form-check-inline ">
                                <input type="checkbox" data-count="{{$totalTest}}" class="form-check-input multitest singletest{{ $temp }}" {{ (in_array($test->id, $alreadyAssign) == 1)?'checked':''}} name="test[]" id="Check{{ $test->id }}" value="{{ $test->id }}">
                                <label class="form-check-label" for="example1">{{ ucfirst($test->test_name) }}</label>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group row">
                        <div class="col-11 assign-btn">
                                <button type="button" class="btn btn-outline-primary store-assign-test" data-test-type="{{ $type }}" data-user-id="{{ $user_id }}" data-url="{{ route('branchadmin-user-post-assign-test') }}"><i class="far fa-save save-icon"></i>Assign Tests</button>
                                <span class="error-msg" id="checkError"></span>
                        </div>
                    </div>
                </div>
          </form>
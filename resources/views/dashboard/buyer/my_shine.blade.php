@extends('dashboard.layout.app')
@section('content')
@section('title')
My Shine
@endsection

<div class="ek_dashboard">
    <div class="ek_content">
      <div class="card ekcard pa shadow-sm">
        <div class="cardhead ">
          <h3 class="cardtitle">Shine</h3>
          <div style="display: flex; flex-direction: column; align-items: flex-end; margin-left: 10px;">
            <div>
              <label for="fname">
                <h6>Shine Credit :</h6>
              </label>
              <a href="#" class="btn btnekomn btn-sm">₹ 2000</a>
              <a href="popup-shine.html" style="margin-left: 10px;" class="btn btnekomn btn-sm text-black bold">Read me</a>
              <a href="{{route('new-shine')}}" class="btn btnekomn btn-sm text-black bold">Add New Shine</a>
            </div>
          </div>
        </div>
        <div>
          <ul class="nav nav-underline ekom_tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="shine-tab" data-bs-toggle="tab" data-bs-target="#shine" role="tab"
                aria-controls="shine" aria-selected="true">My Shine</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="live-shine-tab" data-bs-toggle="tab" data-bs-target="#live-shine" role="tab"
                aria-controls="live-shine" aria-selected="false">Assigned Shine</a>
            </li>
            {{-- <li class="nav-item" role="presentation">
              <a class="nav-link" id="assigned-tab" data-bs-toggle="tab" data-bs-target="#assigned" role="tab"
                aria-controls="assigned" aria-selected="false">Assigned Shine Live</a>
            </li> --}}
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="shine" role="tabpanel" aria-labelledby="shine-tab" tabindex="0">
              <div class="o_bannerimg">
                <img src="{{asset('assets/images/order-banner-1.jpg')}}" alt="" style="width: 100%;" />
              </div>
              <div class="tableTop pt-3">
                <input type="text" class="form-control w_300_f searchicon"
                  placeholder="Search with Product Name, Batch ID, Request No, Product ID/ASIN" id="searchInput">
                <div class="filter">
                  <div class="ek_group m-0">
                    <label class="eklabel w_50_f">Sort by:</label>
                    <div class="ek_f_input">
                      <select class="form-select" id="sort_by_status">
                        <option value="NA" selected>Select</option>
                        <option value="0">Draft</option>
                        <option value="1">Pending</option>
                        <option value="2">Inprogress</option>
                        <option value="3">Order Placed</option>
                        <option value="4">Order Confirm</option>
                        <option value="5">Review Submited</option>
                        <option value="6">Complete</option>
                        <option value="7">Cancelled</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive tres_border">
                <table class="normalTable tableSorting whitespace" id="productTable">
                  <thead>
                    <tr>
                      <th>Batch ID
                        <span class="sort_pos">
                          <small class="sort_t"><i class="fas fa-caret-up"></i><i class="fas fa-caret-down"></i></small>
                        </span>
                      </th>
                      <th>Request No
                        <span class="sort_pos">
                          <small class="sort_t"><i class="fas fa-caret-up"></i><i class="fas fa-caret-down"></i></small>
                        </span>
                      </th>
                      <th>Product Name/URL/Link</th>
                      {{-- <th>Platform</th> --}}
                      {{-- <th>Product URL/Link</th> --}}
                      <th>Product ID/ASIN</th>
                      {{-- <th>Seller/Brand Name</th> --}}
                      {{-- <th>Product Search Term </th> --}}
                      <th>Product amount</th>
                      {{-- <th>Feedback/Review Title</th> --}}
                      {{-- <th>Feedback/Review comment</th> --}}
                      {{-- <th>Review Rating</th> --}}
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody id="dataShine">
                      @if($shineProducts->isEmpty())
                          <tr>
                              <td colspan="9" style="text-align: center;">No Shine Data Found, Add New Shine First...</td>
                          </tr>
                      @else
                      @foreach($shineProducts->reverse() as $product)
                          <tr data-status="{{ $product->status }}">
                            <td>
                              <span id="batchId-{{ $product->id }}">{{ $product->batch_id }}</span>
                              <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('batchId-{{ $product->id }}', this)"></i>
                              <span class="copy-message" style="display: none; margin-left: 5px; color: #FECA40;">Copied</span>
                            </td>
                            <td>
                                <span id="requestNo-{{ $product->id }}">{{ $product->request_no }}</span>
                                <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('requestNo-{{ $product->id }}', this)"></i>
                                <span class="copy-message" style="display: none; margin-left: 5px; color: #FECA40;">Copied</span>
                            </td>
                            <td class="product-name" data-original-name="{{ $product->name }}">
                              <a href="{{ $product->url }}" target="_blank" id="name-{{ $product->id }}" class="product-link">
                                  {{ $product->name }}
                              </a>
                            </td>
                            {{-- <td>
                              <a target="_blank" href="{{ $product->url }}" id="url-{{ $product->id }}">Product Link</a>
                              <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('url-{{ $product->id }}', this)"></i>
                              <div class="copy-message" style="display: none; color: #FECA40;">Copied</div>
                            </td> --}}
                            <td>
                                <span id="productId-{{ $product->id }}">{{ $product->product_id }}</span>
                                {{-- <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('productId-{{ $product->id }}', this)"></i>
                                <span class="copy-message" style="display: none; margin-left: 5px; color: #FECA40;">Copied</span> --}}
                            </td>
                            

                              {{-- <td>{{ $product->seller_name }}</td> --}}
                              {{-- <td>{{ $product->search_term }}</td> --}}
                              <td>₹ {{ $product->amount }}</td>
                              {{-- <td>{{ $product->feedback_title }}</td> --}}
                              {{-- <td>{{ $product->feedback_comment }}</td> --}}
                              {{-- <td class="star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $product->review_rating)
                                        <i class="fas fa-star"></i> <!-- Filled star -->
                                    @else
                                        <i class="far fa-star"></i> <!-- Empty star -->
                                    @endif
                                @endfor
                              </td> --}}
                              <td>
                                @if($product->status == 0)
                                    <span style='padding: 3px 7px; border-radius: 3px; background-color: #6c757d; color: #fff;'>Draft</span>
                                @elseif($product->status == 1)
                                    <span style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Pending</span>
                                @elseif($product->status == 2)
                                    <span style='padding: 3px 7px; border-radius: 3px; background-color: #17a2b8; color: #fff;'>Inprogress</span>
                                @elseif($product->status == 3)
                                    <span style='padding: 3px 7px; border-radius: 3px; background-color: #007bff; color: #fff;'>Order Placed</span>
                                @elseif($product->status == 4)
                                    <span style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Order Confirm</span>
                                @elseif($product->status == 5)
                                    <span style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Review Submitted</span>
                                @elseif($product->status == 6)
                                    <span style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Complete</span>
                                @elseif($product->status == 7)
                                    <span style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Cancelled</span>
                                @endif
                              </td>
                              <td>
                                <a href="{{ route('shine-status', $product->id) }}" class="btn btnekomn btn-sm {{ $product->status == 3 || $product->status == 5 ? 'blink' : '' }}">View Details</a>
                              </td>
                          </tr>
                      @endforeach
                      @endif
                    </tbody>
                </table>
              </div>
              <div class="ek_pagination">
                <span class="row_select rowcount" id="rowInfo"></span>
                <div class="pager_box">
                  <button id="prevPage" class="pager_btn"><i class="fas fa-chevron-left"></i></button>
                  <ul class="pager_" id="pagination"></ul>
                  <button id="nextPage" class="pager_btn"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="row_select jumper">Go to
                  <select id="rowsPerPage">
                    <option value="10">10</option>
                    <option selected value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="live-shine" role="tabpanel" aria-labelledby="live-shine-tab" tabindex="0">
              <div class="tableTop">
                <input type="text" class="form-control w_300_f searchicon"
                  placeholder="Search with Product Name, Batch ID, Request No, Product ID/ASIN" id="searchInputassigned">
                <div class="filter">
                  <div class="ek_group m-0">
                    <label class="eklabel w_50_f">Sort by:</label>
                    <div class="ek_f_input">
                      <select class="form-select" id="sort_by_statusassigned">
                        <option value="NA" selected>Select</option>
                        <option value="0">Draft</option>
                        <option value="1">Pending</option>
                        <option value="2">Inprogress</option>
                        <option value="3">Order Placed</option>
                        <option value="4">Order Confirm</option>
                        <option value="5">Review Submited</option>
                        <option value="6">Complete</option>
                        <option value="7">Cancelled</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive tres_border">
                <table class="normalTable tableSorting whitespace" id="productTableassigned">
                  <thead>
                    <tr>
                      <th>Batch ID
                        <span class="sort_pos">
                          <small class="sort_t"><i class="fas fa-caret-up"></i><i class="fas fa-caret-down"></i></small>
                        </span>
                      </th>
                      <th>Request No
                        <span class="sort_pos">
                          <small class="sort_t"><i class="fas fa-caret-up"></i><i class="fas fa-caret-down"></i></small>
                        </span>
                      </th>
                      <th>Product Name/URL/Link</th>
                      <th>Platform</th>
                      {{-- <th>Product URL/Link</th> --}}
                      <th>Product ID/ASIN</th>
                      {{-- <th>Seller/Brand Name</th>
                      <th>Product Search Term </th> --}}
                      <th>Product amount</th>
                      {{-- <th>Feedback/Review Title</th>
                      <th>Feedback/Review comment</th>
                      <th>Review Rating</th> --}}
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="dataShineassigned">
                    @if($assignedProducts->isEmpty())
                        <tr>
                            <td colspan="9" style="text-align: center;">Not Assigned Shine Yet, Add New Shine First...</td>
                        </tr>
                    @else
                    @foreach($assignedProducts->reverse() as $product)
                    <tr data-status-assigned="{{ $product->status }}">
                      <td>
                        <span id="batchId-{{ $product->id }}">{{ $product->batch_id }}</span>
                        <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('batchId-{{ $product->id }}', this)"></i>
                        <div class="copy-message" style="display: none; color: #FECA40;">Copied</div>
                      </td>
                      <td>
                        <span id="requestNo-{{ $product->id }}">{{ $product->request_no }}</span>
                        <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('requestNo-{{ $product->id }}', this)"></i>
                        <div class="copy-message" style="display: none; color: #FECA40;">Copied</div>
                      </td>
                      <td class="product-name" data-original-name="{{ $product->name }}">
                        <a href="{{ $product->url }}" target="_blank" id="name-{{ $product->id }}" class="product-link">
                            {{ $product->name }}
                        </a>
                      </td>
                      <td>{{ $product->platform }}</td>
                      {{-- <td>
                        <a target="_blank" href="{{ $product->url }}" id="url-{{ $product->id }}">Product Link</a>
                        <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('url-{{ $product->id }}', this)"></i>
                        <div class="copy-message" style="display: none; color: #FECA40;">Copied</div>
                      </td> --}}
                      <td>
                        <span id="productId-{{ $product->id }}">{{ $product->product_id }}</span>
                        {{-- <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('productId-{{ $product->id }}', this)"></i>
                        <div class="copy-message" style="display: none; color: #FECA40;">Copied</div> --}}
                      </td>
                  
                      {{-- <td>{{ $product->seller_name }}</td> --}}
                      {{-- <td>{{ $product->search_term }}</td> --}}
                      <td>₹ {{ $product->amount }}</td>
                      {{-- <td>{{ $product->feedback_title }}</td> --}}
                      {{-- <td>{{ $product->feedback_comment }}</td> --}}
                      {{-- <td class="star-rating">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $product->review_rating)
                                <i class="fas fa-star"></i> 
                            @else
                                <i class="far fa-star"></i> 
                            @endif
                        @endfor
                      </td> --}}
                      <td>
                        @if($product->status == 0)
                            <span style='padding: 3px 7px; border-radius: 3px; background-color: #6c757d; color: #fff;'>Draft</span>
                        @elseif($product->status == 1)
                            <span style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Pending</span>
                        @elseif($product->status == 2)
                            <span style='padding: 3px 7px; border-radius: 3px; background-color: #17a2b8; color: #fff;'>Inprogress</span>
                        @elseif($product->status == 3)
                            <span style='padding: 3px 7px; border-radius: 3px; background-color: #007bff; color: #fff;'>Order Placed</span>
                        @elseif($product->status == 4)
                            <span style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Order Confirm</span>
                        @elseif($product->status == 5)
                            <span style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Review Submitted</span>
                        @elseif($product->status == 6)
                            <span style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Complete</span>
                        @elseif($product->status == 7)
                            <span style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Cancelled</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('complete-shine', $product->id) }}" class="btn btnekomn btn-sm">Complete Shine</a>
                        <div class="text-center mt-1 text-danger blink countdown" data-created-at="{{ $product->created_at }}" data-status="{{ $product->status }}"></div>
                        {{-- <a href="{{ route('complete-shine', $product->id) }}" class="btn btnekomn btn-sm {{ $product->status == 2 || $product->status == 4 ? 'blink' : '' }}">Complete Shine</a> --}}
                      </td>
                    </tr>
                    @endforeach
                    @endif                
                  </tbody>
                </table>
              </div>
              <div class="ek_pagination">
                <span class="row_select rowcount" id="rowInfoassigned"></span>
                <div class="pager_box">
                  <button id="prevPageassigned" class="pager_btn"><i class="fas fa-chevron-left"></i></button>
                  <ul class="pager_" id="paginationassigned"></ul>
                  <button id="nextPageassigned" class="pager_btn"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="row_select jumper">Go to
                  <select id="rowsPerPageassigned">
                    <option value="10">10</option>
                    <option selected value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                  </select>
                </div>
              </div>
            </div>
            {{-- <div class="tab-pane fade" id="assigned" role="tabpanel" aria-labelledby="assigned-tab" tabindex="0">
              <div class="cardhead">
                <h4 class="cardtitle">Assigned Requests</h4>
                <div style="margin: 0; margin-left: 10px; display: inline-block;">
                  <label for="fname">
                    <h5>Assigned Value :</h5>
                  </label>
                  <a href="#" class="btn btnekomn btn-sm">₹ 2000
                  </a>
                </div>
              </div>
              <div>
                <ul class="nav nav-underline ekom_tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="request_1-tab" data-bs-toggle="tab" data-bs-target="#request_1"
                      role="tab" aria-controls="request_1" aria-selected="true">Request 1</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="request_2-tab" data-bs-toggle="tab" data-bs-target="#request_2" role="tab"
                      aria-controls="request_2" aria-selected="false">Request 2</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="request_3-tab" data-bs-toggle="tab" data-bs-target="#request_3" role="tab"
                      aria-controls="request_3" aria-selected="false">Request 3</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="request_4-tab" data-bs-toggle="tab" data-bs-target="#request_4"
                      type="button" role="tab" aria-controls="request_4" aria-selected="false">Request 4</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="request_5-tab" data-bs-toggle="tab" data-bs-target="#request_5"
                      type="button" role="tab" aria-controls="request_5" aria-selected="false">Request 5</button>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="request_1" role="tabpanel" aria-labelledby="request_1-tab"
                    tabindex="0">
                    <form action="" methot="post">
                      <div class="addProductForm">
                        <h4 class="subheading">Product Shine Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Name:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Shoes" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Platform :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Amazon" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product URL/Link :</span></label>
                              <div class="ek_f_input">
                                <a target="_blank" href="">Product Link</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="AMZ1001" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Seller/Brand Name :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Nike" disabled /><span
                                  class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Search Term :</span></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Running Shoes"
                                  disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product amount :<i
                                    class="fas fa-info-circle fa-5x me-3 fs-13"
                                    title="Share total product amount including shipping charges, if any. Any mismatch may lead to your request gettng declined."></i></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="₹ 499" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-5">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Comfortable" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                            <div class="ek_group">
                              <label class="eklabel req">Review Rating :</label>
                              <div class="star-rating">
                                <div class="ek_f_input">
                                  <div class="star-rating">
                                    <span class="star active" data-value="1">&#9733;</span>
                                    <span class="star active" data-value="2">&#9733;</span>
                                    <span class="star active" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control" placeholder=""
                                  disabled>Very Comfortable in running.</textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <h4 class="subheading">Order Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Order No :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control"
                                  placeholder="Please type your order number." />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Order Invoice :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row pt-1">
                          <div class="col-sm-12 col-md-12">
                            <h6 class="bold">Acknowledgment of Shine Completion :</h6>
                            <div class="ek_group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                                <label class="form-check-label" for="checkbox2">
                                  I have purchased the product, provided a review, and completed the Shine request. 
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Review Screenshot :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Any Other Comments :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control"
                                  placeholder="Share your feedback comment or review on this order."></textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Shine Status :</span></label>
                              <div class="ek_f_input">
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Completed</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Cancelled</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Inprogress</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Pending</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="saveform_footer">
                          <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i
                              class="fas fa-times me-3 fs-13"></i>Cancle</button>
                          <button type="submit" class="btn btn-login btnekomn card_f_btn next_Tab">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="request_2" role="tabpanel" aria-labelledby="request_2-tab"
                    tabindex="0">
                    <form action="" methot="post">
                      <div class="addProductForm">
                        <h4 class="subheading">Product Shine Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Name:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Shoes" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Platform :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Amazon" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product URL/Link :</span></label>
                              <div class="ek_f_input">
                                <a target="_blank" href="">Product Link</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="AMZ1001" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Seller/Brand Name :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Nike" disabled /><span
                                  class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Search Term :</span></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Running Shoes"
                                  disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product amount :<i
                                    class="fas fa-info-circle fa-5x me-3 fs-13"
                                    title="Share total product amount including shipping charges, if any. Any mismatch may lead to your request gettng declined."></i></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="₹ 499" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-5">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Comfortable" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                            <div class="ek_group">
                              <label class="eklabel req">Review Rating :</label>
                              <div class="star-rating">
                                <div class="ek_f_input">
                                  <div class="star-rating">
                                    <span class="star active" data-value="1">&#9733;</span>
                                    <span class="star active" data-value="2">&#9733;</span>
                                    <span class="star active" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control" placeholder=""
                                  disabled>Very Comfortable in running.</textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <h4 class="subheading">Order Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Order No :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control"
                                  placeholder="Please type your order number." />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Order Invoice :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row pt-1">
                          <div class="col-sm-12 col-md-12">
                            <h6 class="bold">Acknowledgment of Shine Completion :</h6>
                            <div class="ek_group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                                <label class="form-check-label" for="checkbox2">
                                  I have purchased the product, provided a review, and completed the Shine request. 
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Review Screenshot :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Any Other Comments :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control"
                                  placeholder="Share your feedback comment or review on this order."></textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Shine Status :</span></label>
                              <div class="ek_f_input">
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Completed</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Cancelled</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Inprogress</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Pending</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="saveform_footer">
                          <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i
                              class="fas fa-times me-3 fs-13"></i>Cancle</button>
                          <button type="submit" class="btn btn-login btnekomn card_f_btn next_Tab">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="request_3" role="tabpanel" aria-labelledby="request_3-tab"
                    tabindex="0">
                    <form action="" methot="post">
                      <div class="addProductForm">
                        <h4 class="subheading">Product Shine Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Name:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Shoes" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Platform :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Amazon" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product URL/Link :</span></label>
                              <div class="ek_f_input">
                                <a target="_blank" href="">Product Link</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="AMZ1001" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Seller/Brand Name :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Nike" disabled /><span
                                  class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Search Term :</span></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Running Shoes"
                                  disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product amount :<i
                                    class="fas fa-info-circle fa-5x me-3 fs-13"
                                    title="Share total product amount including shipping charges, if any. Any mismatch may lead to your request gettng declined."></i></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="₹ 499" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-5">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Comfortable" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                            <div class="ek_group">
                              <label class="eklabel req">Review Rating :</label>
                              <div class="star-rating">
                                <div class="ek_f_input">
                                  <div class="star-rating">
                                    <span class="star active" data-value="1">&#9733;</span>
                                    <span class="star active" data-value="2">&#9733;</span>
                                    <span class="star active" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control" placeholder=""
                                  disabled>Very Comfortable in running.</textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <h4 class="subheading">Order Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Order No :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control"
                                  placeholder="Please type your order number." />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Order Invoice :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row pt-1">
                          <div class="col-sm-12 col-md-12">
                            <h6 class="bold">Acknowledgment of Shine Completion :</h6>
                            <div class="ek_group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                                <label class="form-check-label" for="checkbox2">
                                  I have purchased the product, provided a review, and completed the Shine request. 
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Review Screenshot :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Any Other Comments :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control"
                                  placeholder="Share your feedback comment or review on this order."></textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Shine Status :</span></label>
                              <div class="ek_f_input">
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Completed</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Cancelled</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Inprogress</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Pending</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="saveform_footer">
                          <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i
                              class="fas fa-times me-3 fs-13"></i>Cancle</button>
                          <button type="submit" class="btn btn-login btnekomn card_f_btn next_Tab">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="request_4" role="tabpanel" aria-labelledby="request_4-tab"
                    tabindex="0">
                    <form action="" methot="post">
                      <div class="addProductForm">
                        <h4 class="subheading">Product Shine Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Name:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Shoes" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Platform :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Amazon" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product URL/Link :</span></label>
                              <div class="ek_f_input">
                                <a target="_blank" href="">Product Link</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="AMZ1001" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Seller/Brand Name :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Nike" disabled /><span
                                  class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Search Term :</span></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Running Shoes"
                                  disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product amount :<i
                                    class="fas fa-info-circle fa-5x me-3 fs-13"
                                    title="Share total product amount including shipping charges, if any. Any mismatch may lead to your request gettng declined."></i></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="₹ 499" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-5">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Comfortable" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                            <div class="ek_group">
                              <label class="eklabel req">Review Rating :</label>
                              <div class="star-rating">
                                <div class="ek_f_input">
                                  <div class="star-rating">
                                    <span class="star active" data-value="1">&#9733;</span>
                                    <span class="star active" data-value="2">&#9733;</span>
                                    <span class="star active" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control" placeholder=""
                                  disabled>Very Comfortable in running.</textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <h4 class="subheading">Order Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Order No :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control"
                                  placeholder="Please type your order number." />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Order Invoice :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row pt-1">
                          <div class="col-sm-12 col-md-12">
                            <h6 class="bold">Acknowledgment of Shine Completion :</h6>
                            <div class="ek_group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                                <label class="form-check-label" for="checkbox2">
                                  I have purchased the product, provided a review, and completed the Shine request. 
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Review Screenshot :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Any Other Comments :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control"
                                  placeholder="Share your feedback comment or review on this order."></textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Shine Status :</span></label>
                              <div class="ek_f_input">
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Completed</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Cancelled</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Inprogress</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Pending</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="saveform_footer">
                          <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i
                              class="fas fa-times me-3 fs-13"></i>Cancle</button>
                          <button type="submit" class="btn btn-login btnekomn card_f_btn next_Tab">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="request_5" role="tabpanel" aria-labelledby="request_5-tab"
                    tabindex="0">
                    <form action="" methot="post">
                      <div class="addProductForm">
                        <h4 class="subheading">Product Shine Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Name:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Shoes" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Platform :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Amazon" disabled />
                                <span class="text-danger hide">Error message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product URL/Link :</span></label>
                              <div class="ek_f_input">
                                <a target="_blank" href="">Product Link</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="AMZ1001" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Seller/Brand Name :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Nike" disabled /><span
                                  class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product Search Term :</span></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Men Running Shoes"
                                  disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Product amount :<i
                                    class="fas fa-info-circle fa-5x me-3 fs-13"
                                    title="Share total product amount including shipping charges, if any. Any mismatch may lead to your request gettng declined."></i></span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="₹ 499" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-5">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control" placeholder="" value="Comfortable" disabled />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                            <div class="ek_group">
                              <label class="eklabel req">Review Rating :</label>
                              <div class="star-rating">
                                <div class="ek_f_input">
                                  <div class="star-rating">
                                    <span class="star active" data-value="1">&#9733;</span>
                                    <span class="star active" data-value="2">&#9733;</span>
                                    <span class="star active" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control" placeholder=""
                                  disabled>Very Comfortable in running.</textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <h4 class="subheading">Order Details</h4>
                        <div class="row">
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Order No :</span></label>
                              <div class="ek_f_input">
                                <input type="text" class="form-control"
                                  placeholder="Please type your order number." />
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Order Invoice :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row pt-1">
                          <div class="col-sm-12 col-md-12">
                            <h6 class="bold">Acknowledgment of Shine Completion :</h6>
                            <div class="ek_group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                                <label class="form-check-label" for="checkbox2">
                                  I have purchased the product, provided a review, and completed the Shine request. 
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-4">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Upload Review Screenshot :</span></label>
                              <div class="d-flex align-items-center justify-content-between">
                                <label for="panupload" class="uploadlabel">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                  <span id="panfilename" class="fileName">No file uploaded</span>
                                </label>
                                <input type="file" id="panupload" style="display: none;" />
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Any Other Comments :</span></label>
                              <div class="ek_f_input">
                                <textarea class="form-control"
                                  placeholder="Share your feedback comment or review on this order."></textarea>
                                <span class="text-danger hide">errr message</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="ek_group">
                              <label class="eklabel req"><span>Shine Status :</span></label>
                              <div class="ek_f_input">
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Completed</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Cancelled</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Inprogress</span>
                                <span
                                  style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Pending</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="saveform_footer">
                          <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i
                              class="fas fa-times me-3 fs-13"></i>Cancle</button>
                          <button type="submit" class="btn btn-login btnekomn card_f_btn next_Tab">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
@include('dashboard.layout.copyright')
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Script for copy the field
  function copyToClipboard(elementId, iconElement) {
      var element = document.getElementById(elementId);
      var parentElement = element.closest('.product-name');
      var text;
  
      if (parentElement && parentElement.hasAttribute('data-original-name')) {
          text = parentElement.getAttribute('data-original-name');
      } else {
          if (element.tagName === 'A') {
              text = element.href;
          } else {
              text = element.innerText || element.textContent;
          }
      }
  
      var textArea = document.createElement("textarea");
      textArea.value = text;
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand("copy");
      document.body.removeChild(textArea);
  
      // Show the copied message
      var copyMessage = iconElement.nextElementSibling;
      copyMessage.style.display = 'inline';
      setTimeout(function() {
          copyMessage.style.display = 'none';
      }, 2000); // Hide after 2 seconds
  }
  
  // Script for product Name shorting
  function truncateWords(element, wordLimit) {
    var text = element.textContent.trim();
    var words = text.split(' ');
    if (words.length > wordLimit) {
        element.textContent = words.slice(0, wordLimit).join(' ') + '...';
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    var productLinks = document.querySelectorAll('.product-name .product-link');
    productLinks.forEach(function(element) {
        truncateWords(element, 3);
    });
  });
  

  document.addEventListener('DOMContentLoaded', function() {
    function activateTab(tabId) {
        var tabTrigger = document.querySelector(`a[data-bs-target="#${tabId}"]`);
        if (tabTrigger) {
            var tab = new bootstrap.Tab(tabTrigger);
            tab.show();
        }
    }

    var urlParams = new URLSearchParams(window.location.search);
    var tabId = urlParams.get('tab');
    
    if (tabId) {
        activateTab(tabId);
    } else {
        // Optionally handle the default case if no query parameter is provided
        activateTab('shine'); // Default to 'shine' if no tab parameter is present
    }
  });

// My Shine Search And status shorting and pegination
  document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInput');
  const sortByStatus = document.getElementById('sort_by_status');
  const rowsPerPageSelect = document.getElementById('rowsPerPage');
  const prevPageButton = document.getElementById('prevPage');
  const nextPageButton = document.getElementById('nextPage');
  const paginationUl = document.getElementById('pagination');
  const rowInfo = document.getElementById('rowInfo');
  const table = document.getElementById('productTable');
  const tableBody = document.getElementById('dataShine');
  const tableRows = Array.from(tableBody.querySelectorAll('tr'));
  
  let currentPage = 1;
  let rowsPerPage = parseInt(rowsPerPageSelect.value);
  let filteredRows = tableRows;

  // Function to render pagination
  function renderPagination() {
    paginationUl.innerHTML = '';
    const totalPages = Math.ceil(filteredRows.length / rowsPerPage);

    for (let i = 1; i <= totalPages; i++) {
      const li = document.createElement('li');
      li.textContent = i;
      li.className = 'page-item' + (i === currentPage ? ' active' : '');
      li.addEventListener('click', () => {
        currentPage = i;
        renderTable();
      });
      paginationUl.appendChild(li);
    }

    prevPageButton.disabled = currentPage === 1;
    nextPageButton.disabled = currentPage === totalPages;
    rowInfo.textContent = `Showing ${(currentPage - 1) * rowsPerPage + 1} to ${Math.min(currentPage * rowsPerPage, filteredRows.length)} of ${filteredRows.length} entries`;
  }

  // Function to render table rows based on pagination
  function renderTable() {
    tableBody.innerHTML = '';
    const start = (currentPage - 1) * rowsPerPage;
    const end = Math.min(currentPage * rowsPerPage, filteredRows.length);

    for (let i = start; i < end; i++) {
      tableBody.appendChild(filteredRows[i]);
    }

    renderPagination();
  }

  // Function to filter rows based on search and sort
  function filterRows() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedStatus = sortByStatus.value;

    filteredRows = tableRows.filter(row => {
      const cells = row.getElementsByTagName('td');
      let match = false;

      // Check if the row matches the search term
      for (let i = 0; i < cells.length - 1; i++) {
        if (cells[i].textContent.toLowerCase().includes(searchTerm)) {
          match = true;
          break;
        }
      }

      // Check if the row matches the selected status
      const rowStatus = row.getAttribute('data-status');
      if (selectedStatus !== 'NA' && rowStatus !== selectedStatus) {
        match = false;
      }

      return match;
    });

    currentPage = 1;
    renderTable();
  }

  // Event listeners
  searchInput.addEventListener('input', filterRows);
  sortByStatus.addEventListener('change', filterRows);
  rowsPerPageSelect.addEventListener('change', () => {
    rowsPerPage = parseInt(rowsPerPageSelect.value);
    renderTable();
  });

  prevPageButton.addEventListener('click', () => {
    if (currentPage > 1) {
      currentPage--;
      renderTable();
    }
  });

  nextPageButton.addEventListener('click', () => {
    const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
    if (currentPage < totalPages) {
      currentPage++;
      renderTable();
    }
  });

  // Initial render
  renderTable();
});


// Assigned Shine Search And status shorting and pegination
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInputassigned');
  const sortByStatus = document.getElementById('sort_by_statusassigned');
  const rowsPerPageSelect = document.getElementById('rowsPerPageassigned');
  const prevPageButton = document.getElementById('prevPageassigned');
  const nextPageButton = document.getElementById('nextPageassigned');
  const paginationUl = document.getElementById('paginationassigned');
  const rowInfo = document.getElementById('rowInfoassigned');
  const table = document.getElementById('productTableassigned');
  const tableBody = document.getElementById('dataShineassigned');
  const tableRows = Array.from(tableBody.querySelectorAll('tr'));

  let currentPage = 1;
  let rowsPerPage = parseInt(rowsPerPageSelect.value, 10);
  let filteredRows = tableRows;

  function renderPagination() {
    paginationUl.innerHTML = '';
    const totalPages = Math.ceil(filteredRows.length / rowsPerPage);

    for (let i = 1; i <= totalPages; i++) {
      const li = document.createElement('li');
      li.textContent = i;
      li.className = 'page-item' + (i === currentPage ? ' active' : '');
      li.addEventListener('click', () => {
        currentPage = i;
        renderTable();
      });
      paginationUl.appendChild(li);
    }

    prevPageButton.disabled = currentPage === 1;
    nextPageButton.disabled = currentPage === totalPages;
    rowInfo.textContent = `Showing ${(currentPage - 1) * rowsPerPage + 1} to ${Math.min(currentPage * rowsPerPage, filteredRows.length)} of ${filteredRows.length} entries`;
  }

  function renderTable() {
    tableBody.innerHTML = '';
    const start = (currentPage - 1) * rowsPerPage;
    const end = Math.min(currentPage * rowsPerPage, filteredRows.length);

    for (let i = start; i < end; i++) {
      tableBody.appendChild(filteredRows[i]);
    }
    renderPagination();
  }

  function filterRows() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedStatus = sortByStatus.value;

    filteredRows = tableRows.filter(row => {
      const cells = row.getElementsByTagName('td');
      let match = false;

      for (let i = 0; i < cells.length - 1; i++) {
        if (cells[i].textContent.toLowerCase().includes(searchTerm)) {
          match = true;
          break;
        }
      }

      const rowStatus = row.getAttribute('data-status-assigned');
      if (selectedStatus !== 'NA' && rowStatus !== selectedStatus) {
        match = false;
      }

      return match;
    });

    currentPage = 1;
    renderTable();
  }

  searchInput.addEventListener('input', filterRows);
  sortByStatus.addEventListener('change', filterRows);
  rowsPerPageSelect.addEventListener('change', () => {
    rowsPerPage = parseInt(rowsPerPageSelect.value, 10);
    renderTable();
  });

  prevPageButton.addEventListener('click', () => {
    if (currentPage > 1) {
      currentPage--;
      renderTable();
    }
  });

  nextPageButton.addEventListener('click', () => {
    const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
    if (currentPage < totalPages) {
      currentPage++;
      renderTable();
    }
  });

  renderTable();
});

</script>
  
  
 <script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all countdown elements
    const countdownElements = document.querySelectorAll('.countdown');
    
    countdownElements.forEach(function(countdownElement) {
        const status = countdownElement.getAttribute('data-status');

        // Check if status is 3, if so, stop and hide the countdown
        if (status != 2) {
            countdownElement.style.display = 'none';
            return; // Skip further processing for this element
        }

        const createdAt = new Date(countdownElement.getAttribute('data-created-at')).getTime();
        
        // Set the countdown duration (24 hours in milliseconds)
        const countdownDuration = 24 * 60 * 60 * 1000;
        
        // Function to update the countdown timer
        function updateCountdown() {
            const now = new Date().getTime();
            const timeElapsed = now - createdAt;
            const timeLeft = countdownDuration - timeElapsed;
            
            // Calculate hours, minutes, and seconds left
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            // Display the result
            if (timeLeft >= 0) {
                countdownElement.innerHTML = `${hours}h ${minutes}m ${seconds}s`;
            } else {
                // If the countdown is over, display "Expired"
                countdownElement.innerHTML = "Expired";
                clearInterval(countdownInterval);
            }
        }

        // Update the countdown every second
        updateCountdown();  // Initial call
        const countdownInterval = setInterval(updateCountdown, 1000);
    });
});
</script> 

@endsection
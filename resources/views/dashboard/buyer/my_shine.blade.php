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
                  placeholder="Search with Product Title, SKU, Product ID">
                <div class="filter">
                  <div class="ek_group m-0">
                    <label class="eklabel w_50_f">Sort by:</label>
                    <div class="ek_f_input">
                      <select class="form-select" id="sort_by_status">
                        <option value="0" selected>Draft</option>
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
                <table class="normalTable tableSorting whitespace">
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
                      <th>Product Name</th>
                      {{-- <th>Platform</th> --}}
                      <th>Product URL/Link</th>
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
                      @foreach($shineProducts as $product)
                          <tr>
                            <td>
                                <span id="batchId-{{ $product->id }}">{{ $product->batch_id }}</span>
                                <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('batchId-{{ $product->id }}')"></i>
                            </td>
                            <td>
                                <span id="requestNo-{{ $product->id }}">{{ $product->request_no }}</span>
                                <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('requestNo-{{ $product->id }}')"></i>
                            </td>
                              <td>{{ $product->name }}</td>
                              {{-- <td>{{ $product->platform }}</td> --}}
                              <td>
                                  <span id="url-{{ $product->id }}"><a href="{{ $product->url }}" target="_blank">{{ $product->url }}</a></span>
                                  <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('url-{{ $product->id }}')"></i>
                              </td>
                              <td>
                                <span id="productId-{{ $product->id }}">{{ $product->product_id }}</span>
                                <i class="fas fa-copy copy-icon" style="cursor: pointer; margin-left: 5px;" onclick="copyToClipboard('productId-{{ $product->id }}')"></i>
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
                                <a href="{{ route('shine-status', $product->id) }}" class="btn btnekomn btn-sm">View Details</a>
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
                    <option value="50">50</option>
                    <option selected value="100">100</option>
                    <option value="200">200</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="live-shine" role="tabpanel" aria-labelledby="live-shine-tab" tabindex="0">
              <div class="tableTop">
                <input type="text" class="form-control w_300_f searchicon"
                  placeholder="Search with Product Title, SKU, Product ID">
                <div class="filter">
                  <div class="ek_group m-0">
                    <label class="eklabel w_50_f">Sort by:</label>
                    <div class="ek_f_input">
                      <select class="form-select">
                        <option value="" selected>Draft</option>
                        <option value="">Pending</option>
                        <option value="">Inprogress</option>
                        <option value="">Order Placed</option>
                        <option value="">Order Confirm</option>
                        <option value="">Review Submited</option>
                        <option value="">Complete</option>
                        <option value="">Cancelled</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive tres_border">
                <table class="normalTable tableSorting whitespace">
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
                      <th>Product Name</th>
                      <th>Platform</th>
                      <th>Product URL/Link</th>
                      <th>Product ID/ASIN</th>
                      {{-- <th>Seller/Brand Name</th>
                      <th>Product Search Term </th>
                      <th>Product amount</th>
                      <th>Feedback/Review Title</th>
                      <th>Feedback/Review comment</th>
                      <th>Review Rating</th> --}}
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($assignedProducts->isEmpty())
                        <tr>
                            <td colspan="9" style="text-align: center;">Not Assigned Shine Yet, Add New Shine First...</td>
                        </tr>
                    @else
                    @foreach($assignedProducts as $product)
                    <tr>
                      <td>{{ $product->batch_id }}</td>
                      <td>{{ $product->request_no }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->platform }}</td>
                      <td><a target="_blank" href="{{ $product->url }}">Product Link</a></td>
                      <td>{{ $product->product_id }}</td>
                      {{-- <td>{{ $product->seller_name }}</td>
                      <td>{{ $product->search_term }}</td>
                      <td>₹ {{ $product->amount }}</td>
                      <td>{{ $product->feedback_title }}</td>
                      <td>{{ $product->feedback_comment }}</td>
                      <td class="star-rating">
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
                    <option value="50">50</option>
                    <option selected value="100">100</option>
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
  function copyToClipboard(elementId) {
      var text = document.getElementById(elementId).innerText || document.getElementById(elementId).querySelector('a').href;
      var textArea = document.createElement("textarea");
      textArea.value = text;
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand("copy");
      document.body.removeChild(textArea);
      alert("Copied: " + text);
  }
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const rowsPerPage = document.getElementById("rowsPerPage");
        const rowInfo = document.getElementById("rowInfo");
        const pagination = document.getElementById("pagination");
        const prevPage = document.getElementById("prevPage");
        const nextPage = document.getElementById("nextPage");
        const dataContainer = document.getElementById("dataContainer");
        let currentPage = 1;
        let rows = parseInt(rowsPerPage.value, 10);
        let totalRows = 0;

        // Event listener for the search input field
        const searchQuery = document.getElementById("searchQuery");
        searchQuery.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                fetchData();
            }
        });

        // Event listener for clicking outside the search input field
        searchQuery.addEventListener("blur", (e) => {
            fetchData();
        });

        const sortByStatus = document.getElementById("sort_by_status");
        sortByStatus.addEventListener("change", () => {
            fetchData();
        });


        const sortField = ""; // Set the sort field here (e.g. "sku", "stock", "selling_price")
        const sortOrder = ""; // Set the sort order here (e.g. "asc", "desc")
        // const selling_price_sort = document.getElementById("selling_price_sort");
        // selling_price_sort.addEventListener("click", () => {
        //     alert('asdd');
        //     sortField = "price_after_tax";
        //     sortOrder = (sortOrder === "asc") ? "desc" : "asc";
        //     // alert(sortOrder);
        //     fetchData();
        // });
        // Function to fetch data from the server
        function fetchData() {
            // Make an API request to fetch inventory data
            let apiUrl = `product/inventory?per_page=${rows}&page=${currentPage}`;

            if (sortField && sortOrder) {
                apiUrl += `&sort_field=${sortField}&sort_order=${sortOrder}`;
            }

            if (searchQuery) {
                apiUrl += `&query=${searchQuery.value}`;
            }

            if (sortByStatus) {
                apiUrl += `&sort_by_status=${sortByStatus.value}`;
            }

            ApiRequest(apiUrl, 'GET')
                .then(response => {
                    const data = (response.data);
                    if (data.length === 0) {
                        dataContainer.innerHTML = `<tr><td colspan="10" class="text-center">No data found</td></tr>`;
                    } else {
                        response = (response.meta.pagination);
                        totalRows = response.total;
                        updatePagination();
                        displayData(data);
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        // Function to update the pagination UI
        function updatePagination() {
            const totalPages = Math.ceil(totalRows / rows);
            pagination.innerHTML = "";
            let pageList = "";
            if (totalPages <= 5) {
                for (let i = 1; i <= totalPages; i++) {
                    pageList += `<li><a href="#" class="${i === currentPage ? "active" : ""}" data-page="${i}">${i}</a></li>`;
                }
            } else {
                if (currentPage <= 3) {
                    for (let i = 1; i <= 4; i++) {
                        pageList += `<li><a href="#" class="${i === currentPage ? "active" : ""}" data-page="${i}">${i}</a></li>`;
                    }
                    pageList += `<li>...</li>`;
                    pageList += `<li><a href="#" data-page="${totalPages}">${totalPages}</a></li>`;
                } else if (currentPage >= totalPages - 2) {
                    pageList += `<li><a href="#" data-page="1">1</a></li>`;
                    pageList += `<li>...</li>`;
                    for (let i = totalPages - 3; i <= totalPages; i++) {
                        pageList += `<li><a href="#" class="${i === currentPage ? "active" : ""}" data-page="${i}">${i}</a></li>`;
                    }
                } else {
                    pageList += `<li><a href="#" data-page="1">1</a></li>`;
                    pageList += `<li>...</li>`;
                    for (let i = currentPage - 1; i <= currentPage + 1; i++) {
                        pageList += `<li><a href="#" class="${i === currentPage ? "active" : ""}" data-page="${i}">${i}</a></li>`;
                    }
                    pageList += `<li>...</li>`;
                    pageList += `<li><a href="#" data-page="${totalPages}">${totalPages}</a></li>`;
                }
            }
            pagination.innerHTML = pageList;
            updateRowInfo();
            prevPage.disabled = currentPage === 1;
            nextPage.disabled = currentPage === totalPages;
        }

        // Function to update the row information
        function updateRowInfo() {
            const startRow = (currentPage - 1) * rows + 1;
            const endRow = Math.min(currentPage * rows, totalRows);
            rowInfo.textContent = `Showing ${startRow} to ${endRow} of ${totalRows}`;
        }

        // Function to display the inventory data in the table
        function displayData(items) {
            dataContainer.innerHTML = items.map(generateTableRow).join("");
        }

        // Event listener for the "rowsPerPage" select element
        rowsPerPage.addEventListener("change", (e) => {
            rows = parseInt(e.target.value, 10);
            currentPage = 1;
            fetchData();
        });

        // Event listener for the pagination links
        pagination.addEventListener("click", (e) => {
            if (e.target.tagName === "A") {
                currentPage = parseInt(e.target.dataset.page, 10);
                fetchData();
            }
        });

        // Event listener for the "prevPage" button
        prevPage.addEventListener("click", () => {
            if (currentPage > 1) {
                currentPage--;
                fetchData();
            }
        });

        // Event listener for the "nextPage" button
        nextPage.addEventListener("click", () => {
            const totalPages = Math.ceil(totalRows / rows);
            if (currentPage < totalPages) {
                currentPage++;
                fetchData();
            }
        });

        // Initial fetch of data
        fetchData();

    });

    /**
     * Generates a table row HTML markup for a given item.
     *
     * @param {Object} item - The item object containing the details.
     * @returns {string} - The HTML markup for the table row.
     */
    function generateTableRow(item) {
        let stock = allowEditable(item)
        let availabilityStatus = false;
        if (item.product_category == 'Unknown') {
            availabilityStatus = true;
        }
        return `
        <tr>
            <td>
                <div class="productImg_t">
                    <img src="${item.product_image}" alt="Product Image">
                </div>
            </td>
            <td>
                <div class="productTitle_t">
                    ${item.title}
                </div>
            </td>
            <td>
                <div class="sku_t">${item.sku}</div>
            </td>
            <td>
                ${item.product_id}
            </td>
            <td>
                <input type="text" class="stock_t" value="${item.stock}" onfocusout="handleInput('${item.id}', '${item.product_id}', 1, this)">
            </td>
            <td>
                <div class="sell_t"><i class="fas fa-rupee-sign"></i> ${item.selling_price}</div>
            </td>
            <td>
                <div>${item.product_category}</div>
            </td>
            <td>
                <div>${item.availability_status}</div>
            </td>
            <td>
            <select class="changeStatus_t form-select" onchange="handleInput('${item.id}', '${item.product_id}', 2, this)" ${item.allow_editable == true ? 'disabled' : '' }>
               ${stock}
               </select>
            </td>
            <td>
                <a class="nbtn btn-link btn-sm" href="${item.editInventory}" target="_blank">Edit</a>
            </td>
        </tr>
    `;

        function allowEditable(item) {
            if (item.allow_editable) {

                return `
                    <option value="1" ${item.status === "Active" ? "selected" : ""}>Active</option>
                    <option value="2" ${item.status === "Inactive" ? "selected" : ""}>Inactive</option>
                    <option value="3" ${item.status === "Out of Stock" ? "selected" : ""}>Out of Stock</option>
                    <option value="4" ${item.status === "Draft" ? "selected" : ""}>Draft</option>
                `;
            } else {
                // console.log(item.allow_editable);
                return `
            <option value="1" ${item.status === "Active" ? "selected" : ""}>Active</option>
            <option value="2" ${item.status === "Inactive" ? "selected" : ""}>Inactive</option>
            <option value="3" ${item.status === "Out of Stock" ? "selected" : ""}>Out of Stock</option>
        `;
            }


        }
    }



    function handleInput(itemId, productId, type, element) {
        if (type === 1) {
            updateStock(itemId, productId, element.value);
        } else if (type === 2) {
            updateStatus(itemId, productId, element.value);
        }
    }
    /**
     * Updates the stock of a product.
     *
     * @param {number} productId - The ID of the product.
     */
    function updateStock(itemId, productId, newStock) {
        // Make an API request to update the stock of the product
        ApiRequest(`product/updateStock/${itemId}`, 'PATCH', {
                stock: newStock,
                product_id: productId
            })
            .then(response => {
            if (response.data.statusCode == 200) {
            Swal.fire({
                title: "Good job!",
                text: response.data.message,
                icon: "success",
                didOpen: () => {
                  // Apply inline CSS to the title
                  const title = Swal.getTitle();
                  title.style.color = 'red';
                  title.style.fontSize = '20px';

                  // Apply inline CSS to the content
                  const content = Swal.getHtmlContainer();

                  // Apply inline CSS to the confirm button
                  const confirmButton = Swal.getConfirmButton();
                  confirmButton.style.backgroundColor = '#feca40';
                  confirmButton.style.color = 'white';
                }
            }).then(() => {
                // Redirect to the inventory page
                window.location.href = "{{ route('my.inventory') }}";
            })
                    
                } else if (response.data.statusCode == 422) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.data.message,
                    });
                }
            })
            .catch(error => {
                console.error('Error updating stock:', error);
            });
    }

    /**
     * Updates the status of a product.
     *
     * @param {number} productId - The ID of the product.
     */
    function updateStatus(itemId, productId, newStatus) {
        Swal.fire({
            title: "Do you want to save the changes status?",
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`,
            didOpen: () => {
                const title = Swal.getTitle();
                title.style.fontSize = '25px';
                // Apply inline CSS to the content
                const content = Swal.getHtmlContainer();
                // Apply inline CSS to the confirm button
                const confirmButton = Swal.getConfirmButton();
                confirmButton.style.backgroundColor = '#feca40';
                confirmButton.style.color = 'white';
            }
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                // Make an API request to update the status of the product
                ApiRequest(`product/updateStatus/${itemId}`, 'PATCH', {
                        status: newStatus,
                        product_id: productId
                    })
                    .then(response => {
                        Swal.fire({
                            title: "Good job!",
                            text: response.data.message,
                            icon: "success",
                            didOpen: () => {
                            // Apply inline CSS to the title
                            const title = Swal.getTitle();
                            title.style.color = 'red';
                            title.style.fontSize = '20px';

                            // Apply inline CSS to the content
                            const content = Swal.getHtmlContainer();

                            // Apply inline CSS to the confirm button
                            const confirmButton = Swal.getConfirmButton();
                            confirmButton.style.backgroundColor = '#feca40';
                            confirmButton.style.color = 'white';
                            }
                        }).then(() => {
                            // Redirect to the inventory page
                            window.location.href = "{{ route('my.inventory') }}";
                        })
                        
                    })
                    .catch(error => {
                        console.error('Error updating status:', error);
                    });

            } else if (result.isDenied) {
                Swal.fire("The status is not updated.", "", "info");
            }
        });

    }
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const tableBody = document.getElementById("dataShine");

  function fetchData() {
    // Replace 'http://your-api-endpoint' with your actual API endpoint URL
    fetch('http://your-api-endpoint')
      .then(response => response.json())
      .then(data => {
        if (data.length === 0) {
          tableBody.innerHTML = `<tr><td colspan="12" class="text-center">No data found</td></tr>`;
        } else {
          let tableRows = "";
          for (const item of data) {
            tableRows += `
              <tr>
                <td>${item.product_name}</td>
                <td>${item.platform}</td>
                <td><a href="${item.product_url}" target="_blank">${item.product_url}</a></td>
                <td>${item.product_id_asin}</td>
                <td>${item.seller_brand_name}</td>
                <td>${item.product_search_term}</td>
                <td>${item.product_amount}</td>
                <td>${item.feedback_review_title}</td>
                <td>${item.feedback_review_comment}</td>
                <td>${item.review_rating}</td>
                <td>${item.status}</td>
                <td></td>
              </tr>
            `;
            
          }
          tableBody.innerHTML = tableRows;
        }
      })
      .catch(error => {
        console.error("Error fetching data:", error);
      });
  }

  fetchData();
});
</script>

@endsection
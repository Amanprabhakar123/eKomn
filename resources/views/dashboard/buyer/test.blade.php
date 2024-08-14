@extends('dashboard.layout.app')
@section('content')
@section('title')
New Shine
@endsection

<div class="ek_dashboard">
    <div class="ek_content">
      <div class="card ekcard pa shadow-sm">
        <div class="cardhead" style="text-align: right;">
          <h3 class="cardtitle">New Shine</h3>
          <div>
            <div>
              <label for="fname">
                <h6>Shine Credit :</h6>
              </label>
              <a href="#" class="btn btnekomn btn-sm">₹ 2000</a>
              <label for="fname">
                <h6>Batch Value :</h6>
              </label>
              <a href="#" class="btn btnekomn btn-sm amount">₹ </a>
              <label for="fname">
                <h6>Target Value :</h6>
              </label>
              <a href="#" class="btn btnekomn btn-sm">₹ 1000-2000</a>
              {{-- @section('content')
                <div class="container">
                @if($shineCredits)
                  <a href="#" class="btn btnekomn btn-sm">
                    ₹ {{ $shineCredits->range }}
                  </a>
                @else
                <p>No records found.</p>
                @endif
              </div>
              @endsection --}}
            </div>
          </div>
        </div>
        <div>
          <ul class="nav nav-underline ekom_tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="request_1-tab" href="#request_1" data-bs-toggle="tab" data-bs-target="#request_1" role="tab"
                aria-controls="request_1" aria-selected="true">Request 1</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="request_2-tab" href="#request_2" data-bs-toggle="tab" data-bs-target="#request_2" role="tab"
                aria-controls="request_2" aria-selected="false">Request 2</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="request_3-tab" href="#request_3" data-bs-toggle="tab" data-bs-target="#request_3" role="tab"
                aria-controls="request_3" aria-selected="false">Request 3</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="request_4-tab" href="#request_4" data-bs-toggle="tab" data-bs-target="#request_4" role="tab"
               aria-controls="request_4" aria-selected="false">Request 4</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="request_5-tab" href="#request_5" data-bs-toggle="tab" data-bs-target="#request_5" role="tab"
               aria-controls="request_5" aria-selected="false">Request 5</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            {{-- <input type="hidden" class="form-control" name="user_id" id="userId" value="{{ auth()->user()->id }}"> --}}
            <div class="tab-pane fade show active" id="request_1" role="tabpanel" aria-labelledby="request_1-tab"
              tabindex="0">
              <div class="ek_shine">
                {{-- <form action="" methot="post" enctype="multipart/form-data">
                  @csrf --}}
                  <div class="addProductForm">
                    <input type="hidden" class="form-control" name="batch_id[]" id="batchId1">
                    <input type="hidden" class="form-control" name="request_no[]" id="requestId1">
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Name:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                            name="product_name[]" id="product_name" placeholder="Actual product name as listed on the requested platform." required />
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
                            <select class="form-select" name="platform[]" id="platform" required>
                              <option value="" selected>Select One</option>
                              <option value="flipkart">Flipkart</option>
                              <option value="amazon">Amazon</option>
                              <option value="jiomart">JioMart</option>
                              <option value="ajio">Ajio</option>
                              <option value="meesho">Meesho</option>
                              <option value="myntra">Myntra</option>
                              <option value="nykaa">Nykaa</option>
                              <option value="shopsy">Shopsy</option>
                              <option value="website">Website</option>
                              <option value="">Other</option>
                            </select>
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product URL/Link :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_link[]" id="product_link" placeholder="Product page url/link." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_id[]" id="product_id" placeholder="Platform specific ID." />
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
                            <input type="text" class="form-control" name="seller_name[]" id="seller_name" placeholder="Your brand/seller name."><span
                              class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-8">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Search Term :</span></span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="search_term[]" id="search_term" placeholder="To search your product on requested platform." />
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
                            <input type="text" class="form-control"
                              name="amount[]" id="amount" placeholder="Total product amount." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-5">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="feedback_title[]" id="feedback_title" placeholder="Title of your feedback review." />
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
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                              </div>
                              <input type="hidden" class="review_rating" name="review_rating"[] id="review_rating" value="">
                              <h6 class="text-danger hide error-message">Error message</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-md-12">
                          <div class="ek_group">
                            <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                            <div class="ek_f_input">
                              <textarea class="form-control"
                                name="feedback_comment[]" id="feedback_comment" placeholder="Share feedback comment or review of your product as you would like it to be published. A genuine feedback is not more than few lines."></textarea>
                              <span class="text-danger hide">errr message</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="saveform_footer">
                        <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab" id="cancelButton">
                          <i class="fas fa-times me-3 fs-13"></i>Cancel
                        </button>
                          <button type="button" class="btn btn-login btnekomn card_f_btn" id="shinetab1">Save & Next</button>
                          {{-- <button type="button" class="btn btn-login btnekomn card_f_btn next_Tab">Save & Next</button> --}}
                      </div>
                    </div>
                  </div>
                {{-- </form> --}}
              </div>
            </div>
            <div class="tab-pane fade" id="request_2" role="tabpanel" aria-labelledby="request_2-tab" tabindex="0">
              <div class="ek_shine">
                {{-- <form action="" methot="post" enctype="multipart/form-data">
                  @csrf --}}
                  <div class="addProductForm">
                    <input type="hidden" class="form-control" name="batch_id[]" id="batchId2">
                    <input type="hidden" class="form-control" name="request_no[]" id="requestId2">
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Name:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                            name="product_name[]" id="product_name" placeholder="Actual product name as listed on the requested platform." required />
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
                            <select class="form-select" name="platform[]" id="platform" required>
                              <option value="" selected>Select One</option>
                              <option value="flipkart">Flipkart</option>
                              <option value="amazon">Amazon</option>
                              <option value="jiomart">JioMart</option>
                              <option value="ajio">Ajio</option>
                              <option value="meesho">Meesho</option>
                              <option value="myntra">Myntra</option>
                              <option value="nykaa">Nykaa</option>
                              <option value="shopsy">Shopsy</option>
                              <option value="website">Website</option>
                              <option value="">Other</option>
                            </select>
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product URL/Link :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_link[]" id="product_link" placeholder="Product page url/link." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_id[]" id="product_id" placeholder="Platform specific ID." />
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
                            <input type="text" class="form-control" name="seller_name[]" id="seller_name" placeholder="Your brand/seller name."><span
                              class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-8">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Search Term :</span></span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="search_term[]" id="search_term" placeholder="To search your product on requested platform." />
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
                            <input type="text" class="form-control"
                              name="amount[]" id="amount" placeholder="Total product amount." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-5">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="feedback_title[]" id="feedback_title" placeholder="Title of your feedback review." />
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
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                              </div>
                              <input type="hidden" class="review_rating" name="review_rating[]" id="review_rating" value="">
                              <h6 class="text-danger hide error-message">Error message</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-md-12">
                          <div class="ek_group">
                            <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                            <div class="ek_f_input">
                              <textarea class="form-control"
                                name="feedback_comment[]" id="feedback_comment" placeholder="Share feedback comment or review of your product as you would like it to be published. A genuine feedback is not more than few lines."></textarea>
                              <span class="text-danger hide">errr message</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="saveform_footer">
                        <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i
                            class="fas fa-arrow-left me-3 fs-13"></i>Back</button>
                        {{-- <button type="button" class="btn btn-login btnekomn card_f_btn next_Tab">Save & Next</button> --}}
                        <button type="button" class="btn btn-login btnekomn card_f_btn" id="shinetab2">Save & Next</button>
                      </div>
                    </div>
                  </div>
                {{-- </form> --}}
              </div>
            </div>
            <div class="tab-pane fade" id="request_3" role="tabpanel" aria-labelledby="request_3-tab" tabindex="0">
              <div class="ek_shine">
                {{-- <form action="" methot="post"> --}}
                  <div class="addProductForm">
                    <input type="hidden" class="form-control" name="batch_id[]" id="batchId3">
                    <input type="hidden" class="form-control" name="request_no[]" id="requestId3">
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Name:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                            name="product_name[]" id="product_name" placeholder="Actual product name as listed on the requested platform." required />
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
                            <select class="form-select" name="platform[]" id="platform" required>
                              <option value="" selected>Select One</option>
                              <option value="flipkart">Flipkart</option>
                              <option value="amazon">Amazon</option>
                              <option value="jiomart">JioMart</option>
                              <option value="ajio">Ajio</option>
                              <option value="meesho">Meesho</option>
                              <option value="myntra">Myntra</option>
                              <option value="nykaa">Nykaa</option>
                              <option value="shopsy">Shopsy</option>
                              <option value="website">Website</option>
                              <option value="">Other</option>
                            </select>
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product URL/Link :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_link[]" id="product_link" placeholder="Product page url/link." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_id[]" id="product_id" placeholder="Platform specific ID." />
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
                            <input type="text" class="form-control" name="seller_name[]" id="seller_name" placeholder="Your brand/seller name."><span
                              class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-8">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Search Term :</span></span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="search_term[]" id="search_term" placeholder="To search your product on requested platform." />
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
                            <input type="text" class="form-control"
                              name="amount[]" id="amount" placeholder="Total product amount." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-5">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="feedback_title[]" id="feedback_title" placeholder="Title of your feedback review." />
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
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                              </div>
                              <input type="hidden" class="review_rating" name="review_rating[]" id="review_rating" value="">
                              <h6 class="text-danger hide error-message">Error message</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-md-12">
                          <div class="ek_group">
                            <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                            <div class="ek_f_input">
                              <textarea class="form-control"
                                name="feedback_comment[]" id="feedback_comment" placeholder="Share feedback comment or review of your product as you would like it to be published. A genuine feedback is not more than few lines."></textarea>
                              <span class="text-danger hide">errr message</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="saveform_footer">
                        <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i
                            class="fas fa-arrow-left me-3 fs-13"></i>Back</button>
                        {{-- <button type="button" class="btn btn-login btnekomn card_f_btn next_Tab">Save & Next</button> --}}
                        <button type="button" class="btn btn-login btnekomn card_f_btn" id="shinetab3">Save & Next</button>
                      </div>
                    </div>
                  </div>
                {{-- </form> --}}
              </div>
            </div>
            <div class="tab-pane fade" id="request_4" role="tabpanel" aria-labelledby="request_4-tab" tabindex="0">
              <div class="ek_shine">
                {{-- <form action="" methot="post"> --}}
                  <div class="addProductForm">
                    <input type="hidden" class="form-control" name="batch_id[]" id="batchId4">
                    <input type="hidden" class="form-control" name="request_no[]" id="requestId4">
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Name:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                            name="product_name[]" id="product_name" placeholder="Actual product name as listed on the requested platform." required />
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
                            <select class="form-select" name="platform[]" id="platform" required>
                              <option value="" selected>Select One</option>
                              <option value="flipkart">Flipkart</option>
                              <option value="amazon">Amazon</option>
                              <option value="jiomart">JioMart</option>
                              <option value="ajio">Ajio</option>
                              <option value="meesho">Meesho</option>
                              <option value="myntra">Myntra</option>
                              <option value="nykaa">Nykaa</option>
                              <option value="shopsy">Shopsy</option>
                              <option value="website">Website</option>
                              <option value="">Other</option>
                            </select>
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product URL/Link :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_link[]" id="product_link" placeholder="Product page url/link." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_id[]" id="product_id" placeholder="Platform specific ID." />
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
                            <input type="text" class="form-control" name="seller_name[]" id="seller_name" placeholder="Your brand/seller name."><span
                              class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-8">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Search Term :</span></span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="search_term[]" id="search_term" placeholder="To search your product on requested platform." />
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
                            <input type="text" class="form-control"
                              name="amount[]" id="amount" placeholder="Total product amount." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-5">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="feedback_title[]" id="feedback_title" placeholder="Title of your feedback review." />
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
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                              </div>
                              <input type="hidden" class="review_rating" name="review_rating[]" id="review_rating" value="">
                              <h6 class="text-danger hide error-message">Error message</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-md-12">
                          <div class="ek_group">
                            <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                            <div class="ek_f_input">
                              <textarea class="form-control"
                                name="feedback_comment[]" id="feedback_comment" placeholder="Share feedback comment or review of your product as you would like it to be published. A genuine feedback is not more than few lines."></textarea>
                              <span class="text-danger hide">errr message</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="saveform_footer">
                        <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i
                            class="fas fa-arrow-left me-3 fs-13"></i>Back</button>
                        {{-- <button type="button" class="btn btn-login btnekomn card_f_btn next_Tab">Save & Next</button> --}}
                        <button type="button" class="btn btn-login btnekomn card_f_btn" id="shinetab4">Save & Next</button>
                      </div>
                    </div>
                  </div>
                {{-- </form> --}}
              </div>
            </div>
            <div class="tab-pane fade" id="request_5" role="tabpanel" aria-labelledby="request_5-tab" tabindex="0">
              <div class="ek_shine">
                {{-- <form action="" methot="post"> --}}
                  <div class="addProductForm">
                    <input type="hidden" class="form-control" name="batch_id[]" id="batchId5">
                    <input type="hidden" class="form-control" name="request_no[]" id="requestId5">
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Name:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                            name="product_name[]" id="product_name" placeholder="Actual product name as listed on the requested platform." required />
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
                            <select class="form-select" name="platform[]" id="platform" required>
                              <option value="" selected>Select One</option>
                              <option value="flipkart">Flipkart</option>
                              <option value="amazon">Amazon</option>
                              <option value="jiomart">JioMart</option>
                              <option value="ajio">Ajio</option>
                              <option value="meesho">Meesho</option>
                              <option value="myntra">Myntra</option>
                              <option value="nykaa">Nykaa</option>
                              <option value="shopsy">Shopsy</option>
                              <option value="website">Website</option>
                              <option value="">Other</option>
                            </select>
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product URL/Link :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_link[]" id="product_link" placeholder="Product page url/link." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_id[]" id="product_id" placeholder="Platform specific ID." />
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
                            <input type="text" class="form-control" name="seller_name[]" id="seller_name" placeholder="Your brand/seller name."><span
                              class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-8">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Search Term :</span></span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="search_term[]" id="search_term" placeholder="To search your product on requested platform." />
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
                            <input type="text" class="form-control"
                              name="amount[]" id="amount" placeholder="Total product amount." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-5">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="feedback_title[]" id="feedback_title" placeholder="Title of your feedback review." />
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
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                              </div>
                              <input type="hidden" class="review_rating" name="review_rating[]" id="review_rating" value="">
                              <h6 class="text-danger hide error-message">Error message</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-md-12">
                          <div class="ek_group">
                            <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                            <div class="ek_f_input">
                              <textarea class="form-control"
                                name="feedback_comment[]" id="feedback_comment" placeholder="Share feedback comment or review of your product as you would like it to be published. A genuine feedback is not more than few lines."></textarea>
                              <span class="text-danger hide">errr message</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="saveform_footer">
                        <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i
                            class="fas fa-arrow-left me-3 fs-13"></i>Back</button>
                        <button type="button" class="btn btn-login btnekomn card_f_btn" id="submitShineForm">Submit</button>
                      </div>
                    </div>
                  </div>
                {{-- </form> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ek_db_footer">&copy; 2024 ekomn.com, All Rights Reserved</div>
@include('dashboard.layout.copyright')
</div>
<script>
// Go Back
document.getElementById('cancelButton').addEventListener('click', function() {
  window.location.href = "{{ route('my-shine') }}";
});

// Star rating
  document.addEventListener('DOMContentLoaded', () => {
    function setupStarRating(tab) {
        const stars = tab.querySelectorAll('.star');
        const reviewRatingInput = tab.querySelector('.review_rating');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = parseInt(star.getAttribute('data-value'));
                if (rating >= 4 && rating <= 5) { // Validate rating between 4 and 5
                    reviewRatingInput.value = rating; // Store the rating value in the hidden input
                    stars.forEach((s, index) => {
                        if (index < rating) {
                            s.classList.add('active');
                        } else {
                            s.classList.remove('active');
                        }
                    });
                } else {
                    alert('Please select a rating between 4 and 5.'); // Show an alert if the rating is out of range
                }
            });

            star.addEventListener('mouseover', () => {
                const rating = parseInt(star.getAttribute('data-value'));
                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('hover');
                    } else {
                        s.classList.remove('hover');
                    }
                });
            });

            star.addEventListener('mouseout', () => {
                stars.forEach(s => {
                    s.classList.remove('hover');
                });
            });
        });
    }

    // Setup star rating for each tab
    document.querySelectorAll('.tab-pane').forEach(tab => {
        setupStarRating(tab);
    });

  // Generate Batch ID & Request Number
  function generateUniqueBatchId() {
      const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      const digits = '0123456789';

      let batchId = '';
      for (let i = 0; i < 2; i++) {
          batchId += letters.charAt(Math.floor(Math.random() * letters.length));
      }
      for (let i = 0; i < 4; i++) {
          batchId += digits.charAt(Math.floor(Math.random() * digits.length));
      }
      return batchId;
  }

  function setBatchAndRequestIds() {
    let uniqueBatchId;
    do {
        uniqueBatchId = generateUniqueBatchId();
    } while (localStorage.getItem(uniqueBatchId)); // Check if ID is unique using localStorage

    localStorage.setItem(uniqueBatchId, true); // Mark this ID as used

    // Set the same batch ID in all batch ID fields
    for (let i = 1; i <= 5; i++) {
        const batchIdField = document.getElementById(`batchId${i}`);
        if (batchIdField) {
            batchIdField.value = uniqueBatchId; // Set the batch ID in all fields
        }
    }

    // Set request IDs in corresponding fields
    for (let i = 1; i <= 5; i++) {
        const requestIdField = document.getElementById(`requestId${i}`);
        if (requestIdField) {
            requestIdField.value = `${uniqueBatchId}${i}`; // Set request ID with batch ID and number
        }
    }
  }

  setBatchAndRequestIds();
  });

$(document).ready(function() {
  // Initial setup
  updateTotalAmount();

  // Add event listeners for amount fields to update the total in real-time
  $('input[name="amount[]"]').on('input', function() {
      updateTotalAmount();
  });

  $('#shinetab1').click(function() {
      let isValid = true;

      // Clear previous error messages
      $('.text-danger').addClass('hide');

      // Validate first form
      isValid &= validateForm('1');

      // If the first form is valid, proceed to the second form
      if (isValid) {
        $('#request_1').removeClass('show active');
        $('#request_2').addClass('show active');

        // Also, update the tab button to show as active
        $('a[href="#request_1"]').removeClass('active');
        $('a[href="#request_2"]').addClass('active');
      }
  });

  $('#shinetab2').click(function() {
    let isValid = true;

    // Clear previous error messages
    $('.text-danger').addClass('hide');
    
    // Validate second form
    isValid &= validateForm('2');

    // If the second form is valid, proceed to the third form
    if (isValid) {
        $('#request_2').removeClass('show active');
        $('#request_3').addClass('show active');

        // Update the tab button to show as active
        $('a[href="#request_2"]').removeClass('active');
        $('a[href="#request_3"]').addClass('active');
    }
  });

  $('#shinetab3').click(function() {
    let isValid = true;

    // Clear previous error messages
    $('.text-danger').addClass('hide');
    
    // Validate third form
    isValid &= validateForm('3');

    // If the third form is valid, proceed to the fourth form
    if (isValid) {
        $('#request_3').removeClass('show active');
        $('#request_4').addClass('show active');

        // Update the tab button to show as active
        $('a[href="#request_3"]').removeClass('active');
        $('a[href="#request_4"]').addClass('active');
    }
  });

  $('#shinetab4').click(function() {
        let isValid = true;

        // Clear previous error messages
        $('.text-danger').addClass('hide');
        
        // Validate fourth form
        isValid &= validateForm('4');

        // If the fourth form is valid, proceed to the fifth form
        if (isValid) {
            $('#request_4').removeClass('show active');
            $('#request_5').addClass('show active');

            // Update the tab button to show as active
            $('a[href="#request_4"]').removeClass('active');
            $('a[href="#request_5"]').addClass('active');
        }
  });

  $('#submitShineForm').click(function() {
        let isValid = true;

        // Clear previous error messages
        $('.text-danger').addClass('hide');
        
        // Validate fifth form
        isValid &= validateForm('5');

        if (isValid) {
            // Collect data from all forms
            const formData = new FormData();

            // formData.append('batch_id', $('#batchId').val());
            // formData.append('user_id', $('#userId').val());

            // Collect form data from each request
            for (let i = 1; i <= 5; i++) {
                collectFormData(formData, i.toString());
            }

            // Submit the form data via AJAX or proceed to the next step
            $.ajax({
                url: 'shine-products',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                // Handle success response with SweetAlert2
                Swal.fire({
                  title: 'Success!',
                  text: 'Your Shine Request submitted successfully! Now complete your Assigne Shine first...',
                  icon: 'success',
                  confirmButtonText: 'OK',
                  customClass: {
                    confirmButton: 'custom-confirm-btn'
                  }
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = '{{ route('my-shine') }}';
                  }
                });
              },
              error: function(response) {
              // Handle error response with SweetAlert2
              Swal.fire({
                title: 'Error!',
                text: 'There was an error submitting your form. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                  confirmButton: 'custom-error-btn'
                }
              });
            }
            });
        }
  });

  function validateForm(formNumber) {
      let isValid = true;

      // Regular expressions for validation
      const numberRegex = /^[\d\s\+\-()]+$/; // Contains numbers
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email pattern
      const urlRegex = /^(https?:\/\/[^\s$.?#].[^\s]*)$/i; // Simple URL pattern

      const productName = $(`#request_${formNumber} #product_name`).val().trim();
      if (productName === "") {
          showError(`request_${formNumber} #product_name`, "Product Name is required.");
          isValid = false;
      } else if (productName.length > 300) {
          showError(`request_${formNumber} #product_name`, "Product Name cannot exceed 300 characters.");
          isValid = false;
      } else if (numberRegex.test(productName)) {
          showError(`request_${formNumber} #product_name`, "Invailid Input.");
          isValid = false;
      } else if (emailRegex.test(productName)) {
          showError(`request_${formNumber} #product_name`, "Product Name cannot contain an email address.");
          isValid = false;
      } else if (urlRegex.test(productName)) {
          showError(`request_${formNumber} #product_name`, "Product Name cannot contain a URL.");
          isValid = false;
      }

      const platform = $(`#request_${formNumber} #platform`).val();
      if (platform === "") {
          showError(`request_${formNumber} #platform`, "Platform is required.");
          isValid = false;
      }

      const productLink = $(`#request_${formNumber} #product_link`).val().trim();
      if (productLink === "" || !isValidURL(productLink)) {
          showError(`request_${formNumber} #product_link`, "Valid Product URL/Link is required.");
          isValid = false;
      }

      const productId = $(`#request_${formNumber} #product_id`).val().trim();
      if (productId === "") {
          showError(`request_${formNumber} #product_id`, "Product ID/ASIN is required.");
          isValid = false;
      } else if (productId.length > 30) {
          showError(`request_${formNumber} #product_id`, "Product ID/ASIN cannot exceed 30 characters.");
          isValid = false;
      } else if (numberRegex.test(productId)) {
          showError(`request_${formNumber} #product_id`, "Invailid Input.");
          isValid = false;
      } else if (emailRegex.test(productId)) {
          showError(`request_${formNumber} #product_id`, "Product ID/ASIN cannot contain an email address.");
          isValid = false;
      } else if (urlRegex.test(productId)) {
          showError(`request_${formNumber} #product_id`, "Product ID/ASIN cannot contain a URL.");
          isValid = false;
      }

      const sellerName = $(`#request_${formNumber} #seller_name`).val().trim();
      if (sellerName === "") {
          showError(`request_${formNumber} #seller_name`, "Seller/Brand Name is required.");
          isValid = false;
      } else if (sellerName.length > 20) {
          showError(`request_${formNumber} #seller_name`, "Seller/Brand Name cannot exceed 20 characters.");
          isValid = false;
      } else if (numberRegex.test(sellerName)) {
          showError(`request_${formNumber} #seller_name`, "Invailid Input.");
          isValid = false;
      } else if (emailRegex.test(sellerName)) {
          showError(`request_${formNumber} #seller_name`, "Seller/Brand Name cannot contain an email address.");
          isValid = false;
      } else if (urlRegex.test(sellerName)) {
          showError(`request_${formNumber} #seller_name`, "Seller/Brand Name cannot contain a URL.");
          isValid = false;
      }

      const searchTerm = $(`#request_${formNumber} #search_term`).val().trim();
      if (searchTerm === "") {
          showError(`request_${formNumber} #search_term`, "Product Search Term is required.");
          isValid = false;
      } else if (searchTerm.length > 200) {
          showError(`request_${formNumber} #search_term`, "Product Search Term cannot exceed 200 characters.");
          isValid = false;
      } else if (numberRegex.test(searchTerm)) {
          showError(`request_${formNumber} #search_term`, "Invailid Input.");
          isValid = false;
      } else if (emailRegex.test(searchTerm)) {
          showError(`request_${formNumber} #search_term`, "Product Search Term cannot contain an email address.");
          isValid = false;
      } else if (urlRegex.test(searchTerm)) {
          showError(`request_${formNumber} #search_term`, "Product Search Term cannot contain a URL.");
          isValid = false;
      }

      const amount = $(`#request_${formNumber} #amount`).val().trim();
      if (amount === "" || isNaN(amount) || parseFloat(amount) <= 0) {
          showError(`request_${formNumber} #amount`, "Valid Product Amount is required.");
          isValid = false;
      }

      const feedbackTitle = $(`#request_${formNumber} #feedback_title`).val().trim();
      if (feedbackTitle === "") {
          showError(`request_${formNumber} #feedback_title`, "Feedback/Review Title is required.");
          isValid = false;
      } else if (feedbackTitle.length > 50) {
          showError(`request_${formNumber} #feedback_title`, "Feedback/Review cannot exceed 50 characters.");
          isValid = false;
      } else if (numberRegex.test(feedbackTitle)) {
          showError(`request_${formNumber} #feedback_title`, "Invailid Input.");
          isValid = false;
      } else if (emailRegex.test(feedbackTitle)) {
          showError(`request_${formNumber} #feedback_title`, "Feedback/Review cannot contain an email address.");
          isValid = false;
      } else if (urlRegex.test(feedbackTitle)) {
          showError(`request_${formNumber} #feedback_title`, "Feedback/Review cannot contain a URL.");
          isValid = false;
      }

      const reviewRating = $(`#request_${formNumber} #review_rating`).val();
      if (reviewRating === "") {
          showError(`request_${formNumber} #review_rating`, "Review Rating is required.");
          isValid = false;
      }
      
      const feedbackComment = $(`#request_${formNumber} #feedback_comment`).val();
          if (feedbackComment === "") {
          showError(`request_${formNumber} #feedback_comment`, "Feedback Comment is required.");
          isValid = false;
      } else if (feedbackComment.length > 300) {
          showError(`request_${formNumber} #feedback_comment`, "Feedback Comment cannot exceed 300 characters.");
          isValid = false;
      } else if (numberRegex.test(feedbackComment)) {
          showError(`request_${formNumber} #feedback_comment`, "Invailid Input.");
          isValid = false;
      } else if (emailRegex.test(feedbackComment)) {
          showError(`request_${formNumber} #feedback_comment`, "Feedback Comment cannot contain an email address.");
          isValid = false;
      } else if (urlRegex.test(feedbackComment)) {
          showError(`request_${formNumber} #feedback_comment`, "Feedback Comment cannot contain a URL.");
          isValid = false;
      }

      return isValid;
  }

  function collectFormData(formData, formNumber) {
      formData.append('batchid[]', $(`#batchId${formNumber}`).val());
      formData.append('request_no[]', $(`#requestId${formNumber}`).val());
      formData.append('product_name[]', $(`#request_${formNumber} #product_name`).val());
      formData.append('platform[]', $(`#request_${formNumber} #platform`).val());
      formData.append('product_link[]', $(`#request_${formNumber} #product_link`).val());
      formData.append('product_id[]', $(`#request_${formNumber} #product_id`).val());
      formData.append('seller_name[]', $(`#request_${formNumber} #seller_name`).val());
      formData.append('search_term[]', $(`#request_${formNumber} #search_term`).val());
      formData.append('amount[]', $(`#request_${formNumber} #amount`).val());
      formData.append('feedback_title[]', $(`#request_${formNumber} #feedback_title`).val());
      formData.append('review_rating[]', $(`#request_${formNumber} #review_rating`).val());
      formData.append('feedback_comment[]', $(`#request_${formNumber} #feedback_comment`).val());
  }

  function showError(elementId, errorMessage) {
      $(`#${elementId}`).siblings('.text-danger').removeClass('hide').text(errorMessage);
  }

  function isValidURL(string) {
      try {
          new URL(string);
          return true;
      } catch (_) {
          return false;
      }
  }

  function updateTotalAmount() {
        let totalAmount = 0;
        $('input[name="amount[]"]').each(function() {
            const amount = parseFloat($(this).val());
            if (!isNaN(amount)) {
                totalAmount += amount;
            }
        });
        $('.btn.btnekomn.btn-sm.amount').text(`₹ ${totalAmount.toFixed(2)}`);
    }

});
</script>
@endsection








////////////////////////////////////////////////////////


@extends('dashboard.layout.app')
@section('content')
@section('title')
New Shine
@endsection

<div class="ek_dashboard">
    <div class="ek_content">
      <div class="card ekcard pa shadow-sm">
        <div class="cardhead" style="text-align: right;">
          <h3 class="cardtitle">New Shine</h3>
          <div>
            <div>
              <label for="fname">
                <h6>Shine Credit :</h6>
              </label>
              <a href="#" class="btn btnekomn btn-sm">₹ 2000</a>
              <label for="fname">
                <h6>Batch Value :</h6>
              </label>
              <a href="#" class="btn btnekomn btn-sm amount">₹ </a>
              <label for="fname">
                <h6>Target Value :</h6>
              </label>
              <a href="#" class="btn btnekomn btn-sm">₹ 1000-2000</a>
              {{-- @section('content')
                <div class="container">
                @if($shineCredits)
                  <a href="#" class="btn btnekomn btn-sm">
                    ₹ {{ $shineCredits->range }}
                  </a>
                @else
                <p>No records found.</p>
                @endif
              </div>
              @endsection --}}
            </div>
          </div>
        </div>
        <div>
          <ul class="nav nav-underline ekom_tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="request_1-tab" href="#request_1" data-bs-toggle="tab" data-bs-target="#request_1" role="tab"
                aria-controls="request_1" aria-selected="true">Request 1</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            {{-- <input type="hidden" class="form-control" name="user_id" id="userId" value="{{ auth()->user()->id }}"> --}}
            <div class="tab-pane fade show active" id="request_1" role="tabpanel" aria-labelledby="request_1-tab"
              tabindex="0">
              <div class="ek_shine">
                {{-- <form action="" methot="post" enctype="multipart/form-data">
                  @csrf --}}
                  <div class="addProductForm">
                    <input type="hidden" class="form-control" name="batch_id[]" id="batchId1">
                    <input type="hidden" class="form-control" name="request_no[]" id="requestId1">
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Name:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                            name="product_name[]" id="product_name" placeholder="Actual product name as listed on the requested platform." required />
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
                            <select class="form-select" name="platform[]" id="platform" required>
                              <option value="" selected>Select One</option>
                              <option value="flipkart">Flipkart</option>
                              <option value="amazon">Amazon</option>
                              <option value="jiomart">JioMart</option>
                              <option value="ajio">Ajio</option>
                              <option value="meesho">Meesho</option>
                              <option value="myntra">Myntra</option>
                              <option value="nykaa">Nykaa</option>
                              <option value="shopsy">Shopsy</option>
                              <option value="website">Website</option>
                              <option value="">Other</option>
                            </select>
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product URL/Link :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_link[]" id="product_link" placeholder="Product page url/link." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control" name="product_id[]" id="product_id" placeholder="Platform specific ID." />
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
                            <input type="text" class="form-control" name="seller_name[]" id="seller_name" placeholder="Your brand/seller name."><span
                              class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-8">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Product Search Term :</span></span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="search_term[]" id="search_term" placeholder="To search your product on requested platform." />
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
                            <input type="text" class="form-control"
                              name="amount[]" id="amount" placeholder="Total product amount." />
                            <span class="text-danger hide">errr message</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-5">
                        <div class="ek_group">
                          <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                          <div class="ek_f_input">
                            <input type="text" class="form-control"
                              name="feedback_title[]" id="feedback_title" placeholder="Title of your feedback review." />
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
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                              </div>
                              <input type="hidden" class="review_rating" name="review_rating"[] id="review_rating" value="">
                              <h6 class="text-danger hide error-message">Error message</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-md-12">
                          <div class="ek_group">
                            <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                            <div class="ek_f_input">
                              <textarea class="form-control"
                                name="feedback_comment[]" id="feedback_comment" placeholder="Share feedback comment or review of your product as you would like it to be published. A genuine feedback is not more than few lines."></textarea>
                              <span class="text-danger hide">errr message</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="saveform_footer">
                        <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab" id="cancelButton">
                          <i class="fas fa-times me-3 fs-13"></i>Cancel
                        </button>
                          <button type="button" class="btn btn-login btnekomn card_f_btn next_Tab" id="shinetab1">Save & Next</button>
                          {{-- <button type="button" class="btn btn-login btnekomn card_f_btn next_Tab">Save & Next</button> --}}
                      </div>
                    </div>
                  </div>
                {{-- </form> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ek_db_footer">&copy; 2024 ekomn.com, All Rights Reserved</div>
@include('dashboard.layout.copyright')
</div>
<script>
// Go Back
document.getElementById('cancelButton').addEventListener('click', function() {
  window.location.href = "{{ route('my-shine') }}";
});

document.addEventListener('DOMContentLoaded', function () {
  let tabCount = 1; // Start with one tab (Request 1)
  const maxTabs = 5; // Maximum number of tabs

  // Event listener for the initial "Add Tab" button
  document.getElementById('shinetab1').addEventListener('click', function () {
    if (tabCount < maxTabs) {
      tabCount++;
      addNewTab(tabCount);
    } else {
      alert('You have reached the maximum number of Request.');
    }
  });

  function addNewTab(count) {
    if (document.querySelector(`#request_${count}`)) return; // Avoid adding duplicate tabs

    // Add a new tab to the nav
    const newTab = document.createElement('li');
    newTab.className = 'nav-item';
    newTab.role = 'presentation';
    newTab.innerHTML = `
      <a class="nav-link" id="request_${count}-tab" href="#request_${count}" data-bs-toggle="tab" data-bs-target="#request_${count}" role="tab"
         aria-controls="request_${count}" aria-selected="false">Request ${count}</a>`;
    document.querySelector('.ekom_tab').appendChild(newTab);

    // Add new tab content
    const newTabContent = document.createElement('div');
    newTabContent.className = 'tab-pane fade';
    newTabContent.id = `request_${count}`;
    newTabContent.role = 'tabpanel';
    newTabContent.ariaLabelledby = `request_${count}-tab`;
    newTabContent.tabIndex = 0;

    newTabContent.innerHTML = `
      <div class="ek_shine">
        <div class="addProductForm">
          <input type="hidden" class="form-control" name="batch_id[]" id="batchId${count}">
          <input type="hidden" class="form-control" name="request_no[]" id="requestId${count}">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="ek_group">
                <label class="eklabel req"><span>Product Name:</span></label>
                <div class="ek_f_input">
                  <input type="text" class="form-control"
                  name="product_name[]" id="product_name" placeholder="Actual product name as listed on the requested platform." required />
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
                  <select class="form-select" name="platform[]" id="platform" required>
                    <option value="" selected>Select One</option>
                    <option value="flipkart">Flipkart</option>
                    <option value="amazon">Amazon</option>
                    <option value="jiomart">JioMart</option>
                    <option value="ajio">Ajio</option>
                    <option value="meesho">Meesho</option>
                    <option value="myntra">Myntra</option>
                    <option value="nykaa">Nykaa</option>
                    <option value="shopsy">Shopsy</option>
                    <option value="website">Website</option>
                    <option value="">Other</option>
                  </select>
                  <span class="text-danger hide">Error message</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="ek_group">
                <label class="eklabel req"><span>Product URL/Link :</span></label>
                <div class="ek_f_input">
                  <input type="text" class="form-control" name="product_link[]" id="product_link" placeholder="Product page url/link." />
                  <span class="text-danger hide">Error message</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="ek_group">
                <label class="eklabel req"><span>Product ID/ASIN:</span></label>
                <div class="ek_f_input">
                  <input type="text" class="form-control" name="product_id[]" id="product_id" placeholder="Platform specific ID." />
                  <span class="text-danger hide">Error message</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <div class="ek_group">
                <label class="eklabel req"><span>Seller/Brand Name :</span></label>
                <div class="ek_f_input">
                  <input type="text" class="form-control" name="seller_name[]" id="seller_name" placeholder="Your brand/seller name.">
                  <span class="text-danger hide">Error message</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-8">
              <div class="ek_group">
                <label class="eklabel req"><span>Product Search Term :</span></label>
                <div class="ek_f_input">
                  <input type="text" class="form-control"
                    name="search_term[]" id="search_term" placeholder="To search your product on requested platform." />
                  <span class="text-danger hide">Error message</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <div class="ek_group">
                <label class="eklabel req"><span>Product amount :</span>
                  <i class="fas fa-info-circle fa-5x me-3 fs-13"
                     title="Share total product amount including shipping charges, if any. Any mismatch may lead to your request getting declined."></i>
                </label>
                <div class="ek_f_input">
                  <input type="text" class="form-control"
                    name="amount[]" id="amount" placeholder="Total product amount." />
                  <span class="text-danger hide">Error message</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-5">
              <div class="ek_group">
                <label class="eklabel req"><span>Feedback/Review Title :</span></label>
                <div class="ek_f_input">
                  <input type="text" class="form-control"
                    name="feedback_title[]" id="feedback_title" placeholder="Title of your feedback review." />
                  <span class="text-danger hide">Error message</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-3">
              <div class="ek_group">
                <label class="eklabel req">Review Rating :</label>
                <div class="star-rating">
                  <span class="star" data-value="1">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="5">&#9733;</span>
                  <input type="hidden" class="review_rating" name="review_rating[]" id="review_rating" value="">
                  <h6 class="text-danger hide error-message">Error message</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="ek_group">
                <label class="eklabel req"><span>Feedback/Review comment :</span></label>
                <div class="ek_f_input">
                  <textarea class="form-control"
                    name="feedback_comment[]" id="feedback_comment" placeholder="Share feedback comment or review of your product as you would like it to be published. A genuine feedback is not more than few lines."></textarea>
                  <span class="text-danger hide">Error message</span>
                </div>
              </div>
            </div>
          </div>
          <div class="saveform_footer">
            <button type="button" class="btn btn-login btnekomn card_f_btn previous_Tab"><i class="fas fa-arrow-left me-3 fs-13"></i>Back</button>${count < 5 ? 
              `<button type="button" class="btn btn-login btnekomn card_f_btn next_Tab" id="shinetab${count}">Save & Next</button>` : 
              `<button type="button" class="btn btn-login btnekomn card_f_btn" id="submitShineForm">Submit</button>`}
          </div>
        </div>
      </div>
    `;
    document.querySelector('.tab-content').appendChild(newTabContent);

    // Activate the newly added tab
    newTab.querySelector('a').click();

    // Add event listener to the new "Save & Next" button or "Submit" button
    if (count < maxTabs) {
      document.getElementById(`shinetab${count}`).addEventListener('click', function () {
        if (tabCount < maxTabs) {
          tabCount++;
          addNewTab(tabCount);
        } else {
          alert('You have reached the maximum number of tabs (5).');
        }
      });
    } else {
      document.getElementById('submitShineForm').addEventListener('click', function () {
        if (validateForm(count)) {
          submitForm();
        }
      });
    }

    const backButton = document.querySelector(`#request_${count} .previous_Tab`);
    if (backButton) {
      backButton.addEventListener('click', function () {
        if (tabCount > 1) {
          tabCount--;
          const previousTab = document.querySelector(`#request_${tabCount}-tab`);
          if (previousTab) {
            previousTab.click();
          }
        }
      });
    }
  }

  function showError(selector, message) {
    const element = document.querySelector(`#${selector}`);
    if (element) {
      const errorSpan = element.parentElement.querySelector('.text-danger');
      if (errorSpan) {
        errorSpan.textContent = message;
        errorSpan.classList.remove('hide');
      }
    }
  }

  function hideErrors() {
    document.querySelectorAll('.text-danger').forEach(span => span.classList.add('hide'));
  }

  function validateForm(formNumber) {
    let isValid = true;
    hideErrors();

    // Regular expressions for validation
    const numberRegex = /^[\d\s\+\-()]+$/; // Contains numbers
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email pattern
    const urlRegex = /^(https?:\/\/[^\s$.?#].[^\s]*)$/i; // Simple URL pattern

    const fields = {
      'product_name': "Product Name",
      'platform': "Platform",
      'product_link': "Product URL/Link",
      'product_id': "Product ID/ASIN",
      'seller_name': "Seller/Brand Name",
      'search_term': "Product Search Term",
      'amount': "Product Amount",
      'feedback_title': "Feedback/Review Title",
      'review_rating': "Review Rating",
      'feedback_comment': "Feedback Comment"
    };

    Object.keys(fields).forEach(field => {
      const value = document.querySelector(`#request_${formNumber} #${field}`).value.trim();
      const fieldLabel = fields[field];
      
      if (value === "") {
        showError(`${field}`, `${fieldLabel} is required.`);
        isValid = false;
      } else if (value.length > 300) {
        showError(`${field}`, `${fieldLabel} cannot exceed 300 characters.`);
        isValid = false;
      } else if (numberRegex.test(value)) {
        showError(`${field}`, `Invalid ${fieldLabel}.`);
        isValid = false;
      } else if (emailRegex.test(value)) {
        showError(`${field}`, `${fieldLabel} cannot contain an email address.`);
        isValid = false;
      } else if (urlRegex.test(value)) {
        showError(`${field}`, `${fieldLabel} cannot contain a URL.`);
        isValid = false;
      }
    });

    const amount = document.querySelector(`#request_${formNumber} #amount`).value.trim();
    if (amount === "" || isNaN(amount) || parseFloat(amount) <= 0) {
      showError(`amount`, "Valid Product Amount is required.");
      isValid = false;
    }

    return isValid;
  }

  function submitForm() {
    const formData = new FormData();
    document.querySelectorAll('.tab-pane').forEach(tab => {
      const inputs = tab.querySelectorAll('input, select, textarea');
      inputs.forEach(input => {
        formData.append(input.name, input.value);
      });
    });

    $.ajax({
      url: 'shine-products',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        alert('Your Shine Request submitted successfully!');
        window.location.href = '{{ route('my-shine') }}'; // Use Laravel's route helper
      },
      error: function(response) {
        alert('Error submitting form.');
      }
    });
  }

  // Initialize the first tab as active
  document.querySelector('#request_1-tab').click();
});
</script>
@endsection
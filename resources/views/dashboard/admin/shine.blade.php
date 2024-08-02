@extends('dashboard.layout.app')

@section('content')
@section('title')
Shine
@endsection

<div class="ek_dashboard">
    <div class="ek_content">
      <div class="card ekcard pa shadow-sm">
        <div class="cardhead ">
          <h3 class="cardtitle">Shine</h3>
        </div>
        <div>
          <ul class="nav nav-underline ekom_tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="shine-tab" data-bs-toggle="tab" data-bs-target="#shine" role="tab"
                aria-controls="shine" aria-selected="true">Requested Shine</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="assigned-tab" data-bs-toggle="tab" data-bs-target="#assigned" role="tab"
                aria-controls="assigned" aria-selected="false">Assigned Shine</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="shine" role="tabpanel" aria-labelledby="shine-tab" tabindex="0">
              <div class="tableTop">
                <input type="text" class="form-control w_300_f searchicon"
                  placeholder="Search with Product Title, SKU, Product ID">
                <div class="filter">
                  <div class="ek_group m-0">
                    <label class="eklabel w_50_f">Sort by:</label>
                    <div class="ek_f_input">
                      <select class="form-select">
                        <option value="Completed" selected>Completed</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Inprogress">Inprogress</option>
                        <option value="Pending">Pending</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ek_shine">
                <div class="multtable" style="border: 1px solid #d6d6d6;">
                    <div class="cardhead mt-2 ms-2 me-2" style="text-align: right;">
                        <h6>Batch ID : <a href="#">AB4362</a></h6>
                      <div>
                        <div>
                          <label for="fname">
                            <h6>Shine Credit :</h6>
                          </label>
                          <a href="#" class="btn btnekomn btn-sm">₹ 2000</a>
                          <label for="fname">
                            <h6>Batch Value :</h6>
                          </label>
                          <a href="#" class="btn btnekomn btn-sm">₹ 2000</a>
                        </div>
                      </div>
                    </div>
                  <div class="table-responsive tres_border">
                    <table class="normalTable tableSorting whitespace">
                      <thead>
                        <tr>
                          <th>Request No
                            <span class="sort_pos">
                              <small class="sort_t"><i class="fas fa-caret-up"></i><i
                                  class="fas fa-caret-down"></i></small>
                            </span>
                          </th>
                          <th>Requestor ID</th>
                          <th>Assigner ID</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <!-- <td>EK001</td> -->
                          <td>AB43621</td>
                          <td>S1001</td>
                          <td>A1001</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="multtable mt-4" style="border: 1px solid #d6d6d6;">
                    <div class="cardhead mt-2 ms-2 me-2" style="text-align: right;">
                        <h6>Batch ID : <a href="#">AB4362</a></h6>
                      <div>
                        <div>
                          <label for="fname">
                            <h6>Shine Credit :</h6>
                          </label>
                          <a href="#" class="btn btnekomn btn-sm">₹ 2000</a>
                          <label for="fname">
                            <h6>Batch Value :</h6>
                          </label>
                          <a href="#" class="btn btnekomn btn-sm">₹ 2000</a>
                        </div>
                      </div>
                    </div>
                  <div class="table-responsive tres_border">
                    <table class="normalTable tableSorting whitespace">
                      <thead>
                        <tr>
                          <th>Platform</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Men Shoes</td>
                          <td>Flipkart</td>
                          <td>
                            <button class="btn btn-link btn-sm">Edit</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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
            <div class="tab-pane fade" id="assigned" role="tabpanel" aria-labelledby="assigned-tab" tabindex="0">
              <div class="cardhead">
                <h4 class="cardtitle">Assigned Requests</h4>
                <!-- <div style="margin: 0; margin-left: 10px; display: inline-block;">
                  <label for="fname"><h5>Assigned Value :</h5></label>
                  <a href="#" class="btn btnekomn btn-sm">₹ 2000
                  </a>
                </div> -->
              </div>
              <div class="table-responsive tres_border">
                <table class="normalTable tableSorting whitespace">
                  <thead>
                    <tr>
                      <th>Request No
                        <span class="sort_pos">
                          <small class="sort_t"><i class="fas fa-caret-up"></i><i class="fas fa-caret-down"></i></small>
                        </span>
                      </th>
                      <th>Requestor ID
                        <span class="sort_pos">
                          <small class="sort_t"><i class="fas fa-caret-up"></i><i class="fas fa-caret-down"></i></small>
                        </span>
                      </th>
                      <th>Assigner ID</th>
                      <th>Batch ID</th>
                      <th>Product Name</th>
                      <th>Platform</th>
                      <th>Product URL/Link</th>
                      <th>Product ID/ASIN</th>
                      <th>Seller/Brand Name</th>
                      <th>Product Search Term </th>
                      <th>Product amount</th>
                      <th>Feedback/Review Title</th>
                      <th>Feedback/Review comment</th>
                      <th>Review Rating</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>EK001</td>
                      <td>AB43621</td>
                      <td>S1001</td>
                      <td>A1001</td>
                      <td>Men Shoes</td>
                      <td>Flipkart</td>
                      <td>
                        <a target="_blank" href="#">Product Link</a>
                      </td>
                      <td>
                        EK501IND
                      </td>
                      <td>PUMA</td>
                      <td>Puma Men Shoes</td>
                      <td>₹ 3999 </td>
                      <td>Best product</td>
                      <td>XYZ</td>
                      <td>5</td>
                      <td>
                        <span
                          style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Completed</span>
                        <span
                          style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Cancelled</span>
                        <span
                          style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Inprogress</span>
                        <span
                          style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Pending</span>
                      </td>
                      <td>
                        <button class="btn btn-link btn-sm">Edit</button>
                      </td>
                    </tr>
                    <tr>
                      <td>EK002</td>
                      <td>AB43622</td>
                      <td>S1002</td>
                      <td>A1002</td>
                      <td>Women Shoes</td>
                      <td>Amazon</td>
                      <td>
                        <a target="_blank" href="#">Product Link</a>
                      </td>
                      <td>
                        EK502IND
                      </td>
                      <td>Nike</td>
                      <td>Nike Women Shoes</td>
                      <td>₹ 2499</td>
                      <td>Best brand</td>
                      <td>XYZ</td>
                      <td>5</td>
                      <td>
                        <span
                          style='padding: 3px 7px; border-radius: 3px; background-color: #28a745; color: #fff;'>Completed</span>
                        <span
                          style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Cancelled</span>
                        <span
                          style='padding: 3px 7px; border-radius: 3px; background-color: #ffc107; color: #000;'>Inprogress</span>
                        <span
                          style='padding: 3px 7px; border-radius: 3px; background-color: #dc3545; color: #fff;'>Pending</span>
                      </td>
                      <td>
                        <button class="btn btn-link btn-sm">Edit</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@include('dashboard.layout.copyright')
</div>
@endsection

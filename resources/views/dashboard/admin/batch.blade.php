@extends('dashboard.layout.app')

@section('content')
<div class="ek_dashboard">
    <div class="ek_content">
        <div class="card ekcard pa shadow-sm">
            <div class="cardhead">
                <h3 class="cardtitle">Shine Batch : {{ $batch_id }}</h3>
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
                            <th>Assigner ID
                              <span class="sort_pos">
                                  <small class="sort_t"><i class="fas fa-caret-up"></i><i class="fas fa-caret-down"></i></small>
                              </span>
                            </th>
                            <th>Date</th>
                            <th>Shine Value</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->request_no }}</td>
                        <td>{{ $product->assigner_id }}</td>
                        <td>{{ $product->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $product->amount }}</td>
                      <td>@php
                        $statusLabels = [
                          0 => ['label' => 'Draft', 'bgColor' => '#6c757d', 'color' => '#fff'],
                          1 => ['label' => 'Pending', 'bgColor' => '#ffc107', 'color' => '#000'],
                          2 => ['label' => 'Inprogress', 'bgColor' => '#17a2b8', 'color' => '#fff'],
                          3 => ['label' => 'Order Placed', 'bgColor' => '#007bff', 'color' => '#fff'],
                          4 => ['label' => 'Order Confirm', 'bgColor' => '#28a745', 'color' => '#fff'],
                          5 => ['label' => 'Review Submitted', 'bgColor' => '#ffc107', 'color' => '#000'],
                          6 => ['label' => 'Complete', 'bgColor' => '#28a745', 'color' => '#fff'],
                          7 => ['label' => 'Cancelled', 'bgColor' => '#dc3545', 'color' => '#fff']
                        ];
                      @endphp
                      @php
                        $status = $statusLabels[$product->status] ?? ['label' => 'Unknown', 'bgColor' => '#000', 'color' => '#fff'];
                      @endphp
                        <span style="padding: 3px 7px; border-radius: 3px; background-color: {{ $status['bgColor'] }}; color: {{ $status['color'] }};">
                          {{ $status['label'] }}
                        </span>
                      </td>
                        <td>
                          <a href="{{ route('shine-status', $product->id) }}" class="btn btnekomn btn-sm">View Details</a>
                        </td>
                    </tr>
                    @endforeach
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
                        <option value="5">5</option>
                        <option selected value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                    </select>
                </div>
            </div>
            <!-- end pegination -->
        </div>
    </div>
    @include('dashboard.layout.copyright')
</div>
@endsection
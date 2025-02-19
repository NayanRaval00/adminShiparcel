@extends('layouts.admin')

@section('title', 'User Courier Rate')

@section('content')
<div class="dashboard-main-body">
    @foreach($formattedSlabs as $index => $slab)
    @php
    $surfaceTabId = "pills-to-do-list-" . $index;
    $airTabId = "pills-recent-leads-" . $index;
    $surfaceTabContentId = "pills-to-do-list-content-" . $index;
    $airTabContentId = "pills-recent-leads-content-" . $index;
    @endphp

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Edit Courier Rate Slab</h5>
            <h5 class="card-title mb-0">
                {{ $slab['company_name'] }} -
                <span>{{ $slab['weight_slab'].' KG' ?? 'Unknown Slab' }}</span>
            </h5>
        </div>

        <div class="col-xxl-12 col-xl-12">
            <div class="card h-100">
                <div class="card-body p-24">
                    <div class="d-flex flex-wrap align-items-center gap-1 justify-content-between mb-16">
                        <ul class="nav border-gradient-tab nav-pills mb-0" id="pills-tab-{{ $index }}" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center active" id="{{ $surfaceTabId }}"
                                    data-bs-toggle="pill" data-bs-target="#{{ $surfaceTabContentId }}" type="button"
                                    role="tab" aria-controls="{{ $surfaceTabContentId }}" aria-selected="true">
                                    Surface
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center" id="{{ $airTabId }}"
                                    data-bs-toggle="pill" data-bs-target="#{{ $airTabContentId }}" type="button"
                                    role="tab" aria-controls="{{ $airTabContentId }}" aria-selected="false">
                                    Air
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent-{{ $index }}">
                        <!-- Surface Tab Content -->
                        <div class="tab-pane fade active show" id="{{ $surfaceTabContentId }}" role="tabpanel"
                            aria-labelledby="{{ $surfaceTabId }}" tabindex="0">
                            <div class="table-responsive scroll-sm">
                                <table class="table bordered-table sm-table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Zone</th>
                                            <th scope="col">Forward - (FWD)</th>
                                            <th scope="col">Additional - (FWD)</th>
                                            <th scope="col">Forward - (RTO)</th>
                                            <th scope="col">Additional - (RTO)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(['A', 'B', 'C', 'D', 'E'] as $zone)
                                        <tr>
                                            <td>{{ $zone }}</td>
                                            <td><input type="text" class="form-control form-control-sm"></td>
                                            <td><input type="text" class="form-control form-control-sm"></td>
                                            <td><input type="text" class="form-control form-control-sm"></td>
                                            <td><input type="text" class="form-control form-control-sm"></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Air Tab Content -->
                        <div class="tab-pane fade" id="{{ $airTabContentId }}" role="tabpanel"
                            aria-labelledby="{{ $airTabId }}" tabindex="0">
                            <div class="table-responsive scroll-sm">
                                <table class="table bordered-table sm-table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Zone</th>
                                            <th scope="col">Forward - (FWD)</th>
                                            <th scope="col">Additional - (FWD)</th>
                                            <th scope="col">Forward - (RTO)</th>
                                            <th scope="col">Additional - (RTO)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(['A', 'B', 'C', 'D', 'E'] as $zone)
                                        <tr>
                                            <td>{{ $zone }}</td>
                                            <td><input type="text" class="form-control form-control-sm"></td>
                                            <td><input type="text" class="form-control form-control-sm"></td>
                                            <td><input type="text" class="form-control form-control-sm"></td>
                                            <td><input type="text" class="form-control form-control-sm"></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- End Tabs -->
                </div>
            </div>
        </div>
    </div>
    @endforeach



</div>
<!-- jQuery (must be included before Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    });
</script>
@endsection
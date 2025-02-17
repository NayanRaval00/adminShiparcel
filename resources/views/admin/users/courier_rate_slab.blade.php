@extends('layouts.admin')

@section('title', 'User Charges')

@section('content')
    <div class="dashboard-main-body">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Edit Courier rate Slab</h5>
                <h5 class="card-title mb-0">Delhivery - <span>.5KG</span></h5>
            </div>
            <div class="col-xxl-12 col-xl-12">
                <div class="card h-100">
                    <div class="card-body p-24">

                        <div class="d-flex flex-wrap align-items-center gap-1 justify-content-between mb-16">
                            <ul class="nav border-gradient-tab nav-pills mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-flex align-items-center active" id="pills-to-do-list-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-to-do-list" type="button"
                                        role="tab" aria-controls="pills-to-do-list" aria-selected="true">
                                        Surface
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-flex align-items-center" id="pills-recent-leads-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-recent-leads" type="button"
                                        role="tab" aria-controls="pills-recent-leads" aria-selected="false"
                                        tabindex="-1">
                                        Air
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-to-do-list" role="tabpanel"
                                aria-labelledby="pills-to-do-list-tab" tabindex="0">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Zone </th>
                                                <th scope="col">Forward - (FWD)</th>
                                                <th scope="col">Additional - (FWD)</th>
                                                <th scope="col">Forward - (RTO)</th>
                                                <th scope="col">Additional - (RTO)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>A</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>B</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>C</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>D</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>E</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-recent-leads" role="tabpanel"
                                aria-labelledby="pills-recent-leads-tab" tabindex="0">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Zone </th>
                                                <th scope="col">Forward - (FWD)</th>
                                                <th scope="col">Additional - (FWD)</th>
                                                <th scope="col">Forward - (RTO)</th>
                                                <th scope="col">Additional - (RTO)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>A</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>B</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>C</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>D</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>E</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Edit Courier rate Slab</h5>
                <h5 class="card-title mb-0">Delhivery - <span>1KG</span></h5>
            </div>
            <div class="col-xxl-12 col-xl-12">
                <div class="card h-100">
                    <div class="card-body p-24">

                        <div class="d-flex flex-wrap align-items-center gap-1 justify-content-between mb-16">
                            <ul class="nav border-gradient-tab nav-pills mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-flex align-items-center active" id="pills-to-do-list-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-to-do-list" type="button"
                                        role="tab" aria-controls="pills-to-do-list" aria-selected="true">
                                        Surface
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link d-flex align-items-center" id="pills-recent-leads-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-recent-leads" type="button"
                                        role="tab" aria-controls="pills-recent-leads" aria-selected="false"
                                        tabindex="-1">
                                        Air
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-to-do-list" role="tabpanel"
                                aria-labelledby="pills-to-do-list-tab" tabindex="0">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Zone </th>
                                                <th scope="col">Forward - (FWD)</th>
                                                <th scope="col">Additional - (FWD)</th>
                                                <th scope="col">Forward - (RTO)</th>
                                                <th scope="col">Additional - (RTO)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>A</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>B</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>C</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>D</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>E</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-recent-leads" role="tabpanel"
                                aria-labelledby="pills-recent-leads-tab" tabindex="0">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Zone </th>
                                                <th scope="col">Forward - (FWD)</th>
                                                <th scope="col">Additional - (FWD)</th>
                                                <th scope="col">Forward - (RTO)</th>
                                                <th scope="col">Additional - (RTO)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>A</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>B</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>C</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>D</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                            <tr>
                                                <td>E</td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" class="form-control form-control-sm"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (must be included before Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#multiple-select-field').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            });
        });
    </script>
@endsection

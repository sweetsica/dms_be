@extends('template.master')
{{-- Trang chủ admin --}}
@section('title', 'Bảng điều khiển')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

@endsection
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft1')

    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container">
                    <div class="mainSection_heading">

                        <h5 class="mainSection_heading-title">Nhật trình công việc</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="card-title">Mục tiêu nhiệm vụ cá nhân</div>
                                            <div class="mainSection_total-kpi">
                                                <span>Tổng KPI cá nhân tạm tính:</span>
                                                <strong>0</strong>

                                                <span>KPI</span>
                                            </div>
                                            <div class="mainSection_total-kpi">
                                                Tổng KPI thực tế:
                                                <strong>0</strong>

                                                KPI
                                            </div>
                                        </div>

                                        <div class="action_wrapper">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <form method="GET" action="/">
                                                    @foreach (request()->query() as $key => $value)
                                                        @if ($key != 'q1' && $key != 'p1' && $key != 'p2')
                                                            <input type="hidden" name="{{ $key }}"
                                                                value="{{ $value }}">
                                                        @endif
                                                    @endforeach
                                                    <div class="form-group has-search">
                                                        <span type="submit"
                                                            class="bi bi-search form-control-feedback fs-5"></span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Tìm kiếm nhiệm vụ"
                                                            value="{{ request()->get('q1') }}" name="q1">
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="action_export ms-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Lọc">
                                                <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#filterUser">
                                                    <i class="bi bi-funnel"></i>
                                                </button>
                                            </div>
                                            <div class="action_export ms-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Xuất file Excel">
                                                <a role="button" target="_blank" href="#" class="btn-export"><i
                                                        class="bi bi-download"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="table_wrapper">
                                        <div class="table-responsive">
                                            <table id="main_table" class="table table_style-fix m-0 bg-blue-blur"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th colspan="4" class="text-center bg-white position-sticky"
                                                            style="left:0">Mục tiêu nhiệm vụ tháng 08
                                                        </th>
                                                        <th colspan="{{ cal_days_in_month(CAL_GREGORIAN, 8, 2023) }}"
                                                            class="bg-white text-center">Nhật kí công việc
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap text-center bg-blue-blur position-sticky"
                                                            style="left:0px">
                                                            <div style="width:30px">
                                                                STT
                                                            </div>
                                                        </th>
                                                        <th class="text-nowrap bg-blue-blur position-sticky"
                                                            style="left:38px">
                                                            <div style="width:160px">
                                                                Mục tiêu nhiệm vụ
                                                            </div>
                                                        </th>
                                                        <th class="text-nowrap bg-blue-blur position-sticky"
                                                            style="left:206px">
                                                            <div style="width:50px">
                                                                Thời hạn
                                                            </div>
                                                        </th>
                                                        @for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, 8, 2023); $i++)
                                                            @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 6)
                                                                <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                    scope="col"
                                                                    class="bg-warning bg-opacity-10 text-warning">
                                                                    {{ $i + 1 }}
                                                                </th>
                                                            @elseif (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 7)
                                                                <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                    scope="col"
                                                                    class="bg-danger bg-opacity-10 text-danger">
                                                                    {{ $i + 1 }}
                                                                </th>
                                                            @else
                                                                <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                    scope="col">{{ $i + 1 }}</th>
                                                            @endif
                                                        @endfor
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-nowrap bg-blue-blur position-sticky"
                                                            style="left: 0px">
                                                            <div class="text-center">
                                                                1
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap bg-blue-blur position-sticky"
                                                            style="left: 38px">
                                                            <div class="justify-content-start targetDetailModalBtn"
                                                                data-bs-toggle="modal" data-bs-target="#targetDetailModal"
                                                                role="button">
                                                                <div class="text-nowrap d-block text-truncate"
                                                                    style="width:160px;" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" data-bs-original-title="Tên">
                                                                    Tên
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap bg-blue-blur position-sticky"
                                                            style="left: 206px">
                                                            <div class="text-center">
                                                                01/01/2001
                                                            </div>
                                                        </td>
                                                        @for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, 8, 2023); $i++)
                                                            <td style="width: 20px;height:20px; border:1px solid #dee2e6;"
                                                                @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 7) class="bg-danger bg-opacity-10 text-danger" @endif
                                                                @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 6) class="bg-warning bg-opacity-10 text-warning" @endif
                                                                @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) != 7) data-bs-toggle="modal"
                                                                data-bs-target="#targetLogModal"
                                                                data-display-date="{{ $i + 1 . ' - ' . 8 . ' - ' . 2023 }}"
                                                                role="button" @endif>
                                                                <div class="content_table">
                                                                    x
                                                                </div>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{-- <nav aria-label="Page navigation example" class="mt-3">
                                            <ul class="pagination">
                                                @foreach ($myAssignedTasks->meta->links as $link)
                                                    <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ getPaginationLink($link, 'p1') }}">
                                                            <span aria-hidden="true">{!! $link->label !!}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </nav> --}}
                                    </div>
                                    <div class="table_wrapper">
                                        <div class="table-responsive mt-3">
                                            <table id="two_table" class="table table_style-fix m-0 bg-yellow-blur"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-nowrap text-center bg-yellow-blur position-sticky"
                                                            style="left:0px">
                                                            <div style="width:30px">
                                                                STT
                                                            </div>
                                                        </th>
                                                        <th class="text-nowrap bg-yellow-blur  position-sticky"
                                                            style="left:38px">
                                                            <div style="width:160px">
                                                                Mục tiêu nhiệm vụ phát sinh
                                                            </div>
                                                        </th>
                                                        <th class="text-nowrap bg-yellow-blur  position-sticky"
                                                            style="left:206px">
                                                            <div style="width:50px">
                                                                Thời hạn
                                                            </div>
                                                        </th>
                                                        @for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, 8, 2023); $i++)
                                                            @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 6)
                                                                <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                    scope="col"
                                                                    class="bg-warning bg-opacity-10 text-warning">
                                                                    {{ $i + 1 }}
                                                                </th>
                                                            @elseif (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 7)
                                                                <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                    scope="col"
                                                                    class="bg-danger bg-opacity-10 text-danger">
                                                                    {{ $i + 1 }}
                                                                </th>
                                                            @else
                                                                <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                    scope="col">{{ $i + 1 }}</th>
                                                            @endif
                                                        @endfor
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-nowrap bg-yellow-blur position-sticky"
                                                            style="left: 0px">
                                                            <div class="text-center">
                                                                1
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap bg-yellow-blur position-sticky"
                                                            style="left: 38px">
                                                            <div class=" justify-content-start reportTaskModalBtn"
                                                                data-bs-toggle="modal" data-bs-target="#reportTaskModal"
                                                                role="button">
                                                                <div class="text-nowrap d-block text-truncate"
                                                                    style="max-width:160px;" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" data-bs-original-title="Tên">
                                                                    Tên
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap bg-yellow-blur position-sticky"
                                                            style="left: 206px">
                                                            <div class="text-center">
                                                                01/01/2001
                                                            </div>
                                                        </td>
                                                        @for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, 8, 2023); $i++)
                                                            <td style="width: 20px;height:20px; border:1px solid #dee2e6;"
                                                                @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 7) class="bg-danger bg-opacity-10 text-danger" @endif
                                                                @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 6) class="bg-warning bg-opacity-10 text-warning" @endif
                                                                @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) != 7) data-bs-toggle="modal"
                                                                data-bs-target="#reportTaskLogModal"
                                                                data-display-date="{{ $i + 1 . ' - ' . 8 . ' - ' . 2023 }}"
                                                                role="button" @endif>
                                                                <div class="content_table">
                                                                    x
                                                                </div>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{-- <nav aria-label="Page navigation example" class="mt-3">
                                            <ul class="pagination">
                                                @foreach ($reportTasks->links as $link)
                                                    <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ getPaginationLink($link, 'p2') }}">
                                                            <span aria-hidden="true">{!! $link->label !!}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </nav> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="card-title">Báo cáo của đơn vị</div>
                                            <div class="mainSection_total-kpi">
                                                <span>Tổng KPI cá nhân tạm tính:</span>
                                                <strong>0</strong>
                                                <span>KPI</span>
                                            </div>
                                            <div class="mainSection_total-kpi">
                                                Tổng KPI thực tế:
                                                <strong>0</strong>
                                                KPI
                                            </div>
                                            <a class="" href="#" type="button" style="padding-left: 12px">

                                                <button type="button" stu class="btn btn-outline-danger"
                                                    data-bs-dismiss="modal">Xem tổng báo cáo</button>
                                            </a>

                                        </div>

                                        <div class="action_wrapper">


                                            <div class="d-flex justify-content-between align-items-center">
                                                <form method="GET" action="/">
                                                    @foreach (request()->query() as $key => $value)
                                                        @if ($key != 'q2' && $key != 'p3' && $key != 'p4')
                                                            <input type="hidden" name="{{ $key }}"
                                                                value="{{ $value }}">
                                                        @endif
                                                    @endforeach
                                                    <div class="form-group has-search">
                                                        <span type="submit"
                                                            class="bi bi-search form-control-feedback fs-5"></span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Tìm kiếm nhiệm vụ"
                                                            value="{{ request()->get('q2') }}" name="q2">
                                                    </div>
                                                </form>
                                            </div>


                                            <div class="action_export ms-3" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Lọc">
                                                <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#filterAdmin"><i class="bi bi-funnel"></i>
                                                </button>
                                            </div>
                                            <div class="action_export ms-3" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Xuất file Excel">
                                                <a role="button" target="_blank" href="#" class="btn-export"><i
                                                        class="bi bi-download"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="table_wrapper">
                                        <div class="mt-3 bg-white">
                                            <div class="table-responsive">
                                                <table id="three_table" class="table table_style-fix m-0 bg-blue-blur"
                                                    style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="4"
                                                                class="bg-white text-center position-sticky"
                                                                style="left:0">Mục tiêu nhiệm vụ tháng
                                                                {{ 8 . '/' . 2023 }}
                                                            </th>
                                                            <th colspan="{{ cal_days_in_month(CAL_GREGORIAN, 8, 2023) }}"
                                                                class="bg-white text-center">Nhật kí công việc
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-nowrap text-center bg-blue-blur position-sticky"
                                                                style="left: 0px">
                                                                <div style="width:30px">
                                                                    STT
                                                                </div>
                                                            </th>
                                                            <th class="text-nowrap bg-blue-blur position-sticky"
                                                                style="left: 38px">
                                                                <div style="width:160px">
                                                                    Mục tiêu nhiệm vụ
                                                                </div>
                                                            </th>
                                                            <th class="text-nowrap bg-blue-blur position-sticky"
                                                                style="left: 206px">
                                                                <div style="width:50px">
                                                                    Thời hạn
                                                                </div>
                                                            </th>
                                                            @for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, 8, 2023); $i++)
                                                                @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 6)
                                                                    <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                        scope="col"
                                                                        class="bg-warning bg-opacity-10 text-warning">
                                                                        {{ $i + 1 }}
                                                                    </th>
                                                                @elseif (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 7)
                                                                    <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                        scope="col"
                                                                        class="bg-danger bg-opacity-10 text-danger">
                                                                        {{ $i + 1 }}
                                                                    </th>
                                                                @else
                                                                    <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                        scope="col">{{ $i + 1 }}</th>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-nowrap bg-blue-blur position-sticky"
                                                                style="left:0px">
                                                                <div class="text-center">
                                                                    1
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap bg-blue-blur position-sticky"
                                                                style="left:38px">
                                                                <div class="justify-content-start targetDetailModalBtn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#targetDetailModal" role="button">
                                                                    <div class="text-nowrap d-block text-truncate"
                                                                        style="max-width:160px;" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Tên">
                                                                        Tên
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap bg-blue-blur position-sticky"
                                                                style="left:206px">
                                                                <div class="text-center">
                                                                    01/01/2001
                                                                </div>
                                                            </td>
                                                            @for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, 8, 2023); $i++)
                                                                <td style="width: 20px;height:20px; border:1px solid #dee2e6;"
                                                                    @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 7) class="bg-danger bg-opacity-10 text-danger" @endif
                                                                    @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 6) class="bg-warning bg-opacity-10 text-warning" @endif
                                                                    @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) != 7) data-bs-toggle="modal"
                                                                        data-bs-target="#targetLogModal"
                                                                        data-display-date="{{ $i + 1 . ' - ' . 8 . ' - ' . 2023 }}"
                                                                        role="button" @endif>
                                                                    <div class="content_table">
                                                                        x
                                                                    </div>
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            {{-- <nav aria-label="Page navigation example" class="mt-3">
                                                <ul class="pagination">
                                                    @foreach ($listAssignedTasks->meta->links as $link)
                                                        <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                            <a class="page-link"
                                                                href="{{ getPaginationLink($link, 'p3') }}">
                                                                <span aria-hidden="true">{!! $link->label !!}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </nav> --}}
                                        </div>

                                        <div class="table_wrapper">

                                            <div class="table-responsive mt-3">
                                                <table id="four_table" class="table table_style-fix m-0 bg-yellow-blur"
                                                    style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-nowrap text-center bg-yellow-blur position-sticky"
                                                                style="left: 0px">
                                                                <div style="width:30px">
                                                                    STT
                                                                </div>
                                                            </th>
                                                            <th class="text-nowrap bg-yellow-blur position-sticky"
                                                                style="left: 38px">
                                                                <div style="width:160px">
                                                                    Mục tiêu nhiệm vụ phát sinh
                                                                </div>
                                                            </th>
                                                            <th class="text-nowrap bg-yellow-blur position-sticky"
                                                                style="left: 206px">
                                                                <div style="width:50px">
                                                                    Thời hạn
                                                                </div>
                                                            </th>
                                                            @for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, 8, 2023); $i++)
                                                                @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 6)
                                                                    <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                        scope="col"
                                                                        class="bg-warning bg-opacity-10 text-warning">
                                                                        {{ $i + 1 }}
                                                                    </th>
                                                                @elseif (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 7)
                                                                    <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                        scope="col"
                                                                        class="bg-danger bg-opacity-10 text-danger">
                                                                        {{ $i + 1 }}
                                                                    </th>
                                                                @else
                                                                    <th style="padding: 0 14px; border:1px solid #dee2e6;"
                                                                        scope="col">{{ $i + 1 }}</th>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- fixed-side bg-yellow-blur --}}
                                                        <tr>
                                                            <td class="text-nowrap bg-yellow-blur position-sticky"
                                                                style="left: 0px">
                                                                <div class="text-center">
                                                                    x
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap bg-yellow-blur position-sticky"
                                                                style="left: 38px">
                                                                <div class=" justify-content-start reportTaskModalBtn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#reportTaskModal" role="button">
                                                                    <div class="text-nowrap d-block text-truncate"
                                                                        style="max-width:160px;" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        data-bs-original-title="Tên">
                                                                        Tên
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap bg-yellow-blur position-sticky"
                                                                style="left: 206px">
                                                                <div class="text-center">
                                                                    01/01/2001
                                                                </div>
                                                            </td>
                                                            @for ($i = 0; $i < cal_days_in_month(CAL_GREGORIAN, 8, 2023); $i++)
                                                                <td style="width: 20px;height:20px; border:1px solid #dee2e6;"
                                                                    @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 7) class="bg-danger bg-opacity-10 text-danger" @endif
                                                                    @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) == 6) class="bg-warning bg-opacity-10 text-warning" @endif
                                                                    @if (date('N', strtotime(2023 . '-' . 8 . '-' . $i + 1)) != 7) data-bs-toggle="modal"
                                                                        data-bs-target="#reportTaskLogModal"
                                                                        data-display-date="{{ $i + 1 . ' - ' . 8 . ' - ' . 2023 }}"
                                                                        role="button" @endif>
                                                                    <div class="content_table">
                                                                        x

                                                                    </div>
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            {{-- <nav aria-label="Page navigation example" class="mt-3">
                                                <ul class="pagination">
                                                    @foreach ($reportTaskAdmin->links as $link)
                                                        <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                            <a class="page-link"
                                                                href="{{ getPaginationLink($link, 'p4') }}">
                                                                <span aria-hidden="true">{!! $link->label !!}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </nav> --}}
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card-title">Danh sách vấn đề</div>
                                        </div>

                                        <div class="action_wrapper">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <form method="GET" action="/">
                                                    @foreach (request()->query() as $key => $value)
                                                        @if ($key != 'q3' && $key != 'p5')
                                                            <input type="hidden" name="{{ $key }}"
                                                                value="{{ $value }}">
                                                        @endif
                                                    @endforeach
                                                    <div class="form-group has-search">
                                                        <span type="submit"
                                                            class="bi bi-search form-control-feedback fs-5"></span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Tìm kiếm vấn đề"
                                                            value="{{ request()->get('q3') }}" name="q3">
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="action_export ms-3" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Lọc">
                                                <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#cauHinhDanhSachVanDe"><i
                                                        class="bi bi-funnel"></i></button>
                                            </div>


                                            <div onclick="handleExportExcel()" class="action_export ms-3"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Xuất file Excel">
                                                <a role="button" target="_blank" href="#" class="btn-export">
                                                    <i class="bi bi-download"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="table-responsive">
                                        <table id="dsVanDe" class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap" style="width: 2%">STT</th>
                                                    <th class="text-nowrap" style="width: 20%">
                                                        <div class="d-flex justify-content-between">
                                                            Vấn đề tồn đọng
                                                        </div>
                                                    </th>
                                                    <th class="text-nowrap" style="width: 8%">
                                                        Phân loại
                                                    </th>
                                                    <th class="text-nowrap" style="width: 10%">Người nêu</th>
                                                    <th class="text-nowrap" style="width: 15%">Nguyên nhân</th>
                                                    <th class="text-nowrap" style="width: 15%">
                                                        Hướng giải quyết
                                                    </th>

                                                    <th class="text-nowrap" style="width: 15%">
                                                        Người đảm nhiệm
                                                    </th>
                                                    <th class="text-nowrap" style="width: 5%">Thời hạn</th>

                                                    <th class="border-0 text-nowrap" style="width: 5%">Trạng
                                                        thái
                                                    </th>
                                                    <th class="border-start-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            1
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-html="true"
                                                            data-bs-original-title="Vấn đề">
                                                            Vấn đề
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" value="Giải quyết">Giải quyết
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-html="true"
                                                            data-bs-original-title="Tên - Code">
                                                            Tên
                                                            - Code
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-html="true"
                                                            data-bs-original-title="Lý do">
                                                            Lý do
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-html="true"
                                                            data-bs-original-title="Ligue 1">
                                                            Ligue 1
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-html="true"
                                                            data-bs-original-title="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            01/01/2001
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        Status
                                                    </td>
                                                    <td>
                                                        <div class="dotdotdot" id="dropdownMenuButton1"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="bi bi-three-dots-vertical"></i>
                                                        </div>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#convertReportTaskModal"
                                                                    data-repeater-delete>
                                                                    <i class="bi bi-arrow-right-square-fill"></i>
                                                                    Chuyển thành nhiệm vụ phát sinh
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editReportModal">
                                                                    <img style="width:16px;height:16px"
                                                                        src="{{ asset('assets/img/edit.svg') }}" />
                                                                    Sửa
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteReportModal"
                                                                    data-repeater-delete>
                                                                    <img style="width:16px;height:16px"
                                                                        src="{{ asset('assets/img/trash.svg') }}" />
                                                                    Xóa
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{-- <nav aria-label="Page navigation example" class="mt-3">
                                            <ul class="pagination">
                                                @foreach ($listReports->links as $link)
                                                    <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ getPaginationLink($link, 'p5') }}">
                                                            <span aria-hidden="true">{!! $link->label !!}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </nav> --}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Chart --}}
                        <div class="col-md-12 chart_wrapper">
                            <div class="card mb-3 col-md-3 col-sm-6 col-xs-6 col-lg-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title">PieChart</div>
                                    </div>
                                    <div class="mainSection_chart-container mt-3">
                                        <canvas id="pieChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3 col-md-3 col-sm-6 col-xs-6 col-lg-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title">DoughnutChart</div>
                                    </div>
                                    <div class="mainSection_chart-container mt-3">
                                        <canvas id="doughnutChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3 col-md-3 col-sm-6 col-xs-6 col-lg-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title">BarChart 2</div>
                                    </div>
                                    <div class="mainSection_chart-container mt-3">
                                        <canvas id="BarChartTwo"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3 col-md-3 col-sm-6 col-xs-6 col-lg-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title">BarChart 3</div>
                                    </div>
                                    <div class="mainSection_chart-container mt-3">
                                        <canvas id="BarChartThree"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 chart_wrapper">
                            <div class="card mb-3 col-md-6">

                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center pb-3 pt-3">
                                        <div class="card-title">LineChart</div>
                                    </div>
                                    <div class="mainSection_chart-container mt-3">
                                        <canvas id="lineChart"></canvas>
                                    </div>
                                </div>

                            </div>
                            <div class="card mb-3 col-md-6">

                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center pb-3 pt-3">
                                        <div class="card-title">LineChart 2</div>
                                    </div>
                                    <div class="mainSection_chart-container mt-3">
                                        <canvas id="LineChartTwo"></canvas>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>

            </div>
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarDeXuatTheoMau.sidebarRight')
    {{-- MODALS --}}
    {{-- TARGET DETAIL MODAL --}}
    <div class="modal fade" id="targetDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thông tin nhiệm vụ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-wrapper">
                    loading...
                </div>
            </div>
        </div>
    </div>

    {{-- REPORT TASK MODAL --}}
    <div class="modal fade" id="reportTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thông tin nhiệm vụ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-wrapper">
                    loading...
                </div>
            </div>
        </div>
    </div>


    {{-- TARGET LOG MODAL --}}
    <!-- Modal Báo cáo công việc dinh muc -->
    <div class="modal fade text-black" id="targetLogModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <div class="d-flex w-100 flex-md-column">
                        <h5 class="modal-title">Báo cáo công việc</h5>
                        <h6 class="text-capitalize fw-normal fs-5" id="target-log-date">Ngày 04 - 05 - 2001 </h6>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-wrapper">
                    loading...
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Báo cáo công việc phat sinh -->
    <div class="modal fade text-black" id="reportTaskLogModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <div class="d-flex w-100 flex-md-column">
                        <h5 class="modal-title">Báo cáo công việc</h5>
                        <h6 class="text-capitalize fw-normal fs-5" id="report-task-log-date">Ngày 04 - 05 - 2001 </h6>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-wrapper">
                    loading...
                </div>
            </div>
        </div>
    </div>
    {{-- sua van de --}}
    <div class="modal fade" id="editReportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Cập nhật vấn đề tồn đọng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-wrapper">
                    loading...
                </div>
            </div>
        </div>
    </div>



    {{-- Xóa vấn đề --}}
    <div class="modal fade" id="deleteReportModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa vấn đề này</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-wrapper">
                    loading...
                </div>
            </div>
        </div>
    </div>

    {{-- Chuyen van de thanh nhiem vu phat sinh --}}
    <div class="modal fade" id="convertReportTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-body-wrapper">

        </div>
    </div>

    <div class="modal fade" id="filterUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Lọc dữ liệu </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/" method="GET">
                    <div class="modal-body">
                        @foreach (request()->query() as $key => $value)
                            @if ($key != 'userDate' && $key != 'p1' && $key != 'p2')
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach
                        <div class="row">
                            <div class="col-12 mb-3 position-relative">
                                <input type="text" class="form-control locDuLieuPick" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-original-title="Thời gian" name="userDate"
                                    placeholder="Chọn thời gian" value="{{ request()->userDate ?? date('m-Y') }}" />
                                <i class="bi bi-calendar-plus style_pickdate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger"
                            onclick="resetTaskFilters(['userDate', 'p1', 'p2'])">
                            Làm mới
                        </button>
                        <button type="submit" class="btn btn-danger m-0" style="padding: 4px 30px;">Lọc</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="filterAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Lọc dữ liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/" method="GET">
                    @foreach (request()->query() as $key => $value)
                        @if ($key != 'adminDate' && $key != 'department' && $key != 'user' && $key != 'p3' && $key != 'p4')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Phòng ban">
                                    <select name="department" id="" class="selectpicker select_filter"
                                        data-dropup-auto="false" data-live-search="true" data-size="5"
                                        title="Phòng ban">
                                        <option value="">Tất cả</option>
                                        <option value="1">Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Người phụ trách">
                                    <select name="user" id="" class="selectpicker select_filter"
                                        data-dropup-auto="false" data-live-search="true" data-size="5"
                                        title="Người phụ trách">
                                        <option value="">Tất cả</option>
                                        <option value="1">Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3 position-relative">
                                <input type="text" class="form-control locDuLieuPick" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-original-title="Thời gian" name="adminDate"
                                    placeholder="Chọn thời gian" value="{{ request()->adminDate ?? date('m-Y') }}" />
                                <i class="bi bi-calendar-plus style_pickdate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger">Làm mới
                        </button>
                        <button type="submit" class="btn btn-danger m-0" style="padding: 4px 30px;">Lọc</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="cauHinhDanhSachVanDe" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Lọc dữ liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/" method="GET">
                    @foreach (request()->query() as $key => $value)
                        @if ($key != 'reportDate' && $key != 'reportUser' && $key != 'reportStatus' && $key != 'p5' && $key != 'reportPic')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Người nêu">
                                    <select name="reportUser" class="selectpicker select_filter" data-dropup-auto="false"
                                        data-size="5" title="Người nêu" data-live-search="true">
                                        <option value="">Tất cả</option>
                                        <option value="1">Name</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Người đảm nhiệm">
                                    <select name="reportPic" class="selectpicker select_filter" data-dropup-auto="false"
                                        data-size="5" title="Người đảm nhiệm" data-live-search="true">
                                        <option value="">Tất cả</option>
                                        <option value="1">Name</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Tình trạng">
                                    <select name="reportStatus" class="selectpicker select_filter"
                                        data-dropup-auto="false" data-size="5" title="Tình trạng">
                                        <option value="">Tất cả</option>
                                        <option value="1" {{ request()->reportStatus == 1 ? 'selected' : '' }}> Đã
                                            có hướng giải quyết</option>
                                        <option value="2" {{ request()->reportStatus == 2 ? 'selected' : '' }}>Đã
                                            giải quyết</option>
                                        <option value="4" {{ request()->reportStatus == 4 ? 'selected' : '' }}>Đã
                                            giao</option>
                                        <option value="3" {{ request()->reportStatus == 3 ? 'selected' : '' }}>không
                                            thể giải quyết</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3 position-relative">
                                <input type="text" class="form-control locDuLieuPick" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-original-title="Thời gian" name="reportDate"
                                    placeholder="Chọn thời gian" value="{{ request()->get('reportDate') ?? '' }}" />
                                <i class="bi bi-calendar-plus style_pickdate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger"
                            onclick="resetTaskFilters(['reportUser', 'reportStatus', 'reportDate', 'reportPic', 'p5'])">Làm
                            mới</button>
                        <button type="submit" class="btn btn-danger m-0" style="padding: 4px 30px;">Lọc</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
@section('footer-script')
    <!-- ChartJS -->
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-stacked100@1.0.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-datalabels@2.0.0.js') }}"></script>

    <!-- Plugins -->
    <script type="text/javascript" charset="utf-8"
        src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/repeater.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/custom-repeater.js') }}"></script>

    <!-- Chart Types -->
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangActive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangMoi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_soDonHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_doanhSo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_nhanSu.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/chart/DoughnutChart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/BarChartThree.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/BarChartTwo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/BarChart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/LineChartTwo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/LineChart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/PieChart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_m_doanhSo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_m_chiPhi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_m_khachHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_m_donHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_m_sanPham.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_m_nhanSu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyBarChart/KeyBarChart_m_soLuongXe.js') }}"></script>

    <script>
        $(".locDuLieuPick").datepicker({
            format: "mm-yyyy",
            orientation: 'top',
            startView: "months",
            minViewMode: "months",
            locale: 'vi',
        });
    </script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>

@endsection

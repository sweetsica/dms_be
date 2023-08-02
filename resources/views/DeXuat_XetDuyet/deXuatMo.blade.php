@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Đề xuất mở')

@php
    $listStatus = [
        1 => 'Đã gửi',
        2 => 'Đã duyệt',
        3 => 'Đã từ chối',
    ];
    
    function isFiltering($filterNames)
    {
        $filters = request()->query();
        foreach ($filterNames as $filterName) {
            if (isset($filters[$filterName]) && $filters[$filterName] != '') {
                return true;
            }
        }
        return false;
    }
    
    function getPaginationLink($link, $pageName)
    {
        if (!isset($link->url)) {
            return '#';
        }
    
        $pageNumber = explode('?page=', $link->url)[1];
        //get all query params
        $queryString = request()->query();
    
        $queryString[$pageName] = $pageNumber;
        return route('freeProposal.list', $queryString);
    }
    
@endphp
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Đề xuất mở</h5>
                        @include('template.components.sectionCard')
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class='row'>
                                        <div class="col-md-12">
                                            <div class="action_wrapper d-flex justify-content-end mb-3">
                                                <div class="">
                                                    <form method="GET" action="{{ route('freeProposal.list') }}">
                                                        @foreach (request()->query() as $key => $value)
                                                            @if ($key != 'q' && $key != 'page')
                                                                <input type="hidden" name="{{ $key }}"
                                                                    value="{{ $value }}">
                                                            @endif
                                                        @endforeach
                                                        <div class="form-group has-search">
                                                            <span type="submit"
                                                                class="bi bi-search form-control-feedback fs-5"></span>
                                                            <input type="text" class="form-control"
                                                                placeholder="Tìm kiếm" value="{{ request()->get('q') }}"
                                                                name="q">
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="action_export ms-3" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Lọc">
                                                    <button
                                                        class="btn btn-outline-danger {{ isFiltering(['department', 'sender', 'receiver', 'status']) ? 'active' : '' }}"
                                                        data-bs-toggle="modal" data-bs-target="#filterOptions">
                                                        <i class="bi bi-funnel"></i>
                                                    </button>
                                                </div>

                                                @if (session('user')['role'] == 'admin' || session('user')['role'] == 'manager')
                                                    <div class="action_export ms-3">
                                                        <button class="btn btn-danger d-block testCreateUser"
                                                            data-bs-toggle="modal" data-bs-target="#taoDeXuat">Tạo đề
                                                            xuất</button>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="table-responsive">
                                                <table id="dsDaoTao"
                                                    class="table table-responsive table-hover table-bordered filter">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-nowrap text-center" style="width:2%">STT</th>

                                                            <th class="text-nowrap" style="width:38%">Tiêu đề</th>
                                                            <th class="text-nowrap" style="width:15%">Tóm tắt</th>
                                                            <th class="text-nowrap" style="width:12%">Người gửi</th>
                                                            <th class="text-nowrap" style="width:12%">Người phê duyệt</th>
                                                            <th class="text-nowrap" style="width:10%">Ngày gửi</th>
                                                            <th class="text-nowrap" style="width:8%">Trạng thái</th>
                                                            <th class="text-nowrap" style="width:3%"><span></span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($proposals->data as $item)
                                                            <tr class="table-row" data-status-id="{{ $item->status }}"
                                                                data-bs-toggle="modal" data-bs-target="#xemDeXuat"
                                                                role="button"
                                                                data-attr="{{ route('modals.detailFreeProposal', $item->id) }}">
                                                                <td class=" text-center">
                                                                    <div class="overText">
                                                                        {{ $proposals->total - $loop->index - ($proposals->current_page - 1) * $proposals->per_page }}
                                                                    </div>
                                                                </td>

                                                                <td class="">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $item->title ?? '' }}">
                                                                        {{ $item->title ?? '' }}
                                                                    </div>
                                                                </td>
                                                                <td class="">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $item->summary ?? '' }}">
                                                                        {{ $item->summary ?? '' }}
                                                                    </div>
                                                                </td>
                                                                <td class="">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $item->sender->name ?? '' }}">
                                                                        {{ $item->sender->name ?? '' }}
                                                                    </div>
                                                                </td>
                                                                <td class="">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $item->receiver->name ?? '' }}">
                                                                        {{ $item->receiver->name ?? '' }}
                                                                    </div>
                                                                </td>
                                                                <td class="">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $item->created_at ? date('d/m/y', strtotime($item->created_at)) : '' }}">
                                                                        {{ $item->created_at ? date('d/m/y', strtotime($item->created_at)) : '' }}
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $listStatus[$item->status] }}">
                                                                        @switch($item->status)
                                                                            @case(1)
                                                                                <span class="background_warning d-block">Đã
                                                                                    gửi</span>
                                                                            @break

                                                                            @case(2)
                                                                                <span class="background_green d-block">Đã
                                                                                    duyệt</span>
                                                                            @break

                                                                            @case(3)
                                                                                <span class="background_danger d-block">Đã từ
                                                                                    chối</span>
                                                                            @break

                                                                            @default
                                                                            @break
                                                                        @endswitch
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div
                                                                        class="table_actions d-flex justify-content-center">
                                                                        {{-- <div class="btn" data-bs-toggle="modal" data-bs-target="#suaDeXuat{{ $item->id }}">
                                                                            <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                                                        </div> --}}
                                                                        @if ((session('user')['role'] == 'admin' || session('user')['role'] == 'manager') && $item->status != 2)
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#xoaDeXuat"
                                                                                data-attr="{{ route('modals.deleteFreeProposal', $item->id) }}">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <nav aria-label="Page navigation example" class="float-end mt-3"
                                                id="target-pagination">
                                                <ul class="pagination">
                                                    @foreach ($proposals->links as $link)
                                                        <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                            <a class="page-link"
                                                                href="{{ getPaginationLink($link, 'page') }}"
                                                                aria-label="Previous">
                                                                <span aria-hidden="true">{!! $link->label !!}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </nav>
                                        </div>
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
    @include('template.sidebar.sidebarHopGiaoBan.sidebarRight')

    {{-- Sua de xuat --}}
    <div class="modal fade" id="suaDeXuat{{ 1 }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Sửa đề xuất</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="" action="">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12 mb-3">
                                <input type="text" data-bs-toggle="tooltip" data-bs-placement="top" title="Tiêu đề"
                                    value="" class="form-control">
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <input type="text" data-bs-toggle="tooltip" data-bs-placement="top" title="Chủ đề"
                                    value="" class="form-control">
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <input type="text" data-bs-toggle="tooltip" data-bs-placement="top" title="Tóm tắt"
                                    value="Tóm tắt đề xuất" class="form-control">
                            </div>
                            <div class="col-12 col-md-7 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Người gửi">
                                    <select class="selectpicker" data-dropup-auto="false" title="Chọn người gửi"
                                        data-live-search="true" data-size="5" data-live-search="true">
                                        @foreach (session('listUsers') as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                                -
                                                {{ $user->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-5 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                                    <select class="selectpicker" data-dropup-auto="false" title="Chọn trạng thái"
                                        data-live-search="true" data-size="5" data-live-search="true">
                                        <option value="" selected>
                                            1
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="card-title">File đã
                                    tải lên</div>
                                <div class="upload_wrapper-items">
                                    <ul class="modal_upload-list"
                                        style="max-height: 134px; overflow-y: scroll; overflow-x: hidden;">
                                        <li>
                                            <a href="#" target="_blank">
                                                <span class="fs-5">
                                                    <i class="bi bi-link-45deg"></i>
                                                    209-40.json
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Xóa de xuat --}}
    <div class="modal fade" id="xoaDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa đề xuất</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-wrapper">
                    loading...
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm de xuat -->
    <div class="modal fade" id="taoDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thông tin mẫu đề xuất</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('freeProposal.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="text" name="title" placeholder="Tiêu đề" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Tiêu đề">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" name="summary" placeholder="Tóm tắt" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Tóm tắt">
                            </div>
                            <div class="col-6 col-md-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Người nhận">
                                    <select name="receiver_id" class='selectpicker' title="Người nhận"
                                        data-live-search="true" data-size="5">
                                        @foreach (session('listUsers') as $user)
                                            @if ($user->status == 1)
                                                <option value="{{ $user->id }}">{{ $user->name }} -
                                                    {{ $user->code }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Người liên quan">
                                    <select class='selectpicker' name="relatedPeople[]" title="Người liên quan" multiple
                                        data-live-search="true" data-size="5" data-actions-box="true"
                                        data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn"
                                        data-selected-text-format="count > 1"
                                        data-count-selected-text="Có {0} người liên quán"
                                        data-live-search-placeholder="Tìm kiếm...">

                                        @foreach (session('listUsers') as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} -
                                                {{ $user->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-12 mb-3">
                                <textarea rows="1" class="form-control" placeholder="Nhập đánh giá"></textarea>
                            </div> --}}
                            <div class="col-12 col-md-12">
                                <div class="upload_wrapper-items">
                                    {{-- <input type="hidden" name="uploadedFiles[]" value="" /> --}}
                                    <div class="alert alert-danger alertNotSupport" role="alert" style="display:none">
                                        File bạn tải lên hiện tại không hỗ trợ !
                                    </div>
                                    <div class="modal_upload-wrapper">
                                        <label class="modal_upload-label" for="file">
                                            Tải xuống tệp hoặc đính kèm liên kết ở đây</label>
                                        <div class="mt-2 text-secondary fst-italic">Hỗ trợ định
                                            dạng
                                            JPG,
                                            PNG, PDF, XLSX, DOCX, hoặc PPTX kích
                                            thước tệp không quá 10MB
                                        </div>
                                        <div
                                            class="modal_upload-action mt-3 d-flex align-items-center justify-content-center">
                                            <div class="modal_upload-addFile me-3">
                                                <button role="button" type="button"
                                                    class="btn position-relative pe-4 ps-4">
                                                    <img style="width:16px;height:16px"
                                                        src="{{ asset('assets/img/upload-file.svg') }}" />
                                                    Tải file lên
                                                    <input role="button" type="file"
                                                        class="modal_upload-input modal_upload-file" name="files[]"
                                                        multiple onchange="updateList(event)">
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <ul class="modal_upload-list"
                                        style="max-height: 134px; overflow-y: scroll; overflow-x: hidden;"></ul>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <div class="row d-flex align-items-center justify-content-center" style="height: 100px;">
                                    <div class="col">
                                        <button id="show-sender-signature" type="button"
                                            class="btn btn-outline-primary fs-6">Chèn chữ ký</button>
                                    </div>
                                    <div class="col justify-content-end" style="display: none" id="sender-signature-img">
                                        @if ($userDetail->signature)
                                            <img width="100" src="{{ $userDetail->signature }}" />
                                            <input type="hidden" id="sender-signature-input" disabled
                                                name="senderSignature" value="{{ $userDetail->signature }}">
                                        @else
                                            <div class="text-center">
                                                <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây thể thêm chữ
                                                    ký</span>
                                                <a href="{{ route('users.me') }}" class="btn btn-outline-danger">Tạo chữ
                                                    kí</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal từ chối --}}
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Ý kiến phản hồi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-wrapper">
                    Loading...
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Phê duyệt đề xuất -->
    <div class="modal fade" id="xemDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">PHÊ DUYỆT ĐỀ XUẤT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-wrapper">
                    Loading...
                </div>
            </div>
        </div>
    </div>


    {{-- Filter --}}
    <div class="modal fade" id="filterOptions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Lọc dữ liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('freeProposal.list') }}" method="GET">
                    @foreach (request()->query() as $key => $value)
                        @if ($key != 'department' && $key != 'sender' && $key != 'page' && $key != 'receiver' && $key != 'status')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <div class="modal-body">
                        <div class="row" style="gap:10px">
                            <div class="col-12">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Đơn vị phụ trách">
                                    <select class="selectpicker select_filter test_filter-1" data-dropup-auto="false"
                                        data-live-search="true" data-size="5" title="Chọn đơn vị công tác"
                                        name="department">
                                        <option value="">Tất cả</option>
                                        @foreach (session('listDepartments') as $dp)
                                            @if (request()->department == $dp->id)
                                                <option value="{{ $dp->id }}" selected>{{ $dp->name }}</option>
                                            @else
                                                <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Đơn vị phụ trách">
                                    <select class="selectpicker select_filter test_filter-1" data-dropup-auto="false"
                                        data-live-search="true" data-size="5" title="Chọn người gửi" name="sender">
                                        <option value="">Tất cả</option>
                                        @foreach (session('listUsers') as $user)
                                            @if (request()->sender == $user->id)
                                                <option value="{{ $user->id }}" selected>{{ $user->code }} -
                                                    {{ $user->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->code }} -
                                                    {{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-12">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Người phê duyệt">
                                    <select class="selectpicker select_filter test_filter-1" data-dropup-auto="false"
                                        data-live-search="true" data-size="5" title="Chọn người phê duyệt"
                                        name="receiver">
                                        <option value="">Tất cả</option>
                                        @foreach (session('listUsers') as $user)
                                            @if (request()->receiver == $user->id)
                                                <option value="{{ $user->id }}" selected>{{ $user->code }} -
                                                    {{ $user->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->code }} -
                                                    {{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Trạng thái">
                                    <select class="selectpicker select_filter test_filter-3" data-dropup-auto="false"
                                        title="Trạng thái" data-width="100%" name="status">
                                        <option value="">Tất cả</option>
                                        @foreach ($listStatus as $key => $status)
                                            @if (request()->status == $key)
                                                <option value="{{ $key }}" selected>{{ $status }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $status }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="reset" class="btn btn-outline-danger test_reset"
                            onclick="resetFreeProposalsFilters(['page', 'department', 'receiver', 'sender', 'status'])">Làm
                            mới</button>
                        <button type="submit" class="btn btn-danger test_loc">Lọc</button>
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
    <!-- Chart Types -->
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangActive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangMoi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_soDonHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_doanhSo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_nhanSu.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/components/dataHrefTable.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/free-proposal.js') }}"></script>



    <script>
        const showSenderSignatureBtn = document.getElementById('show-sender-signature');
        const senderSignatureDiv = document.getElementById('sender-signature-img');
        const senderSignatureInput = document.getElementById('sender-signature-input');
        if (showSenderSignatureBtn && senderSignatureDiv && senderSignatureInput) {
            showSenderSignatureBtn.addEventListener('click', () => {
                showSenderSignatureBtn.style.display = 'none';
                senderSignatureDiv.style.display = 'flex';
                senderSignatureInput.disabled = false;
            });

        }
    </script>

    <script>
        updateList = function(e) {
            const input = e.target;
            const outPut = input.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector(
                '.modal_upload-list');
            const notSupport = outPut.parentNode.querySelector('.alertNotSupport');

            let children = '';
            console.log(children);
            const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
            const maxFileSize = 10485760; //10MB in bytes

            for (let i = 0; i < input.files.length; ++i) {
                const file = input.files.item(i);
                //allowedTypes.includes(file.type) &&
                if (file.size <= maxFileSize) {
                    children += `<li>
            <span class="fs-5">
                <i class="bi bi-link-45deg"></i> ${file.name}
            </span>
            <span class="modal_upload-remote" onclick="removeFileFromFileList(event, ${i})">
                <img style="width:18px;height:18px" src="{{ asset('assets/img/trash.svg') }}" />
            </span>
        </li>`;
                } else {

                    notSupport.style.display = 'block';
                    setTimeout(() => {
                        notSupport.style.display = 'none';
                    }, 3500);
                }
            }
            outPut.innerHTML = children;
        }

        //delete file from input
        function removeFileFromFileList(event, index) {
            const deleteButton = event.target;
            //get tag name
            const tagName = deleteButton.tagName.toLowerCase();
            let liEl;
            if (tagName == "img") {
                liEl = deleteButton.parentNode.parentNode;
            }
            if (tagName == "span") {
                liEl = deleteButton.parentNode;
            }

            const inputEl = liEl.parentNode.parentNode.querySelector('.modal_upload-input');
            const dt = new DataTransfer()

            const {
                files
            } = inputEl

            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                if (index !== i)
                    dt.items.add(file) // here you exclude the file. thus removing it.
            }

            inputEl.files = dt.files // Assign the updates list
            liEl.remove();
        }

        function removeUploaded(event) {
            const deleteButton = event.target;
            //get tag name
            const tagName = deleteButton.tagName.toLowerCase();
            let liEl;
            if (tagName == "img") {
                liEl = deleteButton.parentNode.parentNode;
            }
            if (tagName == "span") {
                liEl = deleteButton.parentNode;
            }
            liEl.remove();
        }
    </script>

    <script>
        function resetFreeProposalsFilters(toDeletes = []) {
            const urlParams = new URLSearchParams(window.location.search);
            toDeletes.forEach(queryName => {
                urlParams.delete(queryName);
            })
            window.location.search = urlParams;
        }
    </script>

@endsection

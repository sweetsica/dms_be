<div id="aside-left" class="aside-left">
    <div class="sidebar">
        <div class="sidebarBody">
            <div class="container">
                <div class="sidebarBody_wrapper ">
                    <div class="sidebarBody_heading-wrapper  ">
                        <div class="wrapper">
                            <h1 style="color: red;">Cơ cấu đơn vị<img src="{{ asset('assets/img/Vector.png') }}"
                                    onclick="showList()" id="show-list-button" style="float: right"></h1>
                        </div>
                        <div id="list-container" style="display: none;">
                            <ul>
                                <li style=" margin: 5px; padding: 0;">
                                    <div class="d-flex align-items-center"
                                        style=" background-color: #EBEBEB; height: 30px; display: flex; font-size: 15px; border-radius: 5px;">
                                        <a href="{{ route('Personnel.index') }}"
                                            style="color:black;padding-left:10px;">Cơ cấu tổ chức</a>
                                    </div>
                                </li>
                                <li style=" margin: 5px; padding: 0;">
                                    <div class="d-flex align-items-center"
                                        style=" background-color: #EBEBEB; height: 30px; display: flex; font-size: 15px; border-radius: 5px;">
                                        <a href="{{ route('Personnel.indexvtri') }} "
                                            style="color:black;padding-left:10px;">Cơ cấu chức danh</a>
                                    </div>
                                </li>
                                <li style=" margin: 5px; padding: 0;">
                                    <div class="d-flex align-items-center"
                                        style=" background-color: #EBEBEB; height: 30px; display: flex; font-size: 15px; border-radius: 5px;">
                                        <a href="{{ route('Personnel.indexDiaBan') }}" style="color:black;padding-left:10px;">Cơ
                                            cấu địa bàn</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <title>Danh sách vị trí</title>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <form method="GET" action="">
                            <div class="form-group has-search">
                                <span type="submit" class="bi bi-search form-control-feedback fs-5"></span>
                                <input type="text" style="width: 250px;" class="form-control"
                                    value="{{ $search }}" placeholder="Tìm kiếm" name="search">
                            </div>
                        </form>
                    </div><br>
                    <div class="d-flex align-items-center"
                        style=" background-color: #EBEBEB; height: 40px; display: flex; justify-content: center; font-size: 15px;">
                        <b>Cơ cấu chức danh</b>
                    </div>
                    <br>
                    <div>
                        <ul id="tree1">
                            @foreach ($positionListTree as $donVi)
                                <li class="parent" style=" margin: 10px; padding: 0;">
                                    <a href="{{ route('Personnel.show.vtri',$donVi->id) }}" class="title-child">{{ $donVi->name }}</a>
                                    @if ($donVi->donViCon->count() > 0)
                                        @include('template.sidebar.sidebarPosition.child', [
                                            'donViCon' => $donVi->donViCon,
                                        ])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <span id="btn-left"><i class="bi bi-arrow-bar-left"></i>
        </span>
    </div>
</div>

<style>
    .title-child {
        font-size: 14px;
        color: #ca1f24;
    }

    .title-child:hover {
        color: #ca1f24;
    }

    .tree,
    .tree ul {
        margin: 0;
        padding: 0;
        list-style: none
    }

    .tree ul {
        margin-left: 1em;
        position: relative
    }

    .tree ul ul {
        margin-left: .5em
    }

    .tree ul:before {
        content: "";
        display: block;
        width: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        border-left: 2px dotted #ca1f24;
    }

    .tree li {
        margin: 0;
        padding: 0 1em;
        line-height: 2em;
        position: relative;
        font-size: 12px;
    }


    .tree ul li:last-child:before {
        background: #fff;
        height: auto;
        top: 1em;
        bottom: 0
    }

    .tree li a {
        text-decoration: none;
    }

    .indicator {
        font-size: 14px;
        color: #ca1f24;
        margin-right: 5px
    }
</style>

@section('script-chart')
    @if (!env('FE_LAYOUT'))
        <script type="text/javascript" src="{{ asset('/assets/js/chart/ChartSidebarleft/dash.js') }}"></script>
    @endif

    <script>
        // Lấy đối tượng hình ảnh và danh sách "li"
        const showListButton = document.getElementById('show-list-button');
        const listContainer = document.getElementById('list-container');
        // Thêm sự kiện click cho hình ảnh để hiển thị danh sách "li"
        showListButton.addEventListener('click', () => {
            // Toggle (bật/tắt) hiển thị của danh sách "li"
            if (listContainer.style.display === 'none') {
                listContainer.style.display = 'block';
            } else {
                listContainer.style.display = 'none';
            }
        });

        $.fn.extend({
            treed: function(o) {

                var openedClass = 'bi-dash-square';
                var closedClass = 'bi-plus-square';

                if (typeof o != 'undefined') {
                    if (typeof o.openedClass != 'undefined') {
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined') {
                        closedClass = o.closedClass;
                    }
                };

                //initialize each of the top levels
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function() {
                    var branch = $(this); //li with children ul
                    branch.prepend("<i class='indicator bi " + closedClass + "'></i>");
                    branch.addClass('branch');
                    branch.on('click', function(e) {
                        if (this == e.target) {
                            var icon = $(this).children('i');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    })
                    branch.children().children().toggle();
                });

                //fire event from the dynamically added icon
                tree.find('.branch .indicator').each(function() {
                    $(this).on('click', function() {
                        $(this).closest('li').click();
                    });
                });
                //fire event to open branch if the li contains an anchor instead of text
                // tree.find('.branch>a').each(function() {
                //     $(this).on('click', function(e) {
                //         $(this).closest('li').click();
                //         e.preventDefault();
                //     });
                // });
            }
        });

        $('#tree1').treed();
    </script>
@endsection

@include('admin.inc.nav')
<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li>
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                                <li>
                    <a href="{{ url('admin/members') }} ">
                        <i class="uil uil-user-md"></i>
                        <span> Members </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/kycs') }}">
                        <i class="uil uil-image-v"></i>
                        <span> KYCs </span>
                    </a>
                </li>
                <li>
                        <a href="#sidebarGSTType" data-toggle="collapse">
                            <i class="uil uil-file-plus-alt"></i>
                            <span> GST Types </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarGSTType">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ url('admin/gst-type/create') }}">Create GST Master</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/gst-type') }}">GST Master Report</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ url('admin/categories') }}">
                            <i class="uil uil-code-branch"></i>
                            <span> Category </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}">
                            <i class="uil uil-shopping-bag"></i>
                            <span> Products </span>
                        </a>
                    </li>

                <li>
                    <a href="{{ url('admin/packages') }}">
                        <i class="uil uil-package"></i>
                        <span> Packages </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/genealogy/show') }}">
                        <i class="uil uil-channel-add"></i>
                        <span> Genealogy Tree</span>
                    </a>
                </li>
                 
                    <li>
                        <a href="{{ url('admin/orders') }}">
                            <i class="uil uil-shopping-cart"></i>
                            <span> Orders </span>
                        </a>
                    </li>
                

                <li>
                    <a href="{{ url('admin/payouts') }}">
                        <i class="uil uil-rupee-sign"></i>
                        <span> Payouts </span>
                    </a>
                </li>

                


                <li>
                    <a href="#sidebarReports" data-toggle="collapse">
                        <i class="uil uil-file-graph"></i>
                        <span> Reports </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarReports">
                        <ul class="nav-second-level">
                            <li><a href="">Top Earners</a></li>
                        </ul>
                    </div>
                </li>

               

              <!--  <li>
                    <a href="{{ url('admin/contact-inquiries') }}">
                        <i class="uil uil-envelope-question"></i>
                        <span class="badge badge-danger float-right rounded-circle">
                            0
                        </span>
                        <span> Contact Inquiries </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/support-ticket') }} ">
                        <i class="uil uil-headphones"></i>
                        <span> Support Ticket
                            <span class="badge badge-danger rounded-circle float-right">
                                0
                            </span>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/banking/index') }}">
                        <i class="uil uil-university"></i>
                        <span> Banking Partner </span>
                    </a>
                </li>-->

                <li>
                    <a href="#sidebarWeb" data-toggle="collapse">
                        <i class="uil uil-setting"></i>
                        <span> Website Setting </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarWeb">
                        <ul class="nav-second-level nav">
                            <li><a href="{{ url('admin/websetting/change-logo') }}">Change Logo</a></li>
                            <li><a href="{{ url('admin/websetting/contact-info') }}">Contact Info</a></li>
                            <li><a href="{{ url('admin/websetting/general-settings') }}">General Settings</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
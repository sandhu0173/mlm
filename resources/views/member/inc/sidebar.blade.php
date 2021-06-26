@include('member.inc.nav')
<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
            <li class="">
                <a class="" href="{{ url('member/dashboard') }}">
                    <i class="uil uil-house-user"></i>
                    <span class="" data-i18n="Dashboards">Dashboard</span>
                </a>
            </li>
            <li class="">
                <a  href="{{ url('member/profile') }}">
                    <i class="uil uil-user-md"></i>
                    <span  data-i18n="user">Profile</span>
                </a>
            </li>
            <li class="">
                <a  href="{{ url('member/kyc') }}">
                    <i class="uil uil-comment-image"></i>
                    <span  data-i18n="kyc">Kyc</span>
                </a>
            </li>
                                        <li class=" ">
                    <a  href="{{ url('member/orders') }}">
                        <i class="uil uil-receipt"></i>
                        <span  data-i18n="Invoices"> Orders </span>
                    </a>
                </li>
                        <li class=" ">
                <a  href="{{ url('member/genealogy') }}">
                    <i class="uil uil-channel"></i>
                    <span  data-i18n="Genealogy">Genealogy Tree </span>
                </a>
            </li>
               
                     
            <li class=" ">
                <a  href="{{ url('member/reports') }}">
                    <i class="uil uil-comparison"></i>
                    <span  data-i18n="Charts">Reports</span>
                </a>
            </li>
            
            
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
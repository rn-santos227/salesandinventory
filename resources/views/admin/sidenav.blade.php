<div class="menu-list">
  <ul id="menu-content" class="menu-content collapse out">
    <li data-toggle="collapse" data-target="#home" class="collapsed active">
      <a href="#">
        <i class="fa fa-user fa-lg"></i> {{Auth::user()->username}}<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="home">
      <a href="/profile"><li>Profile</li></a>
      <a href="#"><li>Messages</li></a>
      <a href="#"><li>Task</li></a>
      <a href="#"><li>Notes</li></a>
    </ul>
    <li data-toggle="collapse" data-target="#overview" class="collapsed active">
      <a href="#">
        <i class="fa fa-briefcase fa-lg"></i>  Overview<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="overview">
      <a href="/company"><li>Company</li></a>
      <a href="#"><li>Policies</li></a>
      <a href="/systemsettings"><li>System Setting</li></a>
    </ul>
    <li data-toggle="collapse" data-target="#sales" class="collapsed active">
      <a href="#">
        <i class="fa fa-shopping-cart fa-lg"></i>  POS<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="sales">
      @if (App\SystemSetting::all()->first()->system_mode == 'Restaurant')
      <a href="/restaurant"><li>Restaurant Mode</li></a>
      <a href="/kitchen"><li>Kitchen</li></a>
      @elseif (App\SystemSetting::all()->first()->system_mode == 'FastFood')
      <a href="/fastfood"><li>Fast Food Mode</li></a>
      <a href="/kitchen"><li>Kitchen</li></a>
      @else
      <a href="/retailer"><li>Retailer Mode</li></a>
      @endif
      <a href="/orders"><li>Order Logs</li></a>
    </ul>

    <li data-toggle="collapse" data-target="#products" class="collapsed active">
      <a href="#">
        <i class="fa fa-list fa-lg"></i>  File Maintenance<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="products">
      <a href="/items"><li>Products</li></a>
      <a href="/menus"><li>Menus</li></a>
      <a href="/customers"><li>Customers</li></a>
      <a href="/suppliers"><li>Suppliers</li></a>
      <a href="/categories"><li>Categories</li></a>
      <a href="/discounts"><li>Discounts</li></a>
      <a href="#"><li>Archives</li></a>
      <a href="/accounts"><li>Accounts</li></a>
    </ul>
    <li data-toggle="collapse" data-target="#reports" class="collapsed active">
      <a href="#">
        <i class="fa fa-clipboard fa-lg"></i>  Reports<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="reports">
      <a href="/salesreports/salesactivities"><li>Sales Reports</li></a>
      <a href="/inventoryreport"><li>Inventory Value</li></a>
      <a href="#"><li>Documents</li></a>
      <a href="#"><li>Expenditures</li></a>
      <a href="#"><li>Invoices</li></a>
      <a href="/audittrail"><li>Audit Trail</li></a>
    </ul>

    <li data-toggle="collapse" data-target="#analytics" class="collapsed active">
      <a href="#">
        <i class="fa fa-bar-chart fa-lg"></i>  Analytics<span class="arrow"></span> 
      </a>
    </li>
    <ul class="sub-menu collapse" id="analytics">
      <a href="#"><li>Supply Purchase Request</li></a>
      <a href="#"><li>Supply Acquisition</li></a>
      <a href="#"><li>Supply Status</li></a>
      <a href="#"><li>Depreciation / Expiration</li></a>
    </ul>
  </ul>
</div>
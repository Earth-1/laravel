 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
     <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-heading">Pages</li>
         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/redirect') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/user') }}">
                 <i class="bi bi-person"></i>
                 <span>การตั้งค่าบัญชี</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-cart-plus"></i><span>เพิ่มสินค้า</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ url('/view_product') }}">
                         <i class="bi bi-circle"></i><span>เพิ่มสินค้า</span>
                     </a>
                     <a href="{{ url('view_catagory') }}">
                         <i class="bi bi-circle"></i><span>เพิ่มประเภทสินค้า</span>
                     </a>
                     <a href="{{ url('/show_product') }}">
                         <i class="bi bi-circle"></i><span>แสดงสินค้า</span>
                     </a>
                 </li>
             </ul>
         </li>
         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-cart3"></i><span>คำสั่งซื้อ</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ url('order') }}">
                         <i class="bi bi-circle"></i><span>คำสั่งซื้อ</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ url('order_delivery') }}">
                         <i class="bi bi-circle"></i><span>คำสั่งซื้อที่จัดส่งแล้ว</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ url('order_cancle') }}">
                         <i class="bi bi-circle"></i><span>คำสั่งซื้อที่ยกเลิก</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Forms Nav -->
     </ul>
 </aside>

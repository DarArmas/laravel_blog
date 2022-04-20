
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
               @foreach($menuPrincipal as $key => $item)
                @if($item["menu_id"] != null) <!--si es submenu-->
                    @break
                @endif
                @include("theme.back.aside-menu-item", ["item" => $item])
            @endforeach
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
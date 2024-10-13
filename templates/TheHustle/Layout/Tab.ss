<div class="tab-container tab-container-$ID">
    <div class="tab-nav block">
        <nav >
            <ul class="flex items-center justify-center">
                <% loop $getTabItemElements %>
                <li class="tab-nav-item bg-primary">
                    <a
                        href="javascript:void(0);"
                        class="p-6 text-white<% if $Pos == 1 %> bg-primary-dark<% else %> hover:text-dark-gray<% end_if %> font-bold text-base inline-block transition-all duration-300 ease-in-out"
                        data-target="#t-$ID">
                        $Title
                    </a>
                </li>
                <% end_loop %>
            </ul>
        </nav>
    </div>

    <div class="tab-content">
        <% loop $getTabItemElements %>
            <div class="tab-item <% if $Pos != 1 %> hidden<% end_if %>" id="t-$ID">
                $Content
            </div>
        <% end_loop %>
    </div>
</div>
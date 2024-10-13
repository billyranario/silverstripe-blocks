<div class="tab-container tab-container-$ID">
    <div class="tab-nav block">
        <nav >
            <ul class="flex items-center flex-col md:flex-row justify-center">
                <% loop $getTabItemElements %>
                <li class="tab-nav-item w-full md:w-auto bg-primary">
                    <a
                        href="javascript:void(0);"
                        class="px-6 py-4 md:p-6 text-white<% if $Pos == 1 %> bg-primary-dark<% else %> hover:text-dark-gray<% end_if %> font-bold text-base block md:inline-block transition-all duration-300 ease-in-out"
                        data-target="#e$ID">
                        $Title
                    </a>
                </li>
                <% end_loop %>
            </ul>
        </nav>
    </div>

    <div class="tab-content">
        <% with $Elements %>
            $Me
        <% end_with %>
    </div>
</div>
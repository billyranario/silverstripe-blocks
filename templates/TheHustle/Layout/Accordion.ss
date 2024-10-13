<div class="accordion-container accordion-container-$ID">
    <div class="accordion-content">
        <% loop $getTabItemElements %>
            <div class="accordion-item <% if $Pos != 1 %> hidden<% end_if %>" id="accordion-$ID">
                $Content
            </div>
        <% end_loop %>
    </div>
</div>
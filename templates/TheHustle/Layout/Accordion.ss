<div class="accordion-container space-y-4">
    <% loop $getAccordionItemElements %>
        <div class="accordion-item border border-gray-300 rounded-md overflow-hidden">
            <div class="accordion-title p-4 bg-primary text-white font-bold cursor-pointer" data-target="#accordion-$ID">
                $Title
            </div>

            <div class="accordion-body hidden p-4 bg-white" id="accordion-$ID">
                $Content
            </div>
        </div>
    <% end_loop %>
</div>

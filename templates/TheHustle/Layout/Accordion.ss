<div class="accordion-container space-y-4">
    <% loop $getAccordionItemElements %>
        <div class="accordion-item overflow-hidden shadow-default">
            <div class="accordion-title relative py-5 pl-5 pr-[2.185rem] text-base bg-white text-tertiary font-bold cursor-pointer" data-target="#accordion-$ID">
                $Title
                <i class="accordion-icon text-xs fa fa-chevron-down absolute right-[1.66rem] top-[50%] -translate-y-[50%] transition-transform duration-300"></i>
            </div>

            <div class="accordion-body hidden p-4 bg-white text-base" id="accordion-$ID">
                $Content
            </div>
        </div>
    <% end_loop %>
</div>

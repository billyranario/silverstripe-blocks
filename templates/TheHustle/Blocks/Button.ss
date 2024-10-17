<% if $RedirectLink %>
    <a href="$RedirectLink" class="inline-block transition-colors duration-300 ease-in-out $Width rounded-[5px] text-sm $getButtonClass $getButtonColor" <% if $OpenNewTab %>target="_blank"<% end_if %>>
        $ButtonLabel
    </a>
<% else %>
    <span class="inline-block transition-colors duration-300 ease-in-out rounded-[5px] text-sm $getButtonClass $getButtonColor $Width">
        $ButtonLabel
    </span>
<% end_if %>

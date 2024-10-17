<% if $RedirectLink %>
    <a href="$RedirectLink" class="inline-block transition-colors duration-300 ease-in-out $Width rounded-[5px] text-sm $getButtonClass $ColorClass" <% if $OpenNewTab %>target="_blank"<% end_if %>>
        $ButtonLabel
    </a>
<% else %>
    <span class="inline-block transition-colors duration-300 ease-in-out rounded-[5px] text-sm $getButtonClass $ColorClass $Width">
        $ButtonLabel
    </span>
<% end_if %>

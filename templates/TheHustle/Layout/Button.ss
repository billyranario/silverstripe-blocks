<% if $RedirectLink %>
    <a href="$RedirectLink" class="inline-block {{ $ButtonClass }} {{ $Width }} text-white font-bold transition-colors duration-300 ease-in-out" <% if $OpenNewTab %>target="_blank"<% end_if %>>
        $ButtonLabel
    </a>
<% else %>
    <span class="inline-block {{ $ButtonClass }} {{ $Width }} text-white font-bold transition-colors duration-300 ease-in-out">
        $ButtonLabel
    </span>
<% end_if %>
